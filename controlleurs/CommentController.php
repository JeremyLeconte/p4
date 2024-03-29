<?php

require_once('./modeles/CommentManager.php');

class CommentController {

    public function __construct($bdd) {
        $this->CommentManager = new CommentManager($bdd);
    }

    public function getByArticle() {
        $Comments = $this->CommentManager->getByArticle();
    }
        
    public function addComment($postId) {

        $name = htmlspecialchars($_POST['name']);
        $content = htmlspecialchars($_POST['content']);
        $affectedLines = $this->CommentManager->addComment($postId, $name, $content);
    
        if($affectedLines === false) {
            die('Impossible d\'ajouter le commentaire !');
        }
    
        else {
            header('Location: index.php?page=article&id='.$article);
        }
    } 
    public function signal($id) {
        $affectedLines = $this->CommentManager->signal($id);

        if($affectedLines === false) {
            die('Impossible d\'ajouter le commentaire !');
        }
        
        else {
           $comment= $this->CommentManager->getById($id)[0];
            
            header('Location: index.php?page=article&id='.$comment->getArticleId());
        }
    }
    public function getTableComments() {
        $Comments = $this->CommentManager->getAll();
       
        return $Comments;
    }   
    public function getCommentToUpdate($id) {
        $reponse = $this->CommentManager->getById($id);
        $Comment = $reponse[0];
        $error = $reponse[1];

        require_once('./vues/AdminUpdateComment.php');
    }
    public function saveComment($postId){
        
        $name = $_POST['name'];
        $content = $_POST['content'];
        $affectedLines = $this->CommentManager->saveComment($postId, $name, $content);
    
        if($affectedLines === false) {
            die('Impossible d\'ajouter le commentaire !');
        }
    
        else {
            header('Location: index.php?page=article&id='.$article);
        }
    }
    public function deleteComment($postId){
    
        $this->CommentManager->deleteComment($postId);
        header('Location: index.php?page=InterfaceAdmin');
    }
    public function unreport($commentId){
        
        $this->CommentManager->unreport($commentId);
        header('Location: index.php?page=InterfaceAdmin');
    }
    function isLoggedIn() {
        return $_SESSION ["isLoggedIn"] == true;
    }
}
