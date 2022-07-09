<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/mobile.css">
    <script src="../js/menu.js" defer></script>
    <title>Ver mod</title>
</head>
<body>
    <header>
        <div class="menu">
            <div class="menuIcon" onclick="showMenu()">

            </div>
        </div>
        <div class="title"><a href="../index.php">mods</a></div>
        <div class="login"><a href="../view/formLogin.php">login</a></div>
    </header>

    <div class="boxMenu">
        <div class="contentMenu">
            <ul>
                <li><a href="../index.php">Início</a></li>
                <li><a href="../view/allmods.php">Mods</a></li>
                <li><a href="../view/formLogin.php">Entrar/<wbr>Cadastrar</a></li>
                <li>Sobre</li>
            </ul>
        </div>

        <div class="blankMenu" onclick="showMenu()">

        </div>
    </div>

    <main>

    <?php
    require_once '../dao/modDAO.php';

    $modId = $_GET['modId'];

    $modDAO = new ModDAO();

    $mod = $modDAO->getModById($modId);
    
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
                        <li>Downloads: <?= $mod['countDownloads']?></li>
                        <li>Postado: <?= date('d/m/Y', strtotime($mod['registrationDate']))?></li>
                        <li>Tamanho: <?= strtoupper($mod['sizeMod'])?></li>
                        <li>Tipo: <?= ucfirst($mod['typeMod'])?></li>
                    </ul>
                </div>                        

                <div class="line">
                    <a href="<?= $mod['youtubeMod']?>" target="_blank">Ver vídeo</a>
                    <a href="<?= $mod['downloadMod']?>" target="_blank">Baixar</a>
                </div>            
            </div>
        </div>        
    </main>

    <footer></footer>    
</body>
</html>