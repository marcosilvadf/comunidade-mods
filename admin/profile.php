<?php
session_start();

if(empty($_SESSION['adminon']))
{
    header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/mobile.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <script src="../lib/fontawesome/js/all.min.js"></script>
    <script src="../js/menu.js" defer></script>  
    <script src="../js/dbWithJs.js" defer></script>
    <title>Perfil Administração</title>
</head>
<body>
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
            <ul class="btnActiveAdmin">
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

            <img src="../image/logo.png" alt="">
            <div class="bottom">
                <ul class="btnActiveAdmin">
                    <li><button onclick="listMods()">Mods</button></li>
                    <li><button onclick="listUsers()">Usuários</button></li>
                    <li><button onclick="listDenun()">Denúncias</button></li>
                </ul>
            </div>           
        </div>

        <div id="all">
            <table>
                
            </table>

            <button id="closeDivAll" onclick="divAll.classList.remove('active'), table.innerHTML = ''">fechar</button>
        </div>
    </main>

    <footer>
        <div id="nav" style="display: none;"></div>
    </footer>

    <script>
        const buttons = document.querySelectorAll('.btnActiveAdmin li button')
        const divAll = document.querySelector('#all')
        const table = document.querySelector('table')
        let tr = ''

        function listMods(){
            divAll.classList.add('active')
            tr = '<tr><th>Imagem</th><th>Título</th><th>Down<wbr>loads</th><th>Tipo</th><th>Usuário</th></tr>'
            listAll('controllerA.php', (data) => {
                console.log(data)
                data.forEach(areaMods)    
            })
        }

        function areaMods(element, index, data){
            tr += `<tr>
                        <td><img src='${element['bannerMod']}'></td>
                        <td>${element['titleMod']}</td>
                        <td>${element['countDownloads']}</td>
                        <td>${element['typeMod']}</td>
                        <td><img src='${element['profile']}'> <span>${element['name']}</span></td>
                    </tr>
                    <tr>
                        <td colspan='5' style='border-bottom: 1px solid white;'><a href='${element['modId']}'>Deletar</a></td>
                    </tr>`
            if(index == data.length -1){
                table.innerHTML = tr
            }
        }

        function listUsers(){
            divAll.classList.add('active')
        }

        function listDenun(){
            divAll.classList.add('active')
        }
    </script>
</body>
</html>