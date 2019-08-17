<?php

session_start();
ob_start();

/*
 * Fichier      : index.php
 * Description  : routeur de l'application PHP
 */

// Chargement des helpers
require_once('./helpers/routerHelper.php');

// Chargement des contrôleurs
require_once('./controlleurs/ArticleController.php');
require_once('./controlleurs/CommentController.php');
require_once('./controlleurs/LoginController.php');
$ArticleController = new ArticleController();
$CommentController = new CommentController();
$LoginController = new LoginController();
// Vérification du paramètre d'url
if (array_key_exists('page', $_REQUEST)&& $_REQUEST['page']== 'login') {
    $LoginController->login();
} else {

    if (array_key_exists('page', $_GET)) {
        $page = $_GET['page'];
        switch($page) {
            case "accueil":
                $pageIx = RouterHelper::recupererPageIx($_GET);
                $ArticleController->getArticles($pageIx);           
                break;
            case "article":
                $id = RouterHelper::recupererID($_GET);
                if (is_null($id)) {
                    header('Location: ./index.php');
                } else {
                    $ArticleController->getArticle($id);                
                }
                break;
            case "InterfaceAdmin":
                if (array_key_exists('isLoggedIn', $_SESSION) && $_SESSION['isLoggedIn'] == true) {
                    $articles= $ArticleController->getTableArticles();
                    $Comments= $CommentController->getTableComments();
                    $LoginController->InterfaceAdmin($articles, $Comments);
                
                    //$_SESSION['isLoggedIn'] = false;
                } else {
                    header("Location: ./index.php?page=logginIn");
                }  
            break;
            case "insertArticle":
                if (array_key_exists('isLoggedIn', $_SESSION) && $_SESSION['isLoggedIn'] == true) {
                    $articles=$ArticleController->insertArticle();
                } else {
                    header("Location: ./index.php?page=logginIn");
                }   
                break;
            case "saveArticle":
                if (array_key_exists('isLoggedIn', $_SESSION) && $_SESSION['isLoggedIn'] == true) {
                    $id = RouterHelper::recupererID($_GET);
                    $ArticleController->saveArticle($id);
                } else {
                    header("Location: ./index.php?page=logginIn");
                }   
                break;
            case "saveNewArticle":
                if (array_key_exists('isLoggedIn', $_SESSION) && $_SESSION['isLoggedIn'] == true) {
                    $ArticleController->saveNewArticle();
                } else {
                    header("Location: ./index.php?page=logginIn");
                }   
                break;
            case "deleteArticle":
                if (array_key_exists('isLoggedIn', $_SESSION) && $_SESSION['isLoggedIn'] == true) {
                    $id = RouterHelper::recupererID($_GET);
                    $ArticleController->deleteArticle($id);
                } else {
                    header("Location: ./index.php?page=logginIn");
                }   
                break;
            case "deleteComment":
                if (array_key_exists('isLoggedIn', $_SESSION) && $_SESSION['isLoggedIn'] == true) {
                    $id = RouterHelper::recupererID($_GET);
                    $CommentController->deleteComment($id); 
                } else {
                    header("Location: ./index.php?page=logginIn");
                }   
                break;
            case "saveComment":
                if (array_key_exists('isLoggedIn', $_SESSION) && $_SESSION['isLoggedIn'] == true) {
                    $id = RouterHelper::recupererID($_GET);
                    $CommentController->saveComment($id);
                } else {
                    header("Location: ./index.php?page=logginIn");
                }   
                break;
            case "tableArticle":
                if (array_key_exists('isLoggedIn', $_SESSION) && $_SESSION['isLoggedIn'] == true) {    
                    $ArticleController->getTableArticles(); 
                } else {
                    header("Location: ./index.php?page=logginIn");
                }    
                break;
            case "editArticle":
                if (array_key_exists('isLoggedIn', $_SESSION) && $_SESSION['isLoggedIn'] == true) {
                    $id = RouterHelper::recupererID($_GET);
                    $ArticleController->getArticleToUpdate($id);
                } else {
                    header("Location: ./index.php?page=logginIn");
                }      
                break;
            case "tableComment":
                if (array_key_exists('isLoggedIn', $_SESSION) && $_SESSION['isLoggedIn'] == true) {
                    $CommentController->getTableComments();   
                } else {
                    header("Location: ./index.php?page=logginIn");
                }    
                break;  
            case "editComment":
                if (array_key_exists('isLoggedIn', $_SESSION) && $_SESSION['isLoggedIn'] == true) {
                        $id = RouterHelper::recupererID($_GET);
                        $CommentController->getCommentToUpdate($id);
                } else {
                    header("Location: ./index.php?page=logginIn");
                }            
                break;
            case "logginIn":              
                $LoginController->logginIn();            
                break;
            case 'addComment' :
                $id = RouterHelper::recupererID($_GET);
                if (is_null($id)) {
                    header('Location: ./index.php');
                } else {
                    $CommentController->addComment($id);                
                }
                break;
            case 'signal' :
                $id = RouterHelper::recupererID($_GET);
                if (is_null($id)) {
                    header('Location: ./index.php');
                } else {
                    $CommentController->signal($id);
                }
                break;        
            default:
                $pageIx = RouterHelper::recupererPageIx($_GET);
                $ArticleController->getArticles($pageIx);
                break;
        }
    } else {
        $pageIx = RouterHelper::recupererPageIx($_GET);
        $ArticleController->getArticles($pageIx);
    }
}
