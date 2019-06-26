<?php
namespace App\Controller;

use \Core\Controller\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->loadModel('users');
    }


    public function login()
    {
        $this->render(
            "users/login",
            [

            ]
            );
    }




    public function inscription()
    {
        $this->render(
            "users/inscription",
            [

            ]
            );
    }



}