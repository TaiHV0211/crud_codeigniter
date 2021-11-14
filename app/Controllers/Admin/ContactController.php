<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Services\ContactServices;
use CodeIgniter\HTTP\Request;

class ContactController extends BaseController
{
    /**
     * @var Service
     */
    private $service;
    public function __construct()
    {
        $this->service = new ContactServices();
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
        $dataLayout['contacts']  = $this->service->getDataContact();
        $dataLayout['pager']  = $this->service->getPagerDataContact();
        
        $data =  $this->loadMasterLayout($data,'Danh sách liên hệ','admin/pages/contact/list',$dataLayout,$css_File,$js_File);
        return view('admin/main',$data);
    }
//     public function add()
//     {
//         $data = [];
//         $data =  $this->loadMasterLayout($data,'Thêm gói dịch vụ','admin/pages/purchase/add');
//         return view('admin/main',$data);
//     }
//     public function create()
//     {
//         $result = $this->service->addPurchaseInfo($this->request);
//         return redirect()->back()->withInput()->with($result['messageCode'],$result['messages']);
//     }
//     public function edit($id)
//     {
//         $purchase = $this->service->getPurchasesById($id);
//         if(!$purchase){
//             return redirect('error/404');
//         }
//         $js_File = [
//             base_url() . '/assets/admin/js/event.js'
//         ];
//             $dataLayout['purchase'] = $purchase;
//             $data =  $this->loadMasterLayout([],'Sửa gói dịch vụ','admin/pages/purchase/edit',$dataLayout,[], $js_File);
//             return view('admin/main',$data); 
//     }

//     public function update()
//     {
//         $result = $this->service->updatePurchaseInfo($this->request);
//         return redirect()->back()->withInput()->with($result['messageCode'],$result['messages']);
//     }

//     public function delete($id){
//         $purchase = $this->service->getPurchasesById($id);
//         if(!$purchase){
//             return redirect('error/404');
//         }

//         $result = $this->service->deletePurchase($id);
//         return redirect('admin/purchase/list')->with($result['messageCode'],$result['messages']);
//     }
}
