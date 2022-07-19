<?php
require_once '../dao/userDAO.php';
require_once '../dao/modDAO.php';
require_once '../utils/candy.php';
require_once '../dao/denunDAO.php';

$id = $_GET['imd'];

$userDAO = new UserDAO();
$modDAO = new ModDAO();
$cookie = new Cookie();
$denDAO = new DenunDAO();

$denDAO->deleteByUserId($id);
$mods = $modDAO->listModsById($id);
$user = $userDAO->findById($id);

if(!empty($mods))
{

    foreach ($mods as $mod)
    {
        unlink($mod['bannerMod']);
        echo $mod['bannerMod'];
    }

    if($modDAO->deleteModByUser($id))
    {
        if($userDAO->deleteUser($id))
        {
            $cookie->logout();
            unlink($user['profile']);
            echo "<script>sessionStorage.setItem('sqlRes', 'true')</script>";
            header("Location: ../index.php");
        }
    }
}else
{
    if($userDAO->deleteUser($id))
        {
            $cookie->logout();
            unlink($user['profile']);
            echo "<script>sessionStorage.setItem('sqlRes', 'true')</script>";
            header("Location: ../index.php");
        }
}