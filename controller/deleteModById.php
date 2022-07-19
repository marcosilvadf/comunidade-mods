<?php
require_once '../dao/modDAO.php';
require_once '../dao/denunDAO.php';

$modId = $_GET['modId'];

$modDAO = new ModDAO();
$denDAO = new DenunDAO();

$bannerMod = $modDAO->getModById($modId);

$denDAO->deleteByModId($modId);

if($modDAO->deleteModById($modId))
{
    unlink($bannerMod['bannerMod']);
    echo "<script>sessionStorage.setItem('sqlRes', 'true')</script>";
    if(empty($_GET['vlt']))
    {
        echo "<script>history.go(-1)</script>";
    }
}else
{
    echo "<script>sessionStorage.setItem('sqlRes', 'true')</script>";
    if(empty($_GET['vlt']))
    {
        echo "<script>history.go(-1)</script>";
    }
}