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
        <div class="bannerMod">
            <img src="../image/banner-mods.jpg" alt="">
            <div class="descMod">
                <h2>Mods</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At, magnam!</p>
                <div class="list">
                    <ul>
                        <li>Downloads: </li>
                        <li>Publicação: </li>
                    </ul>
                </div>

                <div class="upProfile" style="margin-bottom: 10px;">
                    <img src="../image/banner-mods.jpg" alt="">
                    <h4>vagner tutoriais</h4>
                </div>

                <div class="line">
                    <a href="https://www.youtube.com/" target="_blank">Ver vídeo</a>
                    <a href="https://www.mediafire.com/" target="_blank">Baixar</a>
                </div>            
            </div>
        </div>

        <div class="comments">
            <h2>Comentários</h2>
            <iframe src="../view/comments.php" frameborder="0"></iframe>
        </div>
    </main>

    <footer></footer>    
</body>
</html>