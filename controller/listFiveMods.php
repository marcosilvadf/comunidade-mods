<?php
require_once '../dao/modDAO.php';

$modDAO = new ModDAO();

$mods = $modDAO->listFiveMods();

$mods = json_encode($mods);
echo "<script>window.sessionStorage.setItem('fiveMods', '$mods')</script>";