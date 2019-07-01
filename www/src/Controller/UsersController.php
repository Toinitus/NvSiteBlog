<?php
namespace App\Controller;

use \Core\Controller\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->loadModel('users'); // charge le modele de la bdd (tous se qui va se trouver table et entity)
    }


    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['sendForm1'] == 'sendForm1') //ERREUR VERIFICATION ENVOI FORM
        {
            $email = htmlspecialchars(strtolower($_POST['email']));
            $password = htmlspecialchars($_POST['password']);
            if (!empty($email && $password)) {
                $user = $this->users->verifMail($email);
                if ($user) {
                    if (password_verify($password, $user->getPassword())){
                    
                        $_SESSION['user'] = $user;
                        //dd($_SESSION['user']);

                        header('Location: /profil');
                        exit;
                    }
                }
            }
        }
        $this->render("users/login");
    }    


    public function inscription()
    {
        if(	
        isset($_POST["username"]) && !empty($_POST["username"]) &&  
        isset($_POST["lastname"]) && !empty($_POST["lastname"]) &&
        isset($_POST["firstname"]) && !empty($_POST["firstname"]) &&
        isset($_POST["address"]) && !empty($_POST["address"]) &&
        isset($_POST["zipCode"]) && !empty($_POST["zipCode"]) &&
        isset($_POST["city"]) && !empty($_POST["city"]) &&
        isset($_POST["country"]) && !empty($_POST["country"]) &&
        isset($_POST["phone"]) && !empty($_POST["phone"]) &&
        isset($_POST["mail"]) && !empty($_POST["mail"]) &&
        isset($_POST["password"]) && !empty($_POST["password"]) &&
        isset($_POST["passwordVerify"]) && !empty($_POST["passwordVerify"])//&&
        //isset($_POST["robot"]) && empty($_POST["robot"])//protection robot
    ){
        
        if(
            ( 	filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)
            ) &&
            ( $_POST["password"] == $_POST["passwordVerify"])
        ){
            $mail = $_POST["mail"];
            $user=$this->users->verifMail($mail);
        
            if(!$user){
                $password = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_BCRYPT);
                $arrayUser = [
                    ":username"		=> htmlspecialchars($_POST["username"]),
                    ":lastname"		=> htmlspecialchars($_POST["lastname"]),
                    ":firstname"	=> htmlspecialchars($_POST["firstname"]),
                    ":address"		=> htmlspecialchars($_POST["address"]),
                    ":zipCode"		=> htmlspecialchars($_POST["zipCode"]),
                    ":city"			=> htmlspecialchars($_POST["city"]),
                    ":country"		=> htmlspecialchars($_POST["country"]),
                    ":phone"		=> htmlspecialchars($_POST["phone"]),
                    ":mail"			=> htmlspecialchars($_POST["mail"]),
                    ":password"		=> $password,
                ];
                $resultUser=$this->users->userCreate($arrayUser);
                    if($resultUser)
                    {
                        $_SESSION['user'] = $resultUser;
                        header('Location: /profil');
                    }
                }
            }
        }//fin verification mail et password
        $this->render(
            "users/inscription",
            [

            ]
            );
    }

    public function profil()
    {
        if(isset($_SESSION['user'])){
            $this->render("users/profil");
        } else {
            $url = $this->generateUrl('login');
            header('Location: ' . $url);
        }
    }




    public function deconnexion()
    {
        if (session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }
        session_unset();
        session_destroy();
        header('Location: /');
        exit;
    }


}


