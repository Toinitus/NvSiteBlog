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


    public function connexion(){

        //appel de fonction pour ssavoir si user connecte
        $userConnected = true;

        $this->render(
            'index',
            [
                "userConnected" => $userConnected,
            ]
        );
    }

    public function deconnexion(){

        //appel de fonction pour ssavoir si user connecte
        $userConnected = false;

        $this->render(
            'index',
            [
                "userConnected" => $userConnected,
            ]
        );
    }









}