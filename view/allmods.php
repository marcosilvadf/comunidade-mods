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
                <li><a href="../view/formLogin.php">Entrar/<wbr>Cadastrar</a></li>
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

        <a href="viewMod.php" class="openBanner">
            <div class="bannerMod">
                <img src="../image/banner-mods.jpg" alt="">
                <div class="descMod">
                    <h2>Mods</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, magnam!</p>
                </div>

                <div class="upProfile">
                    <img src="../image/banner-mods.jpg" alt="">
                    <h4>vagner tutoriais</h4>
                </div>

            </div>
        </a>
    </main>

    <footer></footer>
    <div id="nav" style="display: none;"></div>
</body>
</html>