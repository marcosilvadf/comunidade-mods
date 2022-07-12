<?php
require_once '../dao/denunDAO.php';
require_once '../dto/denunDTO.php';

$modId = $_POST['modId'];
$userModId = $_POST['userModId'];
$userId = $_POST['userId'];
$title = $_POST['titleD'];
$desc = $_POST['descD'];

$denunDTO = new DenunDTO();
$denunDAO = new DenunDAO();

$denunDTO->setModId($modId);
$denunDTO->setUserModId($userModId);
$denunDTO->setUserId($userId);
$denunDTO->setTitle($title);
$denunDTO->setDesc($desc);

if($denunDAO->saveDenun($denunDTO))
{
    echo "<script>alert('Sua denúncia foi enviada!')</script>";
    echo "<script>history.go(-2)</script>";
}else
{
    echo "<script>alert('Oops, houve um erro :/ ou se tentou antes já há um denúncia sua para este mod :)')</script>"; 
    echo "<script>history.go(-2)</script>";
}