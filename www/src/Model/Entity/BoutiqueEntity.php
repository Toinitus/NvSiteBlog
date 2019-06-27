<?php
namespace App\Model\Entity;
use Core\Model\Entity;
class BoutiqueEntity extends Entity
{
    private $title;
    private $img;
    private $content;
    private $price;
    public function getTitle() :string
    {
        return $this->title;
    }
    public function getImg() :string
    {
        return $this->img;
    }
    public function getContent() :string
    {
        return $this->content;
    }
    public function getPrice() :int
    {
        return $this->price;
    }
}