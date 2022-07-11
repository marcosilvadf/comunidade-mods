<?php
require_once '../dao/userDAO.php';
require_once '../dto/userDTO.php';

$name = $_GET['name'];
$recovery = $_GET['key'];

$userDTO = new UserDTO();
$userDAO = new UserDAO();

$userDTO->setName($name);
$userDTO->setKeyForPass($recovery);

$user = $userDAO->getUserByKeyForPass($userDTO);

if(!empty($user))
{
    echo "<script>window.sessionStorage.setItem('userForMods', 'true')</script>";
}else
{
    echo "<script>window.sessionStorage.setItem('userForMods', 'false')</script>";
}