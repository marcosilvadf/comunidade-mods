<?php
if(empty($_COOKIE['idmods']))
{
    echo '<script>history.go(-1)</script>';
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
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <script src="../lib/fontawesome/js/all.min.js"></script>
    <script src="../js/menu.js" defer></script>
    <script src="../js/fileImageMod.js" defer></script>
    <title>Enviar mod</title>
</head>
<body onload="errorSQL()">
    <header>
        <div class="menu">
            <div class="menuIcon" onclick="showMenu()">

            </div>
        </div>
        <div class="title"><a href="../index.php">mods</a></div>
        <div class="login"><a onclick="history.go(-1)" style="cursor: pointer;"><i class="fa-solid fa-arrow-left-long"></i></a></div>
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
            <h4 class="formTitle">Adicionar mod</h4>
            <form action="../controller/addModController.php" method="post" enctype="multipart/form-data" autocomplete="off"> 
                <input type="hidden" name="idUser" value="<?=$_COOKIE['idmods']?>">

                <div class="modImage">
                    
                    <label for="modImage">
                    <img src="../image/banner-mods.jpg" alt="imagem de perfil" class="banner">
                    <span>Selecione a capa</span>
                    </label>

                    <input type="file" name="modImage" id="modImage">
                </div>

                <input type="text" name="titulo" id="titulo" placeholder="Título:">

                <textarea name="descMod" id="descMod" cols="30" rows="10" placeholder="Descrição do mod:"></textarea>

                <label for="nTam" id="lTam">Tamanho:</label>
                <div id="tam">
                <input type="number" name="nTam" id="nTam" placeholder="Tamanho:">
                <select name="tTam" id="tTam">
                    <option value="kb">KB</option>
                    <option value="mb" selected>MB</option>
                    <option value="gb">GB</option>
                </select>
                </div>

                <label for="typeMod" id="typeModLabel">Tipo:</label>
                <select name="typeMod" id="typeMod">
                    <option value="cleo">Cleo</option>
                    <option value="grafico">Gráfico</option>
                    <option value="gta">GTA</option>
                    <option value="veiculo">Veículo</option>
                </select>

                <input type="text" name="video" id="video" placeholder="Link do vídeo:">

                <input type="text" name="download" id="down" placeholder="Link de download:">
        
                <input type="submit" value="enviar">
            </form>
        </div>
    </main>

    <footer></footer>
    <script>
        function errorSQL() {
            var error = JSON.parse(window.sessionStorage.getItem('error'))
            if(error != null){
            let timer = setInterval(() => {
                console.log(`ERRO NO SQL: ${error}`)
                window.sessionStorage.removeItem('error')
                clearInterval(timer)                
            }, 100)
            }
        }        
    </script>
</body>
</html>