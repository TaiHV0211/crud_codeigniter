<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\UserServices;
use CodeIgniter\HTTP\Request;

class UserController extends BaseController
{
    /**
     * @var Service
     */
    private $service;
    public function __construct()
    {
        $this->service = new UserServices();
    }
    public function list()
    {
        $data = [];
        $css_File = [
            'https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css',
            base_url() . '/assets/admin/css/datatable.css'
        ];
        $js_File = [
            'http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js',
            base_url() . '/assets/admin/js/datatable.js',
            base_url() . '/assets/admin/js/event.js'
        ];
        $dataLayout['users']  =   $this->service->getAllUsers();
        $data =  $this->loadMasterLayout($data,'Danh sách tài khoản','admin/pages/user/list',$dataLayout,$css_File,$js_File);
        return view('admin/main',$data);
    }
    public function add()
    {
        $data = [];
        $data =  $this->loadMasterLayout($data,'Thêm tài khoản','admin/pages/user/add');
        return view('admin/main',$data);
    }
    public function create()
    {
        $result = $this->service->addUserInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['messages']);
    }
    public function edit($id)
    {
        $user = $this->service->getUserById($id);
        if(!$user){
            return redirect('error/404');
        }
        $js_File = [
            base_url() . '/assets/admin/js/event.js'
        ];
            $dataLayout['user'] = $user;
            $data =  $this->loadMasterLayout([],'Sửa tài khoản','admin/pages/user/edit',$dataLayout,[], $js_File);
            return view('admin/main',$data); 

    }

    public function update()
    {
        $result = $this->service->updateUserInfo($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['messages']);
    }

    public function delete($id){
        $user = $this->service->getUserById($id);
        if(!$user){
            return redirect('error/404');
        }

        $result = $this->service->deleteUser($id);
        return redirect('admin/user/list')->with($result['messageCode'],$result['messages']);
    }
}
