<?php

namespace App\Services;
use App\Models\UserModel;
use App\Common\ResultUtils;
use Exception;

class LoginServices extends BaseServices
{
    private $users;
    function __construct()
    {
        parent::__construct();
        $this->users = new UserModel();
        // $this->user->protect(false);
    }
    public function hasLoginInfo($requestData)
    {
        $validate = $this->validateLogin($requestData);
        if($validate->getErrors()){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' => $validate->getErrors()
            ];
        }

        $params = $requestData->getPost();
        $user =  $this->users->where('email',$params['email'])->first() ;

        if(!$user){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' =>[
                    'notExits' => 'Email chưa được đăng kí'
                ]
            ];
        }

        if(!password_verify($params['password'],$user['password'])){
            return [
                'status' => ResultUtils::STATUS_CODE_ERR,
                'messageCode' => ResultUtils::MESSAGE_CODE_ERR,
                'messages' =>[
                    'wrongPass' => 'Mật khẩu không đúng!'
                ]
            ];
        }

        $session = session();
        unset($user['password']);
        $session->set('user_login',$user);
        return [
            'status' => ResultUtils::STATUS_CODE_OK,
            'messageCode' => ResultUtils::MESSAGE_CODE_OK,
            'messages' => null
        ];
    }

    private function validateLogin($requestData)
    {
        $rule = [
            'email'         => 'valid_email',
            'password'      => 'max_length[30]|min_length[6]'
        ];
        $messages = [
            'email'         =>[
                'valid_email'   => "Tài khoản {filed} {value} không đúng định dạng"
            ],
            'password'      =>[
                'max_length'    => "Mật khẩu quá dài",
                'min_length'    => "Mật khẩu tối đa 6 kí tự",
            ]
        ];
        $this->validation->setRules($rule,$messages);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    public function logoutUser()
    {
        $session = session();
        $session->destroy();
    }
  
}
