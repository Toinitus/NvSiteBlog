<?php
namespace App\Controller;

use \Core\Controller\Controller;


class BoutiqueController extends Controller
{



    public function __construct()
    {
        $this->loadModel('boutique');
    }




    public function show ()
    {
        $tva = constant("TVA");
        $beerArray = $this->boutique->selectBeer();
        $tvaArray =[];



        $this->render(
            'boutique/show',
            [
                "beerArray" => $beerArray
            ]
        );
    }









}