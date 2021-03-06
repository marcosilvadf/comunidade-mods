<?php
require_once '../dto/userDTO.php';
require_once '../dao/userDAO.php';
require_once '../utils/profile.php';
require_once '../utils/candy.php';
session_start();

$user = $_POST['user'];
$prof = $_FILES['prof'];
$pass = md5($_POST['pass']);
$keyForPass = $_POST['keyForPass'];

$userDTO = new UserDTO();
$profile = new Profile();
$candy = new Cookie();

$nameProfile = $profile->saveProfile($prof);  
$userDTO->setProfile($nameProfile);

$userDTO->setName($user);
$userDTO->setPass($pass);
$userDTO->setKeyForPass($keyForPass);

$userDAO = new UserDAO();

$saveSucess = $userDAO->save($userDTO);


if(is_numeric($saveSucess))
{
    $userLogin = $userDAO->findById($saveSucess);
    $candy->saveLogin($userLogin);
    header("Location: ../index.php");
}else
{
    unlink($nameProfile);
    $_SESSION['errorsave'] = "<p>Oops, algo deu errado: $saveSucess</p>";
    header("Location: ../view/formSignInUser.php");
}