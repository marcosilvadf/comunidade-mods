<?php
require_once '../dao/modDAO.php';

$id = $_GET['modid'];
$modDAO = new ModDAO();

$mod = $modDAO->getModById($id);

$mod['registrationDate'] = date('d/m/Y', strtotime($mod['registrationDate']));
$mod = json_encode($mod);
echo "<script>window.sessionStorage.setItem('getModId', '$mod')</script>";