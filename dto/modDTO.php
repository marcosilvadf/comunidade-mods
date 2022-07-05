<?php

class ModDTO{
    private $id;
    private $title;
    private $banner;
    private $desc;
    private $size;
    private $down;
    private $yt;
    private $type;
    private $count;
    private $date;
    private $userId;
    

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;

    }

    public function getBanner()
    {
        return $this->banner;
    }

    public function setBanner($banner)
    {
        $this->banner = $banner;

    }

    public function getDesc()
    {
        return $this->desc;
    }

    public function setDesc($desc)
    {
        $this->desc = $desc;

    }

    public function getSize()
    {
        return $this->size;
    }

    public function setSize($size)
    {
        $this->size = $size;

    }

    public function getDown()
    {
        return $this->down;
    }

    public function setDown($down)
    {
        $this->down = $down;

    }

    public function getYt()
    {
        return $this->yt;
    }

    public function setYt($yt)
    {
        $this->yt = $yt;

    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;

    }

    public function getCount()
    {
        return $this->count;
    }

    public function setCount($count)
    {
        $this->count = $count;

    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;

    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;

    }
}