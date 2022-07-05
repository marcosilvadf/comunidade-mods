<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/mobile.css">
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <script src="../lib/fontawesome/js/all.min.js"></script>
    <script src="../js/menu.js" defer></script>
    <script src="../js/menuFloat.js" defer></script>
    <script src="../js/loadProfileSQLView.js" defer></script>
    <title>Perfil</title>
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
                <li>Entrar/<wbr>Cadastrar</li>
                <li>Sobre</li>
            </ul>
        </div>

        <div class="blankMenu" onclick="showMenu()">

        </div>
    </div>

    <main>
        <div class="boxProfile">

            <img src="../image/logo.png" alt="" id="photoProfile">
            <h4 id="name"></h4>
            <ul>
                <li>seu nível: <span id="level"></span></li>
                <li>Mods postados: <span id="posts"></span></li>
                <li>Criado em: <span id="date"></span></li>
            </ul>
            <div class="bottom">
                <span class="panel"><a href="managerMods.php">Gerenciar mods</a></span>
                <span class="editProfile"><a href="">Editar perfil</a></span>
            </div>            
        </div>
    </main>

    <footer>
        <div id="nav" style="display: none;"></div>
    </footer>

    <script>
        let photoProfile = document.querySelector('#photoProfile')
        let name = document.querySelector('#name')
        let level = document.querySelector('#level')
        let posts = document.querySelector('#posts')
        let date = document.querySelector('#date')

        function loadAllProf(data) {
            photoProfile.src = data['profile']
            name.innerHTML = data['name']
            level.innerHTML = data['level']
            posts.innerHTML = data['qtdMods']
            date.innerHTML = data['registrationDate']
        }
    </script>
</body>
</html>