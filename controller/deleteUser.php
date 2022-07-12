<?php
require_once '../dao/userDAO.php';
require_once '../dao/modDAO.php';
require_once '../utils/candy.php';

$id = $_GET['imd'];

$userDAO = new UserDAO();
$modDAO = new ModDAO();
$cookie = new Cookie();

if(!empty($modDAO->listModsById($id)))
{
    if($modDAO->deleteModByUser($id))
    {
        if($userDAO->deleteUser($id))
        {
            $cookie->logout();
            header("Location: ../index.php");
        }
    }
}else
{
    if($userDAO->deleteUser($id))
        {
            $cookie->logout();
            header("Location: ../index.php");
        }
}