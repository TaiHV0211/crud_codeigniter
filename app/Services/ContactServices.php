<?php

namespace App\Services;
use App\Models\ContactModel;
use App\Common\ResultUtils;
use Exception;

class ContactServices extends BaseServices
{
    private $contact;
    function __construct()
    {
        parent::__construct();
        $this->contact = new ContactModel();
        $this->contact->protect(false);
    }

    public function getDataContact()
    {
       return $this->contact->orderBy('id','DESC')->paginate(2);
    }
   public function getPagerDataContact()
   {
    return $this->contact->pager;

   }
}
