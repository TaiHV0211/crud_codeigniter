<?php

namespace App\Services;
use App\Models\PurchaseModel;
use App\Common\ResultUtils;
use Exception;

class PurchaseServices extends BaseServices
{
    private $purchase;
    function __construct()
    {
        parent::__construct();
        $this->purchase = new PurchaseModel();
        $this->purchase->protect(false);
    }
    public function getAllPurchases()
    {
        return $this->purchase->findAll();
    }
    public function addPurchaseInfo($requestData)
    {
        $validate = $this->validatePurchase($requestData);
        if($validate->getErrors()){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => $validate->getErrors()
            ];
        }
        $dataSave = $requestData->getPost();
        try {
            $this ->purchase->save($dataSave);
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'messageCode' => ResultUtils::MESSAGE_CODE_OK,
                'messages' => ['success' => 'Thêm dữ liệu thành công']
            ];
        } catch (Exception $e) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => ['success' => $e->getMessage()]
            ];
        }
    }


    public function updatePurchaseInfo($requestData)
    {
        $validate = $this->validatePurchase($requestData);
        if($validate->getErrors()){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => $validate->getErrors()
            ];
        }

        $dataSave = $requestData->getPost();
        try {
            $this ->purchase->save($dataSave);
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'messageCode' => ResultUtils::MESSAGE_CODE_OK,
                'messages' => ['success' => 'Cập nhật dữ liệu thành công']
            ];
        } catch (Exception $e) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => ['success' => $e->getMessage()]
            ];
        }
    }

    // /***
    //  * get User By ID primary key
    //  */
    public function getPurchasesById($idPurchases)
    {
        return $this->purchase->where('id', $idPurchases)->first();
    }

    public function deletePurchase($id)
    {
        try {
            $this ->purchase->delete($id);
            return [
                'status' => ResultUtils::STATUS_CODE_OK,
                'messageCode' => ResultUtils::MESSAGE_CODE_OK,
                'messages' => ['success' => 'Cập nhật dữ liệu thành công']
            ];
        } catch (Exception $e) {
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => ['success' => $e->getMessage()]
            ];
        }   
    }


    private function validatePurchase($requestData)
    {
        $rule = [
            'name'          => 'max_length[255]',
            'price'         => 'max_length[255]',
            'email_address' => 'max_length[255]',
            'srorage'       => 'max_length[255]',
            'databases'     => 'max_length[255]',
            'domains'       => 'max_length[255]',
            'support'       => 'max_length[255]',
        ];
        $messages = [
            'name' =>[
                'max_length' => 'Tên người dùng quá dài, vui lòng nhập tối đa {param} ký tự!'
            ],
            'price' =>[
                'max_length' => 'Giá bán quá dài, vui lòng nhập tối đa {param} ký tự!'
            ],
            'email_address' =>[
                'max_length' => 'Quá số lượng email cho phép, vui lòng nhập tối đa {param}!'
            ],
            'storage' =>[
                'max_length' => 'Quá số dung lượng cho phép, vui lòng nhập tối đa {param}!'
            ],
            'databases' =>[
                'max_length' => 'Quá số dung lượng databases cho phép, vui lòng nhập tối đa {param}!'
            ],
            'domains' =>[
                'max_length' => 'Quá số lượng domains cho phép, vui lòng nhập tối đa {param}!'
            ],
            'support' =>[
                'max_length' => 'Nội dung hỗ trợ quá dài, vui lòng nhập tối đa {param}!'
            ],
            
        ];
        $this->validation->setRules($rule,$messages);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }
}
