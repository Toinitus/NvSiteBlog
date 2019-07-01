<?php
namespace App\Model\Table;

use Core\Model\Table;

class UsersTable extends Table
{
    public function verifMail($mail){

    return $this->query("SELECT * FROM users WHERE mail = :mail", [':mail'=> $mail], true);

        }

    public function userCreate($resultUser){
        return $this->query (
            "INSERT INTO users (username, lastname, firstname, address, zipCode, city, country, phone, mail, password)
            VALUES (:username, :lastname, :firstname, :address, :zipCode, :city, :country, :phone, :mail, :password)",
            $resultUser
        );
    
    }

    public function updateForm1($username, $password, $id){
        return $this->query("UPDATE users  SET username = :username, password = :password WHERE id = :id",  [':username' => $username, ':password' => $password, ':id' => $id]);

    }
}

