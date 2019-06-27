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
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['sendForm1'] == 'sendForm1') //ERREUR VERIFICATION ENVOI FORM
        {
            $email = htmlspecialchars(strtolower($_POST['email']));
            $password = htmlspecialchars($_POST['password']);
            if (!empty($email && $password)) {
                $user = $this->users->selectEmail($email);
                if ($user) {
                    if (password_verify($password, $user['password'])){
                        if (session_status() != PHP_SESSION_ACTIVE){
                            session_start();
                        }
                        $_SESSION['id'] = $user->getId();
                        
                        //Redirection vers profil
                        $url = $this->generateUrl('profil');
                        header('Location: ' . $url);
                    }
                }
            }
        }
        $this->render("users/login");
    }    


    public function inscription()
    {
        $this->render(
            "users/inscription",
            [

            ]
            );
    }

    public function profil()
    {
        if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
            $this->render("users/profil");
        } else {
            $url = $this->generateUrl('login');
            header('Location: ' . $url);
        }
    }


}


