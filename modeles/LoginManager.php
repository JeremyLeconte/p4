<?php

require_once('./modeles/Log.php');

class LoginManager {

    public function logginIn() {

        // Requete SQL
            try
            {
                $bdd = new PDO('mysql:host=localhost1;port=3308;dbname=blog;charset=utf8', 'root', '');

            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }
            
            $query = 'SELECT identifiants.Id, identifiants.Log, identifiant.Password';
            $query = $query . ' FROM identifiants ';
            $req = $bdd->query($query);
            
            // ------
            $Logs = array();
    
            // Hydratation
            
            while($data=$req->fetch(PDO::FETCH_ASSOC)) {
                $Logs[] = new Log($data);
            }
    
            return $Logs;
    }
    public function getByLogin($login) {
        
        try
            {
                $bdd = new PDO('mysql:host=localhost1;port=3308;dbname=blog;charset=utf8', 'root', '');

            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage());
            }
            
            $query = $bdd->prepare('SELECT Password FROM identifiants WHERE Log = :login');
            $query->bindParam(':login', $login, PDO::PARAM_STR);
            $query->execute();
            $password = $query->fetch();
    
            return $password['Password'];
    
    }
}