<?php

namespace App\Services;
use App\Models\UserModel;
use App\Common\ResultUtils;
use Exception;

class UserServices extends BaseServices
{
    private $users;
    function __construct()
    {
        parent::__construct();
        $this->users = new UserModel();
        $this->users->protect(false);
    }
    public function getAllUsers()
    {
        return $this->users->findAll();
    }
    public function addUserInfo($requestData)
    {
        $validate = $this->validateAddUser($requestData);
        if($validate->getErrors()){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => $validate->getErrors()
            ];
        }
        $dataSave = $requestData->getPost();
        unset($dataSave['password_confirm']);
        $dataSave['password'] = password_hash($dataSave['password'],PASSWORD_BCRYPT);
        try {
            $this ->users->save($dataSave);
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


    public function updateUserInfo($requestData)
    {
        $validate = $this->validateUpdateUser($requestData);
        if($validate->getErrors()){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => $validate->getErrors()
            ];
        }

        $dataSave = $requestData->getPost();
        if(!empty($dataSave['change_password'])){
            unset($dataSave['change_password']);
            unset($dataSave['password_confirm']);
            $dataSave['password'] = password_hash($dataSave['password'],PASSWORD_BCRYPT);
        }else {
            unset($dataSave['password']);
            unset($dataSave['password_confirm']);
        }
        try {
            $this ->users->save($dataSave);
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

    /***
     * get User By ID primary key
     */
    public function getUserById($idUser)
    {
        return $this->users->where('id', $idUser)->first();
    }

    public function deleteUser($id)
    {
        try {
            $this ->users->delete($id);
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


    private function validateAddUser($requestData)
    {
        $rule = [
            'email' => 'valid_email|is_unique[users.email]',
            'name' => 'max_length[100]',
            'password' => 'max_length[30]|min_length[6]',
            'password_confirm' => 'matches[password]'
        ];
        $messages = [
            'email' => [
                'valid_email' => 'Tài khoản {field} {value} không đúng định dạng!',
                'is_unique'   => 'Email đã tồn tại! Vui lòng kiểm tra lại!'
            ],
            'name' => [
                'max_length' => 'Tên quá dài, vui lòng nhập {param} kí tự!'
            ],
            'password' => [
                'max_length' => 'Mật khẩu quá dài, vui lòng nhập {param} kí tự!',
                'min_length' => 'Mật khẩu ít nhất {param} kí tự!',
            ],
            'password_confirm' => [
                'matches' => 'Mật khẩu không khớp, vui lòng kiểm tra lại!'
            ]
        ];
        $this->validation->setRules($rule,$messages);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }


    private function validateUpdateUser($requestData)
    {
        $rule = [
            'email' => 'valid_email|is_unique[users.email,id,'.$requestData->getPost()['id'].']',
            'name' => 'max_length[100]',

        ];
        $messages = [
            'email' => [
                'valid_email' => 'Tài khoản {field} {value} không đúng định dạng!',
                'is_unique'   => 'Email đã tồn tại! Vui lòng kiểm tra lại!'
            ],
            'name' => [
                'max_length' => 'Tên quá dài, vui lòng nhập {param} kí tự!'
            ],
        ];
        
        if(!empty($requestData->getPost()['change_password'])){
            $rule['password'] = 'max_length[30]|min_length[6]';
            $rule['password_confirm'] = 'matches[password]';
            $messages ['password'] = [
                    'max_length' => 'Mật khẩu quá dài, vui lòng nhập {param} kí tự!',
                    'min_length' => 'Mật khẩu ít nhất {param} kí tự!',
            ];
            $messages ['password_confirm'] = [
                'matches' => 'Mật khẩu không khớp, vui lòng kiểm tra lại!'
            ];
        }
        $this->validation->setRules($rule,$messages);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }


}
