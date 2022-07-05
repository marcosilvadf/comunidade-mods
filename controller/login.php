<?php
require_once '../dao/userDAO.php';
require_once '../dto/userDTO.php';
require_once '../utils/candy.php';

$user = $_GET['user'];
$pass = $_GET['pass'];

$userDTO = new UserDTO();

$userDTO->setName($user);
$userDTO->setPass(md5($pass));

$candy = new Cookie();

$userDAO = new UserDAO();
$login = $userDAO->login($userDTO);
if(!empty($login)){
    $candy->saveLogin($login);
    echo "<script>window.sessionStorage.setItem('id', 'true')</script>";
}else{
    $candy->logout();
    echo "<script>window.sessionStorage.setItem('id', 'false')</script>";
}