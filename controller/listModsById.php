<?php
require_once '../dao/modDAO.php';

$idUser = $_COOKIE['idmods'];
$modDAO = new ModDAO();

$mods = $modDAO->listModsById($idUser);

if(!empty($mods))
{
    $mods = json_encode($mods);
}else
{
    $mods = json_encode('vazio');
}

echo "<script>window.sessionStorage.setItem('listMods', '$mods')</script>";