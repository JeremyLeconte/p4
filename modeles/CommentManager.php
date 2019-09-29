<?php

require_once('./modeles/Comment.php');

class CommentManager {

    public function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function getByArticle($article) {

    // Requete SQL
       
        $query = 'SELECT Id, Name, Content, articleId, DATE_FORMAT(Date, \'%d/%m/%Y\') AS date ';
        $query = $query . 'FROM commentaires ';
        //$query = $query . 'WHERE articleId = ' . $article;
        $query = $query . 'WHERE articleId = ?';
        $query = $query . ' ORDER BY Id DESC ';
        $req = $this->bdd->prepare($query);
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
        
        
        $query = 'INSERT INTO commentaires (Name, Content, articleId, Date) ';
        $query = $query . 'VALUES(:name, :content, :id, NOW())';
        $req = $this->bdd->prepare($query);

        $affectedLines = $req->execute(array(
            'id'=> $postId,
            'name'=> $postName, 
            'content'=> $postContent));

        return $affectedLines;
    }

    //EDIT

    public function saveComment($postId, $postName, $postContent){
        
        
        $query = 'INSERT INTO commentaires (Name, Content, articleId, Date) ';
        $query = $query . 'VALUES(:name, :content, :id, NOW())';
        $req = $this->bdd->prepare($query);

        $affectedLines = $req->execute(array(
            'id'=> $postId,
            'name'=> $postName, 
            'content'=> $postContent));

        return $affectedLines;
    }
    
    //Signal

    public function signal($id){
        

        $query ='INSERT INTO signalement (Date, CommentId) VALUES (NOW(), :id)';
        $req = $this->bdd->prepare($query);
        $affectedLines = $req->execute(array(
            
            'id'=> $id,
        ));
        return $affectedLines;
    }
    public function getAll() {
       // Requete SQL
      
       $query = 'SELECT Id, Name, Content, articleId, DATE_FORMAT(Date, \'%d/%m/%Y\') AS date ';
       $query = $query . 'FROM commentaires ';
       $req = $this->bdd->prepare($query);
       
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
 
    $query = 'SELECT Id, Name, Content, articleId, DATE_FORMAT(Date, \'%d/%m/%Y à %Hh%imin%ss\') AS date ';
    $query = $query . 'FROM commentaires ';
    $query = $query . 'WHERE Id = ?';
    $req = $this->bdd->prepare($query);
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

     
        $query ='DELETE FROM commentaires ';
        $query = $query . 'WHERE ID = :id';
        $req = $this->bdd->prepare($query);
        $req->execute(array(
            'id'=> $id
        ));
    }
}