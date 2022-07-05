<?php
require_once '../dao/modDAO.php';

$modDAO = new ModDAO();

$mods = $modDAO->listAll();

if(!empty($mods))
{
    $mods = json_encode($mods);
}

echo "<script>window.sessionStorage.setItem('listMods', '$mods')</script>";