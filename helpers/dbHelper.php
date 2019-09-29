<?php

class DbHelper {
    public static function connect() {
        try
        {
            $bdd = new PDO('mysql:host=localhost;port=3306;dbname=jelejhyx_p4;charset=utf8', 'jelejhyx_jelec', 'GqE2h7QxDf1grZHAwV');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        return $bdd;    
    }
};