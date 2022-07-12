<?php
session_start();
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
    <script src="../js/showHidePass.js" defer></script>
    <script src="../js/confirmPassword.js" defer></script>
    <script src="../js/fileProfile.js" defer></script>    
    <title>Cadastrar Usuário</title>
</head>
<body>
    <header>
        <div class="menu">
            <div class="menuIcon" onclick="showMenu()">

            </div>
        </div>
        <div class="title"><a href="../index.php">mods</a></div>
        <div class="login"><a href="formLogin.php">Login</a></div>
    </header>

    <div class="boxMenu">
        <div class="contentMenu">
            <ul>
                <li><a href="../index.php">Início</a></li>
                <li><a href="../view/allmods.php">Mods</a></li>
                <li>Entrar/<wbr>Cadastrar</li>
                <li><a href="about.php">Sobre</a></li>
            </ul>
        </div>

        <div class="blankMenu" onclick="showMenu()">

        </div>
    </div>

    <main>
        <div class="form">
            <div class="warn">
                <div class="circle"><i class="fas fa-times"></i></div>
                <h4>Usuário já cadastrado</h4>
                <button id="btnWarn" style="bottom: 50px;">OK</button>
            </div>
            <h4 class="formTitle">Cadastrar</h4>
            <form onsubmit="sendForm(event)" action="../controller/signInController.php" method="post" enctype="multipart/form-data" autocomplete="off">

                <div class="profile">
                    
                    <label for="prof">
                    <img src="../image/logo.png" alt="imagem de perfil" class="profile">
                    <span>Selecione a imagem de perfil</span>                                             
                    </label>

                    <input type="file" name="prof" id="prof" accept="image/*" onchange="ifUser()">
                </div>

                <input type="text" name="user" id="user" placeholder="Usuário:" onblur="ifUser()" required>

                <input type="text" name="keyForPass" id="keyForPass" placeholder="Palavra para recuperar senha:" required>

                <div class="showHidePass">
                    <span class="eye"><i class="fa-solid fa-eye"></i></span>
                    <input type="password" name="pass" id="pass" placeholder="Senha:" required>
                </div>

                <div class="showHidePass">
                    <span class="eye"><i class="fa-solid fa-eye"></i></span>
                    <input type="password" name="pass" id="confirmPass" class="error" placeholder="Confirmar senha:">
                </div>

                <div class="checkbox">                    
                    <input type="checkbox" name="" id="useTerms" class="checkinput">
                    <label for="useTerms">Você concorda com <a href="about.php#useterms">os termos de uso</a></label>
                </div>
                
                <div class="checkbox">       
                    <input type="checkbox" name="" id="cookie" class="checkinput">
                    <label for="cookie">Aceita os cookies</label>
                </div>

                <input type="submit" value="cadastrar">
            </form>

                <?php
                if(isset($_SESSION['errorsave']))
                {
                ?>
                <div class="error">
                    <div><?= $_SESSION['errorsave']?></div>
                </div>
                <?php
                }
                unset($_SESSION['errorsave']);
                ?>
            <div class="actionLogin">
            <span class="log">Já possui cadastro? <br><a href="formLogin.php">clique aqui!</a></span>            
            </div>
        </div>
    </main>
    <footer></footer>

    <div id="nav" style="display: none;"></div>

    <script>
        let cookie = document.querySelector('#cookie')
        let useTerms = document.querySelector('#useTerms')
        let send = document.querySelector("input[type='submit']")
        let navegador = document.querySelector('#nav')
        let aviso = document.querySelector('.warn')
        let btnWarn = document.querySelector('#btnWarn')
        let formSended = false
        send.style.filter = 'grayscale(100%)'
        send.style.transition = '.2s'

        btnWarn.onclick = function () {
            aviso.classList.remove('nouser')
        }
        
        function ifUser(){
            if(user.value != ''){
                navegador.innerHTML += `<iframe src="../controller/ifExistUser.php?name=${user.value}" frameborder="0" id="sql" ></iframe>`
                let iframe = document.querySelector('#sql')
                iframe.src = `../controller/ifExistUser.php?name=${user.value}`
                let timer = setInterval(() => {        
                    var data = window.sessionStorage.getItem('id')
                    clearInterval(timer)
                    window.sessionStorage.removeItem('id')
                    navegador.innerHTML = ''
                    if(data == 'false'){
                        aviso.classList.add('nouser')
                        user.style.borderBottom = '1px solid red'
                        send.style.filter = 'grayscale(100%)'
                        send.style.transition = '.2s'
                        formSended = false
                    }else{
                        if(cookie.checked == true && useTerms.checked == true && file.files[0] != null){
                            user.style.borderBottom = '1px solid white'
                            send.style.filter = 'grayscale(0%)'
                            send.style.transition = '.2s'
                            formSended = true
                        }else{
                            user.style.borderBottom = '1px solid red'
                            send.style.filter = 'grayscale(100%)'
                            send.style.transition = '.2s'
                            formSended = false
                        }                    
                    }
                }, 100);
            }else{
                user.style.borderBottom = '1px solid red'
                send.style.filter = 'grayscale(100%)'
                send.style.transition = '.2s'
                formSended = false
            }
        }

        cookie.addEventListener('change', ()=> {
            ifUser()
        })  
        
        useTerms.addEventListener('change', ()=> {
            ifUser()
        })  

        function sendForm(event){
           if(!(formSended)){
            event.preventDefault()
           }
        }
    </script>
</body>
</html>