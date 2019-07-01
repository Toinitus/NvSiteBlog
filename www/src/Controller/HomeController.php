<?php
namespace App\Controller;

use \Core\Controller\Controller;

class HomeController extends Controller
{
    public function index($userConnected=false){

        $this->render(
            'index',
            [
                "userConnected" => $userConnected,
            ]
        );
    }






}