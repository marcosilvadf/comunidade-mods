<?php
require_once '../dao/adminDAO.php';
require_once '../dto/denunDTO.php';

$userId = $_GET['userId'];
$modUserId = $_GET['modUserId'];
$modId = $_GET['modId'];
$value = $_GET['value'];

$adminDAO = new AdminDAO();
$denunDTO = new DenunDTO();

$denunDTO->setUserId($userId);
$denunDTO->setUserModId($modUserId);
$denunDTO->setModId($modId);
$denunDTO->setStatus($value);

$resAlter = $adminDAO->toggleStatus($denunDTO);

echo "<script>sessionStorage.setItem('sqlRes', '" . json_encode($resAlter[0]) . "')</script>";