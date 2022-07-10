<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/mobile.css">
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <script src="../js/menu.js" defer></script>
    <script src="../lib/fontawesome/js/all.min.js"></script>
    <script src="../js/menuFloat.js" defer></script>
    <script src="../js/loadProfileSQLView.js" defer></script>
    <title>Área dos mods</title>
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
                <li>Mods</li>
                <li id="entCad"></li>
                <li>Sobre</li>
            </ul>
        </div>

        <div class="blankMenu" onclick="showMenu()">

        </div>
    </div>

    <main>

        <div id="modal">
                
        </div>

        <?php
            require_once '../dao/modDAO.php';

            $modDAO = new ModDAO();

            $mods = $modDAO->listAll();

            foreach ($mods as $mod)
            {
                ?>

            <div class="openBanner" onclick="modalDescMod(<?= $mod['modId'] ?>)">
                <div class="bannerMod">
                    <img src="<?= $mod['bannerMod'] ?>" alt="banner do mod <?= $mod['titleMod'] ?>">
                        <div class="descMod">
                            <h2><?= $mod['titleMod'] ?></h2>
                            <p><?= $mod['descMod'] ?></p>

                            <div class="upProfile">
                                <img src="<?= $mod['profile'] ?>" alt="foto de perfil do <?= $mod['name'] ?>">
                                <h4><?= $mod['name'] ?></h4>
                            </div>
                        </div>
                </div>
            </div>

                <?php
            }
            ?>

    </main>

    <footer></footer>
    <div id="nav" style="display: none;"></div>

    <script>
        let modal = document.querySelector('#modal')

        function modalDescMod(modId){
            document.documentElement.style.overflowY = 'hidden'
            modal.classList.add('active')
            navegador.innerHTML += `<iframe src="../controller/getModById.php?modid=${modId}" frameborder="0" id="sql" ></iframe>`
            let iframe = document.querySelector('#sql')
            iframe.src = `../controller/getModById.php?modid=${modId}`

            let timer = setInterval(() => {
                var mod = JSON.parse(window.sessionStorage.getItem('getModId'))
                clearInterval(timer)
                window.sessionStorage.removeItem('getModId')
                iframe.parentNode.removeChild(iframe)
                modal.innerHTML = `<div>
                                        <img src="${mod['bannerMod']}" alt="banner do mod ${mod['titleMod']}">
                                            <div class="descMod">
                                                <h2>${mod['titleMod']}</h2>
                                                <p>${mod['descMod']}</p>

                                                <div class="upProfile">
                                                    <img src="${mod['profile']}" alt="foto de perfil do ${mod['name']}">
                                                    <h4>${mod['name']}</h4>
                                                </div>

                                                <ul>
                                                    <li>Downloads: ${mod['countDownloads']}</li>
                                                    <li>Tamanho: ${mod['sizeMod']}</li>
                                                    <li>Tipo: ${mod['typeMod']}</li>                                                    
                                                    <li><a href="${mod['youtubeMod']}" target="_blank">Ver vídeo</a></li>
                                                    <li><a href="${mod['downloadMod']}" target="_blank">Baixar</a></li>
                                                </ul>
                                            </div>

                                        <button onclick="modal.classList.remove('active'), document.documentElement.style.overflowY = 'auto'">fechar</button>

                                        <button onclick="window.location.href = '../view/viewMod.php?modId=${mod['modId']}'" style='left: 20px; width: 120px;'>Ver tudo</button>
                                    </div>`
            }, 100)
        }
    </script>
</body>
</html>