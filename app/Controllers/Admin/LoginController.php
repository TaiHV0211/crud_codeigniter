<?php

namespace App\Controllers\Admin;

use App\Common\ResultUtils;
use App\Controllers\BaseController;
use App\Services\LoginServices;
use CodeIgniter\HTTP\Request;

class LoginController extends BaseController
{
    /**
     * @var Service
     */
    private $service;
    public function __construct()
    {
        $this->service = new LoginServices();
    }
    public function index()
    {
        if(session()->has('user_login')){
            return redirect('admin/home');
        }
        return view('admin/pages/login');
    }
   

    public function login()
    {
        
        $result = $this->service->hasLoginInfo($this->request);

        if($result['status'] === ResultUtils::STATUS_CODE_OK){
            return redirect("admin/home");
        }elseif($result['status'] === ResultUtils::STATUS_CODE_ERR) {
            return redirect("")->with($result['messageCode'],$result['messages']);
        }
        return redirect("home");
    }
    public function logout()
    {
        $this->service->logoutUser();
        return redirect("login");
        
    }
}
