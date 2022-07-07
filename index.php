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
<body onload="profile(), loadFiveMods()">
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
                <li>Sobre</li>
            </ul>
        </div>

        <div class="blankMenu" onclick="showMenu()">

        </div>
    </div>

    <main>
        <form action="" id="search">
            <input type="text" name="" id="" placeholder="Pesquisar">
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

        <h1>mods mais famosos</h1>
        
        <div class="drawerMods">
            
        </div>

        <a href="./view/allmods.php" class="showAll">Ver todos</a>

        <h1>principais canais</h1>

        <div class="channels">
            
            <a href="" class="linkChannels">
                <img src="./image/banner-mods.jpg" alt="">
                <h4>vagner tutoriais</h4>
            </a>
            
        </div>
    </main>

    <footer></footer>

    <div id="nav" style="display: none;"></div>

    <script>
        let drawerMods = document.querySelector('.drawerMods')
        function loadFiveMods(){
            navegador.innerHTML += `<iframe src="controller/listFiveMods.php" frameborder="0" id="sqlMods" ></iframe>`
            let iframe2 = document.querySelector('#sqlMods')
            iframe2.src = `controller/listFiveMods.php`
            let timer = setInterval(() => {        
                var mods = JSON.parse(window.sessionStorage.getItem('fiveMods'))
                clearInterval(timer)
                window.sessionStorage.removeItem('fiveMods')
                iframe2.parentNode.removeChild(iframe2)
                drawerMods.innerHTML = ''
                mods.forEach(drawerMod)
            }, 100)
        }

        function drawerMod(mod){
            drawerMods.innerHTML += `<a href="" class="openBanner">
                                            <div class="bannerMod">
                                                <img src="${mod['bannerMod'].replace('../', '')}" alt="">
                                                <div class="descMod">
                                                    <h2>${mod['titleMod']}</h2>
                                                    <p>${mod['descMod']}</p>

                                                    <div class="upProfile">
                                                        <img src="${mod['profile'].replace('../', '')}" alt="">
                                                        <h4>${mod['name']}</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>`
        }
    </script>
</body>
</html>