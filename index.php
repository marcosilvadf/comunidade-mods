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
            <a href="" class="openBanner">
                <div class="bannerMod">
                    <img src="./image/banner-mods.jpg" alt="">
                    <div class="descMod">
                        <h2>Mods</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, magnam!</p>

                        <div class="upProfile">
                            <img src="./image/banner-mods.jpg" alt="">
                            <h4>vagner tutoriais</h4>
                        </div>
                    </div>
                </div>
            </a>
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
        
    </script>
</body>
</html>