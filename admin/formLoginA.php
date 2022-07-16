<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/mobile.css">
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <script src="../lib/fontawesome/js/all.min.js"></script>
    <script src="../js/menu.js" defer></script>
    <script src="../js/showHidePass.js" defer></script>
    <title>Login</title>
</head>
    <header>
        <div class="menu">
            <div class="menuIcon" onclick="showMenu()">

            </div>
        </div>
        <div class="title"></div>
        <div class="login"></div>
    </header>

    <div class="boxMenu">
        <div class="contentMenu">
            <ul>
                <li><a href="../index.php">Início</a></li>
                <li><a href="../view/allmods.php">Mods</a></li>
                <li><a href="../view/about.php">Sobre</a></li>
            </ul>
        </div>

        <div class="blankMenu" onclick="showMenu()">

        </div>
    </div>

    <main>
        <div class="form">
            <div class="warn">
                <div class="circle"><i class="fas fa-times"></i></div>
                <h4>Usuário e/ou senha incorreta!</h4>
                <button id="btnWarn">OK</button>
            </div>
            <h4 class="formTitle">login</h4>
            <form method="POST" onsubmit="login(event)" action="controllerLog.php" autocomplete="off">
                <input type="text" name="user" id="user" placeholder="Usuário:" required>
                <div class="showHidePass">
                    <span class="eye"><i class="fa-solid fa-eye"></i></span>
                    <input type="password" name="pass" id="pass" placeholder="Senha:" required>
                </div>
                <input type="submit" value="entrar">
            </form>
            <div class="actionLogin">            
            </div>
        </div>

        <div id="nav" style="display: none;"></div>
    </main>

    <footer></footer>
</html>