<?php

require_once('./modeles/Model.php');

class Article extends Model {

    // Propriétés
    private $ID;
    private $content;
    private $title;
    private $date_post_fr;

    // Constructor
    public function __construct($data) {
        $this->hydrate($data);
    }

    // Getters
    public function getID() {
        return $this->ID;
    }

    public function getContent() {
        return $this->content;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDate_post_fr() {
        return $this->date_post_fr;
    }
    // Setters
    public function setID($pId) {
        $this->ID = $pId;
    }

    public function setContent($pContent) {
        $this->content = $pContent;
    }

    public function setTitle($pTitle) {
        $this->title = $pTitle;
    }
    public function setDate_post_fr($pDatePost) {
        $this->date_post_fr = $pDatePost;
    }
}