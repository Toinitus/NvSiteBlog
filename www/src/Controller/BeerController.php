<?php
namespace App\Controller;

use \Core\Controller\Controller;


class BeerController extends Controller
{



    public function __construct()
    {
        $this->loadModel('beer');
    }




    public function show ()
    {
        $tva = constant("TVA");
        $beerArray = $this->beer->selectBeer();
        $tvaArray =[];



        $this->render(
            'beer/show',
            [
                "beerArray" => $beerArray
            ]
        );
    }









}