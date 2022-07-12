<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/mobile.css">
    <link rel="stylesheet" href="lib/fontawesome/css/all.min.css">
    <script src="js/menu.js" defer></script>
    <script src="lib/fontawesome/js/all.min.js"></script>
    <script src="js/menuFloat.js" defer></script>
    <script src="js/loadProfileSQL.js" defer></script>
    <title>Início</title>
</head>
<body onload="profile()">
    <header>
        <div class="menu">
            <div class="menuIcon" onclick="showMenu()">

            </div>
        </div>
        <div class="title"><a>mods</a></div>
        <div class="login" onclick="menuFloat()">
            <img src="image/logo.png" alt="" class="menuFloat">
        </div>

        <div class="floatMenu">
            <div>
                <img src="image/logo.png" alt="" id="menuProfile">
                <ul>
                    
                </ul>
            </div>
        </div>
    </header>

    <div class="boxMenu">
        <div class="contentMenu">
            <ul>
                <li>Início</li>
                <li><a href="./view/allmods.php">Mods</a></li>
                <li id="entCad"></li>
                <li><a href="view/about.php">Sobre</a></li>
            </ul>
        </div>

        <div class="blankMenu" onclick="showMenu()">

        </div>
    </div>

    <main>

        <h1>principais canais</h1>

        <div class="channels">
            
            <a href="" class="linkChannels" style="background-color: white;">
                <img src="image/logo.png" alt="">
                <h4 style="color: red; font-size: 25px;">Anuncie aqui!</h4>
            </a>
            
        </div>

        <h1>mods mais famosos</h1>
        
        <div class="drawerMods">
            <div id="modal">
                
            </div>

            <?php
            require_once 'dao/modDAO.php';

            $modDAO = new ModDAO();

            $mods = $modDAO->listFiveMods();

            foreach ($mods as $mod)
            {
            $mod['profile'] = substr_replace($mod['profile'], '', 0, 3);
            $mod['bannerMod'] = substr_replace($mod['bannerMod'], '', 0, 3);
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
        </div>

        <a href="./view/allmods.php" class="showAll">Ver todos</a>        
    </main>

    <footer></footer>

    <div id="nav" style="display: none;"></div>

    <script>
        let modal = document.querySelector('#modal')

        function modalDescMod(modId){
            document.documentElement.style.overflowY = 'hidden'
            modal.classList.add('active')
            navegador.innerHTML += `<iframe src="controller/getModById.php?modid=${modId}" frameborder="0" id="sql" ></iframe>`
            let iframe = document.querySelector('#sql')
            iframe.src = `controller/getModById.php?modid=${modId}`

            let timer = setInterval(() => {
                var mod = JSON.parse(window.sessionStorage.getItem('getModId'))
                clearInterval(timer)
                window.sessionStorage.removeItem('getModId')
                iframe.parentNode.removeChild(iframe)
                modal.innerHTML = `<div>
                                        <img src="${mod['bannerMod'].replace('../', '')}" alt="banner do mod ${mod['titleMod']}">
                                            <div class="descMod">
                                                <h2>${mod['titleMod']}</h2>                                                

                                                <div class="upProfile">
                                                    <img src="${mod['profile'].replace('../', '')}" alt="foto de perfil do ${mod['name']}">
                                                    <h4>${mod['name']}</h4>
                                                </div>

                                                <ul>
                                                    <li>Downloads: ${mod['countDownloads']}</li>
                                                    <li>Tamanho: ${mod['sizeMod']}</li>
                                                    <li>Tipo: ${mod['typeMod']}</li>                                                    
                                                </ul>
                                            </div>

                                        <button onclick="modal.classList.remove('active'), document.documentElement.style.overflowY = 'auto'">fechar</button>

                                        <button onclick="window.location.href = 'view/viewMod.php?modId=${mod['modId']}'" style='left: 20px; width: 120px;'>Ver tudo</button>
                                    </div>`
            }, 100)
        }
    </script>
</body>
</html>