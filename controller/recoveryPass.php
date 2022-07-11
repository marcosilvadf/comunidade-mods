<?php
require_once '../dao/userDAO.php';
require_once '../dto/userDTO.php';
require_once '../utils/candy.php';

$user = $_POST['user'];
$pass = $_POST['pass'];

$userDTO = new UserDTO();

$userDTO->setName($user);
$userDTO->setPass(md5($pass));

$userDAO = new UserDAO();
$candy = new Cookie();

$userLogin = $userDAO->findByName($user);
$userDTO->setId($userLogin['id']);

$userDAO->recoveryPass($userDTO);

$candy->saveLogin($userLogin);

header('Location: ../index.php');