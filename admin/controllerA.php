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

$resMods = $adminDAO->listAllMods();

if($resMods[0])
{
    echo "<script>sessionStorage.setItem('sqlRes', '" . json_encode($resMods[1]) . "')</script>";
}else
{
    $resMods[1] = str_replace("'", "", $resMods[1]);
    echo "<script>sessionStorage.setItem('sqlRes', '" . json_encode($resMods[1]) . "')</script>";
}