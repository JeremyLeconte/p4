<?php

require_once('./modeles/Article.php');

class ArticleManager {

    public function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function getArticles($page = 1) {
        
          
        $query = 'SELECT ID, title, content, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%i\') AS date_post_fr ';
        $query = $query . 'FROM articles ';
        $query = $query . 'ORDER BY ID ';
        $query = $query . 'LIMIT :offset, 5';    
        $req = $this->bdd->prepare($query);
        $offset = (($page - 1) * 5);
        $req->bindParam(':offset', $offset, PDO::PARAM_INT);
        $req->execute();
        
        
        // ------
        $articles = array();
        // Hydratation
            
        while($data=$req->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = new Article($data);
        }
        return $articles;
    }

    public function getPagesCount() {
        
     
        $req = $this->bdd->query('SELECT COUNT(*) as nb_articles FROM articles ');

        $nbArticles = intval($req->fetch()['nb_articles']);

        $nbPages = ceil($nbArticles / 5);

        return $nbPages;
    }

    public function getById($id) {
        

        $query = 'SELECT ID, title, content, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_post_fr ';
        $query = $query . 'FROM articles ';
        $query = $query . 'WHERE ID = ?';
        $req = $this->bdd->prepare($query);
        $req->execute(array($id));
        
        // ------
        $articleBdd = $req->fetch(PDO::FETCH_ASSOC);

        $article = null;
        $error = null;
        if ($articleBdd == false) {
            $error = true;
        } else {
            // Hydratation
            $article = new Article($articleBdd);
        }

        return [$article, $error];
    }
    public function getAll() {
        
        $query = 'SELECT ID, title, content, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_post_fr ';
        $query = $query . 'FROM articles ';
        $query = $query . 'ORDER BY ID DESC ';
        $req = $this->bdd->prepare($query);
        $req->execute();
        // ------
        $articles = array();

        // Hydratation
        
        while($data=$req->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = new Article($data);
        }

        return $articles;
    }
    public function saveArticle($postId, $postTitle, $postContent){
        
        
        $query = 'UPDATE articles SET title= :title, content= :content WHERE id= :id';
        $req = $this->bdd->prepare($query);

        $affectedLines = $req->execute(array(
            'id'=> $postId,
            'title'=> $postTitle, 
            'content'=> $postContent));

        return $affectedLines;
    }
    public function saveNewArticle($postTitle, $postContent){
        
        
        $query = 'INSERT INTO articles (title, content, date_post) ';
        $query = $query . 'VALUES(:title, :content, NOW())';
        $req = $this->bdd->prepare($query);

        $affectedLines = $req->execute(array(

            'title'=> $postTitle, 
            'content'=> $postContent));

        return $affectedLines;
    }
    public function insertArticle($postId, $postTitle, $postContent){
        
     
        $query = 'INSERT INTO articles (id, title, content, date_post) ';
        $query = $query . 'VALUES(:id, :title, :content, NOW())';
        $req = $this->bdd->prepare($query);

        $affectedLines = $req->execute(array(
            'id'=> $postId,
            'Title'=> $postTitle, 
            'Content'=> $postContent));

        return $affectedLines;
    }
    public function deleteArticle($id){

        
        $query ='DELETE FROM articles ';
        $query = $query . 'WHERE ID = :id';
        $req = $this->bdd->prepare($query);
        $req->execute(array(
            'id'=> $id
        ));
    }

}
?>