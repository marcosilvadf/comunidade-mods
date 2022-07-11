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
<navegador>
    <header>
        <div class="menu">
            <div class="menuIcon" onclick="showMenu()">

            </div>
        </div>
        <div class="title"><a href="../index.php">mods</a></div>
        <div class="login"><a href="formSignInUser.php">Cadastrar</a></div>
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
                <h4>Usuário e/ou senha incorreta!</h4>
                <button id="btnWarn">OK</button>
            </div>
            <h4 class="formTitle">login</h4>
            <form method="POST" onsubmit="login(event)" autocomplete="off">
                <input type="text" name="user" id="user" placeholder="Usuário:" required>
                <div class="showHidePass">
                    <span class="eye"><i class="fa-solid fa-eye"></i></span>
                    <input type="password" name="pass" id="pass" placeholder="Senha:" required>
                </div>
                <input type="submit" value="entrar">
            </form>
            <div class="actionLogin">
            <span class="log">Ainda não tem cadastro? <br><a href="formSignInUser.php">clique aqui!</a></span>
            <span class="log">Esqueceu a senha? <br><a href="formRecoverPassword.php">clique aqui!</a></span>
            </div>
        </div>

        <div id="nav" style="display: none;"></div>
    </main>

    <footer></footer>

    <script>
        let aviso = document.querySelector('.warn')
        let btnWarn = document.querySelector('#btnWarn')
        btnWarn.onclick = function () {
            aviso.classList.remove('nouser')
        }

        function login(event){
            event.preventDefault()
            let user = document.querySelector('#user').value
            let pass = document.querySelector('#pass').value

            let navegador = document.querySelector('#nav')
            navegador.innerHTML += `<iframe src="../controller/login.php?user=${user}&pass=${pass}" frameborder="0" id="sql" ></iframe>`
            let iframe = document.querySelector('#sql')
            iframe.src = `../controller/login.php?user=${user}&pass=${pass}`

            let timer = setInterval(() => {        
                var data = window.sessionStorage.getItem('id')
                clearInterval(timer)
                window.sessionStorage.removeItem('id')
                iframe.parentNode.removeChild(iframe)
                if(data == 'false'){
                    aviso.classList.add('nouser')
                }else{
                    window.location.href = "../index.php"
                }
            }, 100)
        }

        document.addEventListener("keypress", function (event){
            var tcl = event.keyCode || event.wich
            if(tcl == 13  && aviso.classList.contains('nouser')){                
                aviso.classList.remove('nouser')
                event.preventDefault()
            }
        })
    </script>
</navegador>
</html>