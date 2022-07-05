<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/mobile.css">
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <script src="../lib/fontawesome/js/all.min.js"></script>
    <script src="../js/menu.js" defer></script>   
    <script src="../js/menuFloat.js" defer></script>
    <script src="../js/loadProfileSQLView.js" defer></script>
    <title>Gerenciar Mods</title>
</head>
<body onload="listAllMods(), profile()">
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
                <li>Entrar/<wbr>Cadastrar</li>
                <li>Sobre</li>
            </ul>
        </div>

        <div class="blankMenu" onclick="showMenu()">

        </div>
    </div>

    <main>
        <div id="containerMods">
            
        </div>

        <div class="addMod" onclick="window.location.href = '../view/formAddMod.php'">
        <i class="fa-solid fa-plus"></i>
        </div>

        <div class="addMod" onclick="listAllMods()" style="left: 20px;">
        <i class="fa-solid fa-rotate-right"></i>
        </div>
    </main>

    <footer>
        <div id="nav" style="display: none;"></div>
        <div id="nav1" style="display: none;"></div>
    </footer>

    <script>
        let navegadorMods = document.querySelector('#nav1')
        let containerMods = document.querySelector('#containerMods')
        let rotate = document.querySelectorAll('.addMod')
        let rotation = 0

        function listAllMods() {
            rotation += 360
            containerMods.style.transform = 'translateX(-100%)'
            navegadorMods.innerHTML += `<iframe src="../controller/listModsById.php" frameborder="0" id="sql" ></iframe>`
            let iframe = document.querySelector('#sql')
            iframe.src = `../controller/listModsById.php`
            rotate[1].style.transform = `rotateZ(${rotation}deg)`
            rotate[1].style.transition = '.5s'            
            let timer = setInterval(() => {
                var data = JSON.parse(window.sessionStorage.getItem('listMods'))
                containerMods.innerHTML = ''                
                containerMods.style.transform = 'translateX(0px)'
                containerMods.style.transition = '.3s'
                if(data != 'vazio'){
                    data.forEach(printMods)
                }else{
                    containerMods.innerHTML += `<span style='align-self: center; margin: 0px auto;'>vazio... igual a carteiro do Maiorzin</span>`
                }
                clearInterval(timer)
                iframe.parentNode.removeChild(iframe)                
                window.sessionStorage.removeItem('id')
            }, 350)
        }

        function printMods(mod) {
            containerMods.innerHTML += `<div class="containerMod" id="${mod['modId']}">
                                            <img src="${mod['bannerMod']}" alt="">
                                            <div class="boxInfos">
                                                <span class="title">${mod['titleMod']}</span>
                                                <span class="downloads">Downloads: <span class="qtd">${mod['countDownloads']}</span></span>
                                            </div>
                                        </div>`
        }
    </script>
</body>
</html>