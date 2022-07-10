<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/formAlter.css">
    <link rel="stylesheet" href="../css/mobile.css">
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <script src="../lib/fontawesome/js/all.min.js"></script>
    <script src="../js/menu.js" defer></script>   
    <script src="../js/menuFloat.js" defer></script>
    <script src="../js/loadProfileSQLView.js" defer></script>
    <script src="../js/fileImageMod.js" defer></script>
    <title>Gerenciar Mods</title>
</head>
<body onload="listAllMods(), profile()">
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
                <li id="entCad"></li>
                <li>Sobre</li>
            </ul>
        </div>

        <div class="blankMenu" onclick="showMenu()">

        </div>
    </div>

    <main>
        <div id="containerMods">
            
        </div>

        <div class="addMod" onclick="window.location.href = '../view/formAddMod.php'">
        <i class="fa-solid fa-plus"></i>
        </div>

        <div class="addMod" onclick="listAllMods()" style="left: 20px;">
        <i class="fa-solid fa-rotate-right"></i>
        </div>

        <div class="modal">
            <div>
            <img src="../image/banner-mods.jpg" alt="" id="imgMod" class="banner">
                <form action="../controller/alterModController.php" method="post" enctype="multipart/form-data" autocomplete="off" id="form">                    
                        <label for="modImage">
                            <div id="pencil" class="modImage">
                                <i class="fa-solid fa-pen"></i>
                            <span style="display: none;"></span>
                            </div>
                        </label>

                    <div id="delete" style="left: 20px;" onclick="">
                        <i class="fa-solid fa-trash"></i>
                    </div>

                    <input type="hidden" name="modId" id="modId">

                    <input type="file" name="modImage" id="modImage" style="display: none;">

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

                    <div class="linha">
                        <input type="submit" value="salvar">
                        <span id="closeModal" onclick="closeModal()">fechar</span>
                    </div>                    
                </form>                
            </div>
        </div>
    </main>

    <footer>
        <div id="nav" style="display: none;"></div>
        <div id="nav1" style="display: none;"></div>
    </footer>

    <script>
        let navegadorMods = document.querySelector('#nav1')
        let containerMods = document.querySelector('#containerMods')
        let rotate = document.querySelectorAll('.addMod')
        let modal = document.querySelector('.modal')
        let form = document.querySelector('#delete')
        let rotation = 0

        function listAllMods() {
            rotation += 360
            containerMods.style.transform = 'translateX(-100%)'
            navegadorMods.innerHTML += `<iframe src="../controller/listModsById.php" frameborder="0" id="sql" ></iframe>`
            let iframe = document.querySelector('#sql')
            iframe.src = `../controller/listModsById.php`
            rotate[1].style.transform = `rotateZ(${rotation}deg)`
            rotate[1].style.transition = '.5s'            
            let timer = setInterval(() => {
                var data = JSON.parse(window.sessionStorage.getItem('listMods'))
                containerMods.innerHTML = ''                
                containerMods.style.transform = 'translateX(0px)'
                containerMods.style.transition = '.3s'
                if(data != 'vazio'){
                    data.forEach(printMods)
                }else{
                    containerMods.innerHTML += `<span style='align-self: center; margin: 0px auto;'>vazio... igual a carteiro do Maiorzin</span>`
                }
                clearInterval(timer)
                iframe.parentNode.removeChild(iframe)
                window.sessionStorage.removeItem('id')
            }, 350)
        }

        function printMods(mod) {
            containerMods.innerHTML += `<div class="containerMod" onclick="openModal(${mod['modId']})">
                                            <img src="${mod['bannerMod']}" alt="">
                                            <div class="boxInfos">
                                                <span class="title">${mod['titleMod']}</span>
                                                <span class="downloads">Downloads: <span class="qtd">${mod['countDownloads']}</span></span>
                                            </div>
                                        </div>`
        }

        function openModal(id){
            document.documentElement.style.overflowY = 'hidden'
            let imgMod = document.querySelector('#imgMod')
            let container = document.querySelector('.modal div')
            let modId = document.querySelector('#modId')
            let titulo = document.querySelector('#titulo')
            let descMod = document.querySelector('#descMod')
            let nTam = document.querySelector('#nTam')
            let tTam = document.querySelector('#tTam')
            let typeMod = document.querySelector('#typeMod')
            let video = document.querySelector('#video')
            let down = document.querySelector('#down')
            navegadorMods.innerHTML += `<iframe src="../controller/getModById.php?modid=${id}" frameborder="0" id="sql" ></iframe>`
            let iframe = document.querySelector('#sql')
            iframe.src = `../controller/getModById.php?modid=${id}`
            let timer = setInterval(() => {
                var mod = JSON.parse(window.sessionStorage.getItem('getModId'))                
                modId.value = mod['modId']
                titulo.value = mod['titleMod']
                descMod.value = mod['descMod']
                nTam.value = parseFloat(mod['sizeMod'])
                tTam.value = mod['sizeMod'].replace(parseFloat(mod['sizeMod']), "")
                typeMod.value = mod['typeMod']
                video.value = mod['youtubeMod']
                form.setAttribute('onclick', `dropMod(${mod['modId']})`)
                down.value = mod['downloadMod']
                modal.classList.add('active')
                imgMod.src = mod['bannerMod']
                console.log(titulo)
                clearInterval(timer)
                iframe.parentNode.removeChild(iframe)
                window.sessionStorage.removeItem('getModId')
            }, 100)
        }

        function closeModal(){
            let drop = document.querySelector('#delete')
            document.documentElement.style.overflowY = 'auto'
            let closeModal = document.querySelector('#closeModal')
            modal.classList.remove('active')
            drop.parentNode.removeChild(drop)
        }

        function dropMod(modId){
            if(confirm('Tem certeza que deseja apagar esse mod?')){
                window.location.href = `../controller/deleteModById.php?modId=${modId}`
            }
        }
    </script>
</body>
</html>