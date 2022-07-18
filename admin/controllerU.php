<?php
require_once '../dao/adminDAO.php';
require_once '../dto/adminDTO.php';
require_once '../dto/denunDTO.php';
require_once '../dto/modDTO.php';
require_once '../dto/userDTO.php';

$adminDAO = new AdminDAO();
$adminDTO = new AdminDTO();
$denunDTO = new DenunDTO();
$modDTO = new ModDTO();
$userDTO = new UserDTO();

$resUsers = $adminDAO->listAllUsers();

if($resUsers[0])
{
    echo "<script>sessionStorage.setItem('sqlRes', '" . json_encode($resUsers[1]) . "')</script>";
}else
{
    $resUsers[1] = str_replace("'", "", $resUsers[1]);
    echo "<script>sessionStorage.setItem('sqlRes', '" . json_encode($resUsers[1]) . "')</script>";
}