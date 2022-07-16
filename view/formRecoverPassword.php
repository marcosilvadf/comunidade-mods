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
    <title>Recuperar senha</title>
</head>
<body>
    <header>
        <div class="menu">
            <div class="menuIcon" onclick="showMenu()">

            </div>
        </div>
        <div class="title"><a href="../index.php">mods</a></div>
        <div class="login"><a href="formLogin.php">login</a></div>
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
            <h4 class="formTitle">Recuperar senha</h4>
            <form action="../controller/recoveryPass.php" method="post" autocomplete="off">
                <input type="text" name="user" id="user" placeholder="Usuário:" required>

                <input type="text" name="keyForPass" id="keyForPass" placeholder="Palavra para recuperar senha:" required>

                <div id="allPass">
                    <div class="showHidePass">
                        <span class="eye"><i class="fa-solid fa-eye"></i></span>
                        <input type="password" name="pass" id="pass" placeholder="Senha:" maxlength="10" required>
                    </div>

                    <div class="showHidePass">
                        <span class="eye"><i class="fa-solid fa-eye"></i></span>
                        <input type="password" name="confirmPass" id="confirmPass" class="error" placeholder="Confirmar senha:" maxlength="10" required>
                    </div>                    
                </div>

                <span class="blankRes">Digite o usuário e a palavra passe</span>
                                    
                <input type="submit" value="encontrar usuário" onclick="findUser(event)">
            </form>            
        </div>
    </main>

    <footer>
        <div id="nav" style="display: none;"></div>
    </footer>

    <script>
        let inputSenha = document.querySelectorAll('.showHidePass input')
        let divSenha = document.querySelectorAll('.showHidePass')
        let message = document.querySelector('.blankRes')
        let formRecovery = document.querySelector('form')
        let submitButton = document.querySelector("input[type='submit'")        
        let navegador = document.querySelector('#nav')
        let allpass = document.querySelector('#allPass')
        
        for (let index = 0; index < divSenha.length; index++) {
            divSenha[index].style.visibility = 'hidden'
        }

        function findUser(event){
            event.preventDefault()
            let user = document.querySelector('#user')
            let keyPass = document.querySelector('#keyForPass')
            navegador.innerHTML += `<iframe src="../controller/getUserByRecovery.php?name=${user.value}&key=${keyPass.value}" frameborder="0" id="sql" ></iframe>`
            let iframe = document.querySelector('#sql')
            iframe.src = `../controller/getUserByRecovery.php?name=${user.value}&key=${keyPass.value}`
            let timer = setInterval(() => {        
                var data = window.sessionStorage.getItem('userForMods')

                if(data == 'true'){
                    for (let index = 0; index < inputSenha.length; index++) {
                        divSenha[index].style.visibility = 'visible'                        
                    }
                    allpass.classList.add('active')
                    message.style.transition = '.5s'
                    message.style.backgroundColor = 'green'
                    message.innerHTML = 'Digite a nova senha'
                    user.readOnly = 'false'
                    keyPass.readOnly = 'false'
                    submitButton.value = 'mudar senha'
                    submitButton.removeAttribute('onclick')
                }else{
                    message.innerHTML = 'Usuário não encontrado ou palavra incorreta'
                }

                clearInterval(timer)
                window.sessionStorage.removeItem('userForMods')
                navegador.innerHTML = ''
            }, 100)
        }
    </script>
</body>
</html>