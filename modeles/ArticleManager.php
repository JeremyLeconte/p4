<?php

require_once('./modeles/Article.php');

class ArticleManager {

    public function getArticles($page = 2) {

    // Requete SQL
        try
        {
            $bdd = new PDO('mysql:host=localhost;port=3306;dbname=jelejhyx_wp1;charset=utf8', 'jelejhyx_jelec', 'GqE2h7QxDf1grZHAwV');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        $query = 'SELECT ID, title, content, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%i\') AS date_post_fr ';
        $query = $query . 'FROM articles ';
        $query = $query . 'ORDER BY ID DESC ';
        $query = $query . 'LIMIT '.(($page - 1) * 5).', 5';
        $req = $bdd->query($query);
        
        // ------
        $articles = array();

        // Hydratation
        
        while($data=$req->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = new Article($data);
        }

        return $articles;
    }

    public function getPagesCount() {
        // Requete SQL
        try
        {
            $bdd = new PDO('mysql:host=localhost;port=3306;dbname=jelejhyx_wp1;charset=utf8', 'jelejhyx_jelec', 'GqE2h7QxDf1grZHAwV');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        $req = $bdd->query('SELECT COUNT(*) as nb_articles FROM articles ');

        $nbArticles = intval($req->fetch()['nb_articles']);

        $nbPages = ceil($nbArticles / 5);

        return $nbPages;
    }

    public function getById($id) {
        // Requete SQL
        try
        {
            $bdd = new PDO('mysql:host=localhost;port=3306;dbname=jelejhyx_wp1;charset=utf8', 'jelejhyx_jelec', 'GqE2h7QxDf1grZHAwV');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        $query = 'SELECT ID, title, content, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_post_fr ';
        $query = $query . 'FROM articles ';
        $query = $query . 'WHERE ID = '.$id;
        $req = $bdd->query($query);
        
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
         // Requete SQL
        try
        {
            $bdd = new PDO('mysql:host=localhost;port=3306;dbname=jelejhyx_wp1;charset=utf8', 'jelejhyx_jelec', 'GqE2h7QxDf1grZHAwV');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        $query = 'SELECT ID, title, content, DATE_FORMAT(date_post, \'%d/%m/%Y à %Hh%imin%ss\') AS date_post_fr ';
        $query = $query . 'FROM articles ';
        $query = $query . 'ORDER BY ID DESC ';
        $req = $bdd->query($query);
        
        // ------
        $articles = array();

        // Hydratation
        
        while($data=$req->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = new Article($data);
        }

        return $articles;
    }
    public function saveArticle($postId, $postTitle, $postContent){
        
        try
        {
            $bdd = new PDO('mysql:host=localhost;port=3306;dbname=jelejhyx_wp1;charset=utf8', 'jelejhyx_jelec', 'GqE2h7QxDf1grZHAwV');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        $query = 'UPDATE articles SET title= :title, content= :content WHERE id= :id';
        $req = $bdd->prepare($query);

        $affectedLines = $req->execute(array(
            'id'=> $postId,
            'title'=> $postTitle, 
            'content'=> $postContent));

        return $affectedLines;
    }
    public function saveNewArticle($postTitle, $postContent){
        
        try
        {
            $bdd = new PDO('mysql:host=localhost;port=3306;dbname=jelejhyx_wp1;charset=utf8', 'jelejhyx_jelec', 'GqE2h7QxDf1grZHAwV');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        $query = 'INSERT INTO articles (title, content, date_post) ';
        $query = $query . 'VALUES(:title, :content, NOW())';
        $req = $bdd->prepare($query);

        $affectedLines = $req->execute(array(

            'title'=> $postTitle, 
            'content'=> $postContent));

        return $affectedLines;
    }
    public function insertArticle($postId, $postTitle, $postContent){
        
        try
        {
            $bdd = new PDO('mysql:host=localhost;port=3306;dbname=jelejhyx_wp1;charset=utf8', 'jelejhyx_jelec', 'GqE2h7QxDf1grZHAwV');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        $query = 'INSERT INTO articles (id, title, content, date_post) ';
        $query = $query . 'VALUES(:id, :title, :content, NOW())';
        $req = $bdd->prepare($query);

        $affectedLines = $req->execute(array(
            'id'=> $postId,
            'Title'=> $postTitle, 
            'Content'=> $postContent));

        return $affectedLines;
    }
    public function deleteArticle($id){

        try
        {
            $bdd = new PDO('mysql:host=localhost;port=3306;dbname=jelejhyx_wp1;charset=utf8', 'jelejhyx_jelec', 'GqE2h7QxDf1grZHAwV');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        $query ='DELETE FROM articles ';
        $query = $query . 'WHERE ID = :id';
        $req = $bdd->prepare($query);
        $req->execute(array(
            'id'=> $id
        ));
    }

}
?>