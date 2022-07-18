<?php
require_once '../dao/modDAO.php';
require_once '../dto/modDTO.php';
session_start();

$modDAO = new ModDAO();
$modDTO = new ModDTO();

if(!isset($_COOKIE["$_SESSION[modId]"])){
    $mod = $modDAO->getModById($_SESSION['modId']);
    $modDTO->setId($_SESSION['modId']);
    $modDTO->setCount(intval($mod['countDownloads'])+1);
    $modDAO->addOneDow($modDTO);
    setcookie("$_SESSION[modId]", $_SESSION['modId'], time() + (86400 * 300), "/");
}
header("Location: $_SESSION[downModLink]");