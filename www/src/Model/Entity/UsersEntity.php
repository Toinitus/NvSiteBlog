<?php
namespace App\Model\Entity;
use Core\Model\Entity;
class UsersEntity extends Entity
{
    private $id_user;
    private $username;
    private $lastname;
    private $firstname;
    private $address;
    private $zipCode;
    private $city;
    private $country;
    private $phone;
    private $mail;
    private $password;
    public function getId()
    {
        return $this->id_user;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getLastname()
    {
        return $this->lastname;
    }
    public function getFirstname()
    {
        return $this->firstname;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function getZipCode()
    {
        return $this->zipCode;
    }
    public function getCity()
    {
        return $this->city;
    }
    public function getCountry()
    {
        return $this->country;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getMail()
    {
        return $this->mail;
    }
    public function getPassword()
    {
        return $this->password;
    }
}