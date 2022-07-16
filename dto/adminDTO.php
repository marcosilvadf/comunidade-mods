<?php

class AdminDTO
{
    private $id;
    private $name;
    private $pass;
    private $sqlCode;
    private $sqlType;
    

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

    }

    public function getPass()
    {
        return $this->pass;
    }

    public function setPass($pass)
    {
        $this->pass = $pass;

    }

    public function getSqlCode()
    {
        return $this->sqlCode;
    }

    public function setSqlCode($sqlCode)
    {
        $this->sqlCode = $sqlCode;

    }

    public function getSqlType()
    {
        return $this->sqlType;
    }

    public function setSqlType($sqlType)
    {
        $this->sqlType = $sqlType;

    }
}