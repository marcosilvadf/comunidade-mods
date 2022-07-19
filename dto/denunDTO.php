<?php

class DenunDTO{
    private $userId;
    private $userModId;
    private $modId;
    private $title;
    private $desc;
    private $status;
    

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;

    }

    public function getUserModId()
    {
        return $this->userModId;
    }

    public function setUserModId($userModId)
    {
        $this->userModId = $userModId;

    }

    public function getModId()
    {
        return $this->modId;
    }

    public function setModId($modId)
    {
        $this->modId = $modId;

    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;

    }

    public function getDesc()
    {
        return $this->desc;
    }

    public function setDesc($desc)
    {
        $this->desc = $desc;

    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

    }
}