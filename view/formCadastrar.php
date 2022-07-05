<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/mobile.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <script src="../lib/fontawesome/js/all.min.js"></script>
    <script src="../js/menu.js" defer></script>
    <script src="../js/showHidePass.js" defer></script>
    <title>Cadastrar Usuário</title>
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
                <li>Entrar/<wbr>Cadastrar</li>
                <li>Sobre</li>
            </ul>
        </div>

        <div class="blankMenu" onclick="showMenu()">

        </div>
    </div>

    <main>
        <div class="form">
            <h4 class="formTitle">login</h4>
            <form action="" method="post">
                <input type="text" name="user" id="user" placeholder="Usuário:">
                <div class="showHidePass">
                    <span class="eye"><i class="fa-solid fa-eye"></i></span>
                    <input type="password" name="pass" id="pass" placeholder="Senha:">
                </div>
                <input type="submit" value="entrar">
            </form>
            <span class="log">Ainda não tem cadastro? <br><a href="">clique aqui!</a></span>
        </div>
    </main>

    <footer></footer>    
</body>
</html>