<?php
session_start();

if(empty($_COOKIE['idmods']))
{
    echo "<script>alert('Você precisa estar logado para denunciar um mod!')</script>";
    echo "<script>history.go(-1)</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/mobile.css">
    <script src="../js/menu.js" defer></script>
    <script src="../js/loadProfileSQLView.js" defer></script>
    <script src="../js/menuFloat.js" defer></script>
    <title>Denunciar mod</title>
</head>
<body onload="profile()">
    <header>
        <div class="menu">
            <div class="menuIcon" onclick="showMenu()">

            </div>
        </div>
        <div class="title"><a href="../index.php">mods</a></div>
        <div class="login">
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
                <li id="entCad"></li>
                <li><a href="about.php">Sobre</a></li>
            </ul>
        </div>

        <div class="blankMenu" onclick="showMenu()">

        </div>
    </div>

    <main>

    <div class="form formD">
        <h4 class="formTitle">Denunciar Mod</h4>
        <form action="../controller/addDenunciation.php" method="post" autocomplete="off">
            <input type="hidden" name="modId" value="<?= $_SESSION['modId']; ?>">
            <input type="hidden" name="userModId" value="<?= $_SESSION['modUserId']; ?>">
            <input type="hidden" name="userId" value="<?= $_COOKIE['idmods']; ?>">

            <label for="">Título: </label>
            <input type="text" name="titleD" id="titleD" placeholder="Digite um título para a sua denúncia:" maxlength="50">

            <label for="descD">Descrição:</label>
            <textarea name="descD" id="descD" cols="30" rows="10" placeholder="Descrição: digite detalhes para sua denúncia ser atendida, coloque links certeza facilitarão. Lembre-se que sua conta pode ser banida se não houver comprovação ou que sua denúncia foi incorreta!" maxlength="400"></textarea>

            <input type="submit" value="Enviar denúncia">
        </form>
    </div>

    </main>

<footer>
    <div id="nav" style="display: none;"></div>
</footer>    
</body>
</html>