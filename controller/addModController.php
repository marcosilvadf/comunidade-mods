<?php
require_once '../dao/modDAO.php';
require_once '../dto/modDTO.php';
require_once '../dao/userDAO.php';
require_once '../utils/banner.php';
session_start();

$idUser = $_POST['idUser'];
$bannerMod = $_FILES['modImage'];
$title = $_POST['titulo'];
$descMod = $_POST['descMod'];
$tamB = $_POST['nTam'];
$tamType = $_POST['tTam'];
$typeMod = $_POST['typeMod'];
$video = $_POST['video'];
$download = $_POST['download'];

$modDAO = new ModDAO();
$modDTO = new ModDTO();
$banner = new Banner();

$nameBanner = $banner->saveBanner($bannerMod);

if($nameBanner == 'error')
{
    $_SESSION['error'] = 'error';
    header('Location: ../view/formAddMod.php');
}

$modDTO->setBanner($nameBanner);
$modDTO->setTitle($title);
$modDTO->setDesc($descMod);
$modDTO->setSize($tamB . $tamType);
$modDTO->setType($typeMod);
$modDTO->setYt($video);
$modDTO->setDown($download);
$modDTO->setUserId($idUser);

$res = $modDAO->saveMod($modDTO);

if($res && is_bool($res) )
{
    $userDAO = new UserDAO();
    $level = $userDAO->findById($idUser);
    if($level['level'] == 1)
    {
        $userDAO->upLevel($idUser);
    }
    header("Location: ../view/managerMods.php");
}else
{
    $error = json_encode($res);
    unlink($nameBanner);
}

echo "<script>window.sessionStorage.setItem('error', '$error')</script>";
echo "<script> history.back()</script>";