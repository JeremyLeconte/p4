<?php

require_once('./modeles/Comment.php');

class CommentManager {

    public function getByArticle($article) {

    // Requete SQL
        try
        {
            $bdd = new PDO('mysql:host=localhost;port=3306;dbname=jelejhyx_p4;charset=utf8', 'jelejhyx_jelec', 'GqE2h7QxDf1grZHAwV');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        $query = 'SELECT Id, Name, Content, articleId, DATE_FORMAT(Date, \'%d/%m/%Y\') AS date ';
        $query = $query . 'FROM commentaires ';
        //$query = $query . 'WHERE articleId = ' . $article;
        $query = $query . 'WHERE articleId = ?';
        $query = $query . ' ORDER BY Id DESC ';
        $req = $bdd->prepare($query);
        $req->execute(array($article));
        
        // ------
        $Comments = array();

        // Hydratation
        
        while($data=$req->fetch(PDO::FETCH_ASSOC)) {
            $Comments[] = new Comment($data);
        }

        return $Comments;
    }

        // POST
        
    public function addComment($postId, $postName, $postContent){
        
        try
        {
            $bdd = new PDO('mysql:host=localhost;port=3306;dbname=jelejhyx_p4;charset=utf8', 'jelejhyx_jelec', 'GqE2h7QxDf1grZHAwV');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        $query = 'INSERT INTO commentaires (Name, Content, articleId, Date) ';
        $query = $query . 'VALUES(:name, :content, :id, NOW())';
        $req = $bdd->prepare($query);

        $affectedLines = $req->execute(array(
            'id'=> $postId,
            'name'=> $postName, 
            'content'=> $postContent));

        return $affectedLines;
    }

    //EDIT

    public function saveComment($postId, $postName, $postContent){
        
        try
        {
            $bdd = new PDO('mysql:host=localhost;port=3306;dbname=jelejhyx_p4;charset=utf8', 'jelejhyx_jelec', 'GqE2h7QxDf1grZHAwV');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        $query = 'INSERT INTO commentaires (Name, Content, articleId, Date) ';
        $query = $query . 'VALUES(:name, :content, :id, NOW())';
        $req = $bdd->prepare($query);

        $affectedLines = $req->execute(array(
            'id'=> $postId,
            'name'=> $postName, 
            'content'=> $postContent));

        return $affectedLines;
    }
    
    //Signal

    public function signal($id){
        
        try
        {
            $bdd = new PDO('mysql:host=localhost;port=3306;dbname=jelejhyx_p4;charset=utf8', 'jelejhyx_jelec', 'GqE2h7QxDf1grZHAwV');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

        $query ='INSERT INTO signalement (Date, CommentId) VALUES (NOW(), :id)';
        $req = $bdd->prepare($query);
        $affectedLines = $req->execute(array(
            
            'id'=> $id,
        ));
        return $affectedLines;
    }
    public function getAll() {
       // Requete SQL
       try
       {
           $bdd = new PDO('mysql:host=localhost;port=3306;dbname=jelejhyx_p4;charset=utf8', 'jelejhyx_jelec', 'GqE2h7QxDf1grZHAwV');
       }
       catch(Exception $e)
       {
           die('Erreur : '.$e->getMessage());
       }
       $query = 'SELECT Id, Name, Content, articleId, DATE_FORMAT(Date, \'%d/%m/%Y\') AS date ';
       $query = $query . 'FROM commentaires ';
       $req = $bdd->query($query);
       
       // ------
       $Comments = array();

       // Hydratation
       
       while($data=$req->fetch(PDO::FETCH_ASSOC)) {
           $Comments[] = new Comment($data);
       }

       return $Comments;
   }
   public function getById($id) {
    // Requete SQL
    try
    {
        $bdd = new PDO('mysql:host=localhost;port=3306;dbname=jelejhyx_p4;charset=utf8', 'jelejhyx_jelec', 'GqE2h7QxDf1grZHAwV');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    $query = 'SELECT Id, Name, Content, articleId, DATE_FORMAT(Date, \'%d/%m/%Y à %Hh%imin%ss\') AS date ';
    $query = $query . 'FROM commentaires ';
    $query = $query . 'WHERE Id = ?';
    $req = $bdd->prepare($query);
    $req->execute(array($id));

     
    // ------
    $commentBdd = $req->fetch(PDO::FETCH_ASSOC);

    $comment = null;
    $error = null;
    if ($commentBdd == false) {
        $error = true;
    } else {
        // Hydratation
        $comment = new Comment($commentBdd);
    }

    return [$comment, $error];
    }
    public function deleteComment($id){

        try
        {
            $bdd = new PDO('mysql:host=localhost;port=3306;dbname=jelejhyx_p4;charset=utf8', 'jelejhyx_jelec', 'GqE2h7QxDf1grZHAwV');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        $query ='DELETE FROM commentaires ';
        $query = $query . 'WHERE ID = :id';
        $req = $bdd->prepare($query);
        $req->execute(array(
            'id'=> $id
        ));
    }
}