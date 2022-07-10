<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/mobile.css">
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <script src="../lib/fontawesome/js/all.min.js"></script>
    <script src="../js/menu.js" defer></script>
    <script src="../js/menuFloat.js" defer></script>
    <script src="../js/loadProfileSQLView.js" defer></script>
    <script src="../js/fileProfile.js" defer></script>
    <title>Perfil</title>
</head>
<body onload="profile()">
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
        <div class="boxProfile">

        <form action="../controller/editProfile.php" method="post"  autocomplete="off" enctype="multipart/form-data">
            <label for="prof">
                <img src="../image/logo.png" alt="" id="photoProfile" class="profile">
                <div id="pen"><i class="fa-solid fa-pen"></i></div>
            </label>    

            <div class="profile" style="display: none;">
                <label for=""><span></span></label>
            </div>

            <input type="file" name="prof" id="prof" style="display: none;" disabled>
            <input type="text" name="name" id="name" readonly>
        </form>
            <ul>
                <li>seu nível: <span id="level"></span></li>
                <li>Mods postados: <span id="posts"></span></li>
                <li>Criado em: <span id="date"></span></li>
            </ul>
            <div class="bottom">
                <span class="panel"><a href="managerMods.php">Gerenciar mods</a></span>
            </div>
            
            <button id="cancel" style="display: none;left: 20px;" onclick="cancelEditProfile()"><i class="fa-solid fa-xmark"></i></button>

            <button id="edit" onclick="editProfile()"><i class="fa-solid fa-pen-to-square"></i></button>
        </div>
    </main>

    <footer>
        <div id="nav" style="display: none;"></div>

        <?php
        session_start();

        if(isset($_SESSION['userExistForMods']))
        {
            echo "<script>alert('Nome de usuário já existe!')</script>";
            unset($_SESSION['userExistForMods']);
        }
        ?>
    </footer>

    <script>
        let editProfileImg = document.querySelector("input[type='file']")
        let photoProfile = document.querySelector('#photoProfile')
        let name = document.querySelector('#name')
        let level = document.querySelector('#level')
        let posts = document.querySelector('#posts')
        let date = document.querySelector('#date')
        let form = document.querySelector('form')
        let edit = document.querySelector('#edit')
        let pen = document.querySelector('#pen')
        let cancelButton = document.querySelector('#cancel')
        let orginalName = ''
        let originalProfile = ''

        function loadAllProf(data) {
            photoProfile.src = data['profile']
            originalProfile = data['profile']
            name.value = data['name']
            orginalName = data['name']
            level.innerHTML = data['level']
            posts.innerHTML = data['qtdMods']
            date.innerHTML = data['registrationDate']
        }

        function sendForm(){
            form.submit()
        }

        function editProfile(){
            edit.innerHTML = '<i class="fa-solid fa-check"></i>'
            edit.setAttribute('onclick', 'sendForm()')
            name.focus()
            pen.style.display = 'flex'
            cancelButton.style.display = 'block'
            name.readOnly = false
            editProfileImg.disabled = false
        }

        function cancelEditProfile(){
            edit.innerHTML = '<i class="fa-solid fa-pen-to-square">'
            edit.setAttribute('onclick', 'editProfile()')
            name.value = orginalName
            pen.style.display = 'none'
            image.src = originalProfile
            cancelButton.style.display = 'none'
            name.readOnly = true   
            editProfileImg.disabled = true
            file.value = null
        }
    </script>
</body>
</html>