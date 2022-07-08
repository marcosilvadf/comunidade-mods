<?php
require_once '../dao/modDAO.php';

$modId = $_GET['modId'];

$modDAO = new ModDAO();

$bannerMod = $modDAO->getModById($modId);

if($modDAO->deleteModById($modId))
{
    unlink($bannerMod['bannerMod']);
    echo "<script>history.go(-1)</script>";
}else
{
    echo '<script>history.go(-1)</script>';
}