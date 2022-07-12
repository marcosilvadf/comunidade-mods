<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/mobile.css">
    <script src="../js/menu.js" defer></script>
    <script src="../js/loadProfileSQLView.js" defer></script>
    <script src="../js/menuFloat.js" defer></script>
    <title>Ver mod</title>
</head>
<body onload="profile()">
    <header>
        <div class="menu">
            <div class="menuIcon" onclick="showMenu()">

            </div>
        </div>
        <div class="title"><a href="../index.php">mods</a></div>
        <div class="login" onclick="menuFloat()">
            <img src="../image/logo.png" alt="" class="menuFloat">
        </div>

        <div class="floatMenu">
            <div>
                <img src="../image/logo.png" alt="" id="menuProfile">
                <ul>
                    
                </ul>
            </div>
        </div>
    </header>

    <div class="boxMenu">
        <div class="contentMenu">
            <ul>
                <li><a href="../index.php">Início</a></li>
                <li><a href="../view/allmods.php">Mods</a></li>
                <li id="entCad"></li>
                <li><a href="about.php">Sobre</a></li>
            </ul>
        </div>

        <div class="blankMenu" onclick="showMenu()">

        </div>
    </div>

    <main>

    <?php
    require_once '../dao/modDAO.php';
    session_start();

    $modId = $_GET['modId'];

    $modDAO = new ModDAO();

    $mod = $modDAO->getModById($modId);
    $_SESSION['modId'] = $mod['modId'];
    $_SESSION['modUserId'] = $mod['userId'];
    $_SESSION['downModLink'] = $mod['downloadMod'];
    $_SESSION['youtubeMod'] = $mod['youtubeMod'];

    ?>
        <div class="bannerMod">
            <img src="<?= $mod['bannerMod']?>" alt="">
            <div class="descMod">
                <h2><?= $mod['titleMod']?></h2>
                <p><?= $mod['descMod']?></p>

                <div class="upProfile" style="margin-bottom: 10px;">
                    <img src="<?= $mod['profile']?>" alt="">
                    <h4><?= $mod['name']?></h4>
                </div>

                <div class="list">
                    <ul>
                        <li><a href="../view/denunciation.php" style="color: white;">Denunciar Mod</a></li>
                        <li>Downloads: <?= $mod['countDownloads']?></li>
                        <li>Postado: <?= date('d/m/Y', strtotime($mod['registrationDate']))?></li>
                        <li>Tamanho: <?= strtoupper($mod['sizeMod'])?></li>
                        <li>Tipo: <?= ucfirst($mod['typeMod'])?></li>
                    </ul>
                </div>                        

                <div class="line">
                    <a href="../controller/openVideo.php">Ver vídeo</a>
                    <a href="../controller/downloadMod.php">Baixar</a>
                </div>            
            </div>
        </div>        
    </main>

    <footer>
        <div id="nav" style="display: none;"></div>
    </footer>
</body>
</html>