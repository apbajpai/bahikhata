<?php

namespace App\Controllers;
use App\Models\CompanyModel;

class Index extends BaseController
{
    public function __construct() {
        helper('cookie');
        $this->validation = \Config\Services::validation();
        $this->session = session();
        $this->companyModel = new CompanyModel();
    } 

    public function index()
    {
        return  redirect()->to('login');
    }

    public function dashboard()
    {
        $this->data['page_name'] = 'Dashboard';
        echo view(THEME_NAME.'/include/header', $this->data);
        echo view(THEME_NAME.'/include/sidebar');
        echo view(THEME_NAME.'/dashboard');
        echo view(THEME_NAME.'/include/footer');
    }
}
