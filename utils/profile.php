<?php

define('SERVERPATH', str_replace("\\", "/", $_SERVER['DOCUMENT_ROOT']));

class Profile{

    public function saveProfile($file){
        $pathTmp = $file['tmp_name'];
        $extension = "." . strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $extensionAccept = array('.gif', '.jpeg', '.jpg', '.png');
        $name = uniqid() . $extension;
        $pathEnd = "../image/profile/" . $name;
        if($file['error'] == 0 && in_array($extension, $extensionAccept))
        {
            if(move_uploaded_file($pathTmp, $pathEnd))
            {
                return $pathEnd;
            }else
            {
                echo "Epaaa, deu erro! :(";
            }
        }
    }
}