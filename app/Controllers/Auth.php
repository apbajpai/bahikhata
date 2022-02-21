<?php

namespace App\Controllers;
use App\Models\UsersModel;
use App\Models\CompanyModel;

class Auth extends BaseController
{
    public function __construct() {
        helper('cookie');
        $this->validation = \Config\Services::validation();
    }  

    public function login()
    {
       $session = session();
        
        if($this->request->getMethod() == 'post') {
            $rules = [
                'user_mobile' 		=> 'required|regex_match[/^[0-9]{10}$/]',
                'user_pass' 		=> 'required'
            ];

            if($this->validate($rules)){

                $usermodel = new UsersModel();
                $user_mobile = $this->request->getVar('user_mobile');
                $password = $this->request->getVar('user_pass');
                
                
                $data = $usermodel->where('user_mobile', $user_mobile)->first();
                if(!empty($data)) {
                    $pass = $data['user_pass'];
                    $verify_pass =  password_verify($password, $pass);
                    if($verify_pass){
                        $ses_data = [
                            'user_id'       => $data['user_id'],
                            'user_fullname'     => $data['fname'].' '.$data['lname'],
                            'user_email'    => $data['user_email'],
                            'user_type'    => $data['user_type'],
                            'logged_in'     => TRUE
                        ];
                        $session->set($ses_data);

                        if(!empty($this->request->getVar("remember"))) {
                            $token = openssl_random_pseudo_bytes(16);
                            $token = bin2hex($token);
                            setcookie('rember_me', 1, time() + (86400 * 30), "/"); // 86400 = 1 day
                            setcookie('user_name', $data['user_mobile'], time() + (86400 * 30), "/"); // 86400 = 1 day
                            setcookie('pwd', $password, time() + (86400 * 30), "/"); // 86400 = 1 day
                            
                        } else {
                            setcookie('rember_me', 0);
                            setcookie('user_name', ''); 
                            setcookie('pwd', "");
                        }
                        
                        return redirect()->to('dashboard');
                    } else {
                        $session->setFlashdata('error', 'Wrong Credintials');
                        return view(THEME_NAME.'/login');
                    }
                } else {
                    $session->setFlashdata('error', 'User Not Found');
                    return view(THEME_NAME.'/login');
                }
                
            } else {
                return view(THEME_NAME.'/login');
            }
        }
        return view(THEME_NAME.'/login');
    }

    public function signup()
    {
        $usermodel = new UsersModel();
        $companyModel = new CompanyModel();
       // $db      = \Config\Database::connect();
        $session = session();
        

        if($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();
            $postData['status'] = 1;

            $getData = $this->validation->getRuleGroup('signup');
            $this->validation->setRuleGroup('signup');
            $this->validation->run($postData, 'signup');

            if(empty($this->validation->getErrors())){
                $postData['user_name'] = $postData['user_mobile'];
                $postData['user_type'] = 'admin';

                if($usermodel->save($postData)) {
                    $id = $usermodel->insertID; 
                    
                    $companyData = array();
                    $companyData['company_name'] = 'Company Name';
                    $companyData['location'] = 'Location Completed Address';
                    $companyData['user'] = $postData['fname'].' '.$postData['lname'];
                    $companyData['specification'] = '';
                    $companyData['phone'] = $postData['user_mobile'];
                    $companyData['tin_no'] = '';
                    $companyData['user_id'] = $id;
                    $companyData['email'] = $postData['user_email'];
                    $companyData['website'] = '';
                    $companyData['logo'] = 'default-logo.png';
                    $companyData['auth_sign'] = 'default-sign.jpg';

                    $companyModel->save($companyData); // save default company details 

                    $session->setFlashdata('message', 'Signup Succesfully. Please Login Here.');
                    return  redirect()->to('login');
                } else { 
                    $session->setFlashdata('error', 'Something went wrong. Please check.');
                    return  redirect()->to('signup');
                }
            } else {
                //$this->data['validation'] = $validation;
                $this->data['postData'] = $postData;
                return view(THEME_NAME.'/signup', $this->data);
            }
        }
        return view(THEME_NAME.'/signup');
    }

    public function checkMobile(){
        if($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();
            $this->validation->setRuleGroup('duplicateMobile');
            $this->validation->run($postData, 'duplicateMobile');
            $errors = $this->validation->getErrors();
            if(!empty($errors)){
                echo 0;
            } else {
                echo 1;
            }
        } else {
            echo 0;
        }
    }

    public function logout()
    {
        $session = session();
        $ses_data = [
            'logged_in'     => false
        ];
        $session->set($ses_data);
        return redirect()->to('login');
    }

}
