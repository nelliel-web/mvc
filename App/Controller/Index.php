<?php

namespace App\Controller;

class Index
{
    public $view;

    public function indexAction(){

        include "App/Model/modelUser.php";
        $this->view->userModel = new modelUser();
        //$user = new modelUser();
        //$user->setName('Alexandr');
    }

    public function userProfileAction(){
        include "../Model/modelUser.php";
        $user = new modelUser();
        $user->load($_GET['id']);
        $user->view->user = $user;
    }
}