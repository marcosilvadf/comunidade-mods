<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../lib/fontawesome/css/all.min.css">
    <script src="../lib/fontawesome/js/all.min.js"></script>
    <style>
        @font-face {
            font-family: 'poppins';
            src: url('../lib/fonte/Poppins-Regular.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        *
        {
            scroll-behavior: smooth;
            box-sizing: border-box;
            margin: 0;
            font-family: 'poppins';
            transition: 0.1s;
        }

        body
        {
            color: white;
            overflow-x: hidden;
        }

        body::-webkit-scrollbar
        {
            display: none;
        }

        .comment p
        {
            font-size: 1em;
            text-align: justify;
            padding: 10px;
        }

        .upProfile
        {
            display: flex;
            flex-direction: row;
            align-items: center;
            width: 100%;
            height: 50px;
            margin: 5px;
        }

        .upProfile img
        {
            width: 25px;
            height: 25px;
            margin: 5px 3px;
            border-radius: 50%;    
            object-fit: cover;
        }

        .upProfile h4
        {
            margin: 0px 5px;
            font-size: 0.8em;            
        }

        .upProfile .datePub
        {
            letter-spacing: 1px;
            margin-left: auto;
            margin-right: 15px;
            font-size: 0.6em;
            font-weight: bolder;
        }

        .form form
        {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        .form form input
        {
            width: 20%;
            font-size: .7em;
            padding-left: 5px;
            color: white;
            border: none;
            outline: none;
            background-color: rgba(0, 0, 0, 0.377);
        }

        .form form input::placeholder
        {
            color: white;
        }

        .form form button
        {
            color: white;
            border: none;
            background-color: rgba(0, 0, 0, 0.377);
        }

        @media (max-width: 600px)
        {
            .form form input
            {
                width: 70%;
            }

            .comment p
            {
                font-size: .7em;
            }
        }
    </style>
</head>
<body>
    <div class="form">
        <form action="">
            <input type="text" name="" id="" placeholder="comentar">
            <button><i class="fa-regular fa-paper-plane"></i></button>
        </form>
    </div>
    <div class="comment">
        <div class="upProfile" style="margin-bottom: 10px;">
            <img src="../image/banner-mods.jpg" alt="">
            <h4>vagner tutoriais</h4>

            <span class="datePub">1 semana</span>
        </div>

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti totam quidem laboriosam ut veniam eveniet aperiam delectus cumque rerum magnam pariatur quibusdam, vero hic aliquam facilis, placeat dolores perspiciatis fugiat aspernatur eum perferendis. Quasi nulla dicta suscipit maiores consequuntur optio, doloribus laborum officia blanditiis, voluptate cum commodi deleniti voluptatum autem!</p>
    </div>
</body>
</html>