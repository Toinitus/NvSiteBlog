<?php
namespace App\Model\Table;

use Core\Model\Table;

class BeerTable extends Table
{

    public  function    selectBeer()
    {
        return $this->query("SELECT * FROM beer");
    }






}