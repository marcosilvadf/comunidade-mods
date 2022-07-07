        let menuProfile = document.querySelector('#menuProfile')
        let imageMenu = document.querySelector('.menuFloat')
        let navegador = document.querySelector('#nav')
        let entrarCadas = document.querySelector('#entCad')
        let divFloatMenu = document.querySelector('.floatMenu ul')
        let floatMenuProfile = document.querySelector('.floatMenu')
        let imageLogo = document.querySelector('.login img')

        function profile(){
            navegador.innerHTML += `<iframe src="controller/ifLog.php" frameborder="0" id="sql" ></iframe>`
            let iframe = document.querySelector('#sql')
            iframe.src = `controller/ifLog.php`
            let timer = setInterval(() => {        
                var data = JSON.parse(window.sessionStorage.getItem('id'))
                clearInterval(timer)
                window.sessionStorage.removeItem('id')
                if(data != 'noLog'){
                    imageMenu.src = data['profile'].replace('../', '')
                    menuProfile.src = data['profile'].replace('../', '')
                    divFloatMenu.innerHTML += `<li><a href="view/profile.php">perfil</a></li> <li onclick="sair()">sair</li>`
                    entrarCadas.innerHTML = '<a href="./view/profile.php">Perfil</a>'
                }else{
                    imageMenu.src = 'image/logo.png'
                    menuProfile.src = 'image/logo.png'
                    divFloatMenu.innerHTML = `<li><a href="view/formLogin.php">entrar</a></li>`
                    entrarCadas.innerHTML = '<a href="./view/formLogin.php">Entrar/<wbr>Cadastrar</a>'
                }
            }, 100)
        }

        function sair(){
            navegador.innerHTML += `<iframe src="controller/logout.php" frameborder="0" id="sql" ></iframe>`
            let iframe = document.querySelector('#sql')
            iframe.src = `controller/logout.php`
            floatMenuProfile.classList.add('end')
            imageLogo.classList.add('end')
            let timer = setInterval(() => {                        
                clearInterval(timer)
                iframe.parentNode.removeChild(iframe)
                floatMenuProfile.classList.remove('end')
                imageLogo.classList.remove('end')
                profile()
            }, 500);
        }