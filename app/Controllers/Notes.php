<?php

namespace App\Controllers;

class Notes extends BaseController
{
    public function __construct() {
        helper('cookie');
        $this->validation = \Config\Services::validation();
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
