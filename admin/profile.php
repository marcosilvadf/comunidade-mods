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
            listAll('controllerM.php', (data) => {
                if(Array.isArray(data)){
                    data.forEach(areaMods)
                }
            })
        }

        function areaMods(element, index, data){
            tr += `<tr class='mod${element['modId']}'>
                        <td><img src='${element['bannerMod']}'></td>
                        <td>${element['titleMod']}</td>
                        <td>${element['countDownloads']}</td>
                        <td>${element['typeMod']}</td>
                        <td class='user'><img src='${element['profile']}'> <span>${element['name']}</span></td>
                    </tr>
                    <tr class='mod${element['modId']}'>
                        <td colspan='5' style='border-bottom: 1px solid white;'><a href='${element['modId']}' onclick='deleteMod(event, ${element['modId']})'>Deletar</a></td>
                    </tr>`
            if(index == data.length -1){
                table.innerHTML = tr
            }
        }

        function listUsers(){
            divAll.classList.add('active')
            tr = '<tr><th>Perfil</th><th>Nome</th><th>Nível</th></tr>'
            listAll('controllerU.php', (data) => {
                if(Array.isArray(data)){
                    data.forEach(areaUsers)
                }
            })
        }

        function areaUsers(element, index, data){
            tr += `<tr class='user${element['id']}'>
                        <td><img src='${element['profile']}'></td>
                        <td>${element['name']}</td>
                        <td>${element['level']}</td>                        
                    </tr>
                    <tr class='user${element['id']}'>
                        <td colspan='3' style='border-bottom: 1px solid white;'><a href='${element['id']}' onclick='deleteUser(event, ${element['id']})'>Deletar</a></td>
                    </tr>`
            if(index == data.length -1){
                table.innerHTML = tr
            }
        }

        function listDenun(){
            tr = '<tr><th>Denunciou</th><th>Denunciado</th><th>Título</th><th>Descrição</th></tr>'
            divAll.classList.add('active')
            listAll('controllerD.php', (data) => {
                if(Array.isArray(data)){
                    data.forEach(areaDenun)
                }
            })
        }

        function areaDenun(element, index, data){
            let checkedT = ''
            if(element['status'] == 'on'){
                checkedT = 'checked'
            }
            tr += `<tr>
                        <td><span class='user'><img src='${element['profile']}'> <span>${element['name']}</span></span></td>
                        <td><span class='user'><img src='${element['profileD']}'> <span>${element['nameD']}</span></span></td>
                        <td>${element['titleD']}</td>
                        <td>${element['descD']}</td>
                    </tr>
                    <tr>
                        <td colspan='3' style='border-bottom: 1px solid white;'></td>
                        <td style='border-bottom: 1px solid white;'><input type="checkbox" name="" id="actived${element['id']}${element['tb_mods_userId']}${element['tb_mods_modId']}" ${checkedT} onclick='toggleStatus(${element['id']}${element['tb_mods_userId']}${element['tb_mods_modId']}, ${element['id']}, ${element['tb_mods_userId']}, ${element['tb_mods_modId']})'></td>
                    </tr>`
            if(index < data.length){
                table.innerHTML = tr
            }
        }

        function toggleStatus(id, userId, modUserId, modId){
            let actived = document.querySelector(`#actived${id}`).checked
            let toggle = ''
            if(actived){
                toggle = 'on'
            }else{
                toggle = 'off'
            }
            
            listAll(`controllerDchecked.php?userId=${userId}&modUserId=${modUserId}&modId=${modId}&value=${toggle}`, (data) => {             
            })
        }

        function deleteUser(event, id){
            let userGray = document.querySelector(`.user${id}`)
            event.preventDefault()
            userGray.style.display = 'none'
            if(confirm('Deseja deletar?')){
                listAll(`../controller/deleteUser.php?imd=${id}`, (data) => {
                })
            }
        }

        function deleteMod(event, id){
            let modGray = document.querySelector(`.mod${id}`)
            event.preventDefault()
            if(confirm('Deseja deletar?')){
                modGray.style.display = 'none'
                listAll(`../controller/deleteModById.php?modId=${id}&vlt=1`, (data) => {
                })
            }            
        }
    </script>
</body>
</html>