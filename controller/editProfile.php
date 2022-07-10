<?php
require_once '../dao/userDAO.php';
require_once '../dto/userDTO.php';
require_once '../utils/profile.php';
session_start();

$idUser = $_COOKIE['idmods'];
$profile = $_FILES['prof'];
$name = $_POST['name'];

$userDTO = new UserDTO();
$userDAO = new UserDAO();
$candy = new Profile();

$originalProfile = $userDAO->findById($idUser);
$user = $userDAO->findByName($name);

if((!empty($user)) && ($name != $originalProfile['name']))
{   
    $_SESSION['userExistForMods'] = true;
    header("Location: ../view/profile.php");
    exit;
}

if(!empty($profile['name']))
{
    $profile['originalImage'] = $originalProfile['profile'];
    $userDTO->setProfile($candy->saveProfile($profile));
}else
{
    $userDTO->setProfile($originalProfile['profile']);
}

$userDTO->setName($name);
$userDTO->setId($idUser);

if($userDAO->editProfile($userDTO) == true)
{
    echo "<script>history.go(-1)</script>";
}else
{
    echo "<script>alert('houve um erro!')</script>";
    echo "<script>history.go(-1)</script>";
}