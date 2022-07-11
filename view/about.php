<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/mobile.css">
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/about.css">
    <script src="../js/menu.js" defer></script>
    <script src="../js/menuFloat.js" defer></script>
    <script src="../js/loadProfileSQLView.js" defer></script>
    <title>Sobre</title>
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
                <li>Mods</li>
                <li id="entCad"></li>
                <li>Sobre</li>
            </ul>
        </div>

        <div class="blankMenu" onclick="showMenu()">

        </div>
    </div>

    <main>
        <h1>História</h1>
        <p>Sempre quis ter um site e nunca tinha um objetivo em específico, então veio a ideia de criar um site onde se pareça com uma rede social para a comunidade que adora GTA, um dos meus canais, em específico este <a href="https://www.youtube.com/channel/UCeuhEjOoQbWocjae2FJ7WYQ" target="_blank">aqui</a> é o responsável por eu ter tido a ideia, se não ficou claro o criador do site é o próprio maiorzin!</p>

        <h1>Equipe</h1>
        <p>Gostaria de falar que há uma grande equipe que me ajuda nos vídeos, posts, instagram, youtube, site, mas sou só eu mesmo!</p>

        <h1>Ambiente</h1>
        <p>Gosto de chamar cada uma das minhas redes sociais e canais de uma parte da minha vida, mas a minha vida não se resumo a só GTA, aqui é onde vocês podem ver tudo que faz parte da minha vida. Ah, mais coisa, basta clicar em um item abaixo para ser direcionado a ele.</p>

        <h3 style="background-image: linear-gradient(90deg, #FF8C00, #FF0080);">Instagram</h3>

        <ul>
            <li><a href="">Fã Clube (Esse é o perfil do clube do maiorzin)</a></li>
            <li><a href="">Empresas Da Internet (Esse é o perfil com dicas de canais, perfils, programação, empresas e etc)</a></li>
            <li><a href="">Perfil Pessoal</a></li>
        </ul>

        <h3 style="background-color: red;">Youtube</h3>

        <ul>
            <li><a href="">Canal Oasis (Canal de entretenimento, comédia e vlogs)</a></li>
            <li><a href="">Canal Marcos Silva (Canal de tecnologia e Unboxings)</a></li>
            <li><a href="">Canal de Gameplay</a></li>
            <li><a href="">Canal Maiorzin</a></li>
        </ul>

        <h3 style="background-color: #2193b0;">Outras redes sociais</h3>

        <ul>
            <li><a href="">LinkedIn</a></li>
            <li><a href="">GitHub</a></li>
            <li><a href="">Twitter</a></li>
            <li><a href="">Facebook</a></li>
            <li><a href=""></a></li>
        </ul>

        <h3>Termos de uso</h3>

        Esse é meu primeiro site, então, peguem leve :)

        <ul>
            <li>Esse site só funciona com cookies então ao criar uma conta vocês devem aceitar os cookies.</li>
            <li>O site ainda está em desenvolvimento então poderão haver mudanças.</li>
            <li>Problemas com direitos serão de responsabilidade do usuário que fez a postagem.</li>
            <li>O usuário correrá o risco de perder a conta se: postar fotos com público para maiores de 18; denunciar muitas vezes sem comprovação, ser denunciado e ser comprovado que há muitas postagens de outras pessoas, fizer mal uso das postagens, se for decidido pelo administrador.</li>
        </ul>
    </main>

    <footer>
        <div id="nav" style="display: none;"></div>
    </footer>
    
</body>
</html>