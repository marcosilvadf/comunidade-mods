<?php

class UserDTO{
    private $id;
    private $name;
    private $profile;
    private $pass;
    private $keyForPass;
    private $date;
    private $level;
    
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;

    }

    public function getProfile(){
        return $this->profile;
    }

    public function setProfile($profile){
        $this->profile = $profile;

    }

    public function getPass(){
        return $this->pass;
    }

    public function setPass($pass){
        $this->pass = $pass;

    }

    public function getKeyForPass(){
        return $this->keyForPass;
    }

    public function setKeyForPass($keyForPass){
        $this->keyForPass = $keyForPass;

    }

    public function getDate(){
        return $this->date;
    }

    public function setDate($date){
        $this->date = $date;

    }

    public function getLevel(){
        return $this->level;
    }

    public function setLevel($level){
        $this->level = $level;

    }
}