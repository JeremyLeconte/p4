<?php

require_once('./modeles/Model.php');

class Comment extends Model {

    // Propriétés
    private $Id;
    private $Name;
    private $Content;
    private $date;
    private $articleId;
    private $isReported;
    // Constructor
    public function __construct($data) {
        $this->hydrate($data);
    }

    // Getters
    public function getIsReported() {
        return $this->isReported;
    }
    public function getId() {
        return $this->Id;
    }
    
    public function getName() {
        return $this->Name;
    }

    public function getContent() {
        return $this->Content;
    }

    public function getdate() {
        return $this->date;
    }

    public function getarticleId() {
        return $this->articleId;
    }
    // Setters
    public function setIsReported($pReported) {
        $this->isReported = $pReported;
    }
    public function setId($pId) {
        $this->Id = $pId;
    }
    
    public function setName($pName) {
        $this->Name = $pName;
    }

    public function setContent($pContent) {
        $this->Content = $pContent;
    }

    public function setdate($pdate) {
        $this->date = $pdate;
    }

    public function setarticleId($particleId) {
        $this->articleId = $particleId;
    }
}