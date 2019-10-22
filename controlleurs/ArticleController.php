<?php

require_once('./modeles/ArticleManager.php');
require_once('./modeles/CommentManager.php');


class ArticleController {

    public function __construct($bdd) {
        $this->ArticleManager = new ArticleManager($bdd);
        $this->CommentManager = new CommentManager($bdd);
    }

    public function getArticles($pageIx) {
        $nbPages = $this->ArticleManager->getPagesCount();
        $articles = $this->ArticleManager->getArticles($pageIx);


        // Chargement de la vue
        require_once('./vues/HomeView.php');
    }    
    
    public function getArticle($id) {
        $reponse = $this->ArticleManager->getById($id);
        $article = $reponse[0];
        $error = $reponse[1];
        $Comments = $this->CommentManager->getByArticle($id);


        require_once('./vues/ArticleView.php');
    }

    public function getTableArticles() {
        $articles = $this->ArticleManager->getAll();
        
        return $articles;
    }
    public function getArticleToUpdate($id) {
        $reponse = $this->ArticleManager->getById($id);
        $article = $reponse[0];
        $error = $reponse[1];

        require_once('./vues/AdminUpdateArticle.php');
    }
    public function saveArticle($postId){
        
        $Title = $_POST['Title'];
        $Content = $_POST['Content'];
        $affectedLines = $this->ArticleManager->saveArticle($postId, $Title, $Content);
    
        if($affectedLines === false) {
            die("Impossible de modifier l'article");
        }
    
        else {
            header('Location: index.php?page=article&id='.$article);
        }
    }
    public function saveNewArticle(){
        
        $Title = $_POST['Title'];
        $Content = $_POST['Content'];
        $affectedLines = $this->ArticleManager->saveNewArticle($Title, $Content);
    
        if($affectedLines === false) {
            die("Impossible de modifier l'article");
        }
    
        else {
            header('Location: index.php?page=article&id='.$article);
        }
    }
    public function insertArticle(){

        require_once('./vues/AdminInsertArticle.php');
    }
    public function deleteArticle($postId){
        $this->ArticleManager->deleteArticle($postId);
        header('Location: index.php?page=InterfaceAdmin');
    }
    function isLoggedIn() {
        return $_SESSION ["isLoggedIn"] == true;
    }
}


