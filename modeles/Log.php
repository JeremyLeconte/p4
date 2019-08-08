<?php

require_once('./modeles/Model.php');

class Log extends Model {

    // Propriétés
    private $Id;
    private $Log;
    private $Password;

    // Constructor
    public function __construct($data) {
        $this->hydrate($data);
    }

    // Getters
    public function getId() {
        return $this->Id;
    }

    public function getLog() {
        return $this->Log;
    }

    public function getPassword() {
        return $this->Password;
    }

    // Setters
    public function setId($pId) {
        $this->Id = $pId;
    }

    public function setLog($pLog) {
        $this->Log = $pLog;
    }

    public function setPassword($pPassword) {
        $this->Password = $pPassword;
    }
}