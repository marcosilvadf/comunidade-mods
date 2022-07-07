<?php
require_once '../dao/modDAO.php';
require_once '../dto/modDTO.php';
require_once '../utils/banner.php';

$modId = $_POST['modId'];
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

$imageMod = $modDAO->getModById($modId);

if(!empty($bannerMod['name']))
{
    $nameBanner = $banner->saveBanner($bannerMod);

    if($nameBanner == 'error')
    {
        $_SESSION['error'] = 'error';
        header('Location: ../view/formAddMod.php');
    }else
    {
        $modDTO->setBanner($nameBanner);
        unlink($imageMod['bannerMod']);
    }
}else
{
    $modDTO->setBanner($imageMod['bannerMod']);
}

$modDTO->setId($modId);
$modDTO->setTitle($title);
$modDTO->setDesc($descMod);
$modDTO->setSize($tamB . $tamType);
$modDTO->setType($typeMod);
$modDTO->setYt($video);
$modDTO->setDown($download);

$res = $modDAO->alterMod($modDTO);

if($res && is_bool($res) )
{
    header("Location: ../view/managerMods.php");
}else
{
    $error = json_encode($res);
    unlink($nameBanner);
}

echo "<script>window.sessionStorage.setItem('error', '$error')</script>";
echo "<script> history.back()</script>";