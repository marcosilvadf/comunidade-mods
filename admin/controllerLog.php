<?php
require_once '../dao/adminDAO.php';
require_once '../dto/adminDTO.php';
session_start();

$name = $_POST['user'];
$pass = $_POST['pass'];

$adminDAO = new AdminDAO();
$adminDTO = new AdminDTO();

$adminDTO->setName($name);
$adminDTO->setPass(md5($pass));

if($adminDAO->login($adminDTO))
{
    $_SESSION['adminon'] = 'admin';
    header('Location: profile.php');
}else
{
    header('Location: ../index.php');
}