<?php

require_once('./modeles/Log.php');

class LoginManager {

    public function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function logginIn() {

        // Requete SQL
            
            $query = 'SELECT identifiants.Id, identifiants.Log, identifiant.Password';
            $query = $query . ' FROM identifiants ';
            $req = $this->bdd->prepare($query);
            
            // ------
            $Logs = array();
    
            // Hydratation
            
            while($data=$req->fetch(PDO::FETCH_ASSOC)) {
                $Logs[] = new Log($data);
            }
    
            return $Logs;
    }
    public function getByLogin($login) {
        
            
            $query = $this->bdd->prepare('SELECT Password FROM identifiants WHERE Log = :login');
            $query->bindParam(':login', $login, PDO::PARAM_STR);
            $query->execute();
            $password = $query->fetch();
    
            return $password['Password'];
    
    }
}