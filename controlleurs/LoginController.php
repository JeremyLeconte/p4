<?php

require_once('./modeles/LoginManager.php');

class LoginController {

    public function __construct() {
        $this->LoginManager = new LoginManager();
    
    }
    public function logginIn() {       
        
        require_once('./vues/login.php');
    }
    
    function isLoggedIn() {
        return $_SESSION ["isLoggedIn"] == true;
    }
    
    public function login() {

        //recupération du login et du password via la methode posst

            $login = $_POST['login'];
            $pass = $_POST['pass'];
            
        //récupération depuis la bdd du password correspondant au login 
        
        
        if(isset($_POST["login"]) && isset($_POST["pass"])){
                
            
            $hashPassword = $this->LoginManager->getBylogin($login); 

            // comparaison des deux mdp
            
            if (password_verify($pass, $hashPassword)){


            // si concordance --> remplir notre $_SESSION is logged in                                   
                
                $_SESSION ['isLoggedIn'] = true;
                ?>
                <script language='Javascript'>alert("Vous êtes connecté" );
                location.href = "index.php?page=InterfaceAdmin";
                </script>
                <?php
            
            } else {

                ?>
                <script language='Javascript'>alert("Mot de passe incorrect" );
                location.href = "index.php?page=logginIn";
                </script>
                <?php
            }
        }    
    }
    public function InterfaceAdmin($articles, $Comments) {
        
        require_once('./vues/InterfaceAdmin.php');
    }
}