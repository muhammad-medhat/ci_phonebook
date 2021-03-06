<?php

namespace App\Controllers;
use App\Models\ContactModel;

use App\Controllers\BaseController;
class Contactscontroller extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->contacts_model = new \App\Models\ContactModel();
        // $this->perpage=10;
    }

    public function index()
    {
        $this->data['contacts'] =  $this->contacts_model->findAll();
        return view('contacts/index', $this->data);
    }
    public function single(){
        return view('contacts/single', $this->data);
    }
    
    public function add_new(){
        $this->data['title']  = 'add new contact';
        if(strtolower($this->request->getMethod() == 'post')){
            $this->data['title'] .= ' - post';
            $this->contacts_model->save($_POST);
            // var_dump($_POST);
            return $this->index();
        }
        return view('contacts/add_new', $this->data);
    }
    

    public function insert(){
        var_dump($_POST);
        return view('contacts/insert', $this->data);
    }

}
