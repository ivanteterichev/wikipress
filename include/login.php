<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <style>
        body{
            display:flex;
            flex-flow: row nowrap;
            align-items: center;
            background-color:rgba(0,0,0,0.05);
        }
        .form{
            border:1px solid silver;
            width:320px;
            margin: 0 auto;
            padding:20px;
            background-color:white;
        }
        form label{
            display:block;
            margin-bottom:5px;
        }
        form input[type="text"],form input[type="email"],form input[type="password"]{
            width:calc(100% - 10px);
            height:30px;
            padding:5px;
        }
    </style>
</head>
<body>
<div class="form">
    <h2>Авторизация</h2>
    <?php
    /* пользователь не авторизован */
    if( !is_user_logged_in() ){
        $registr = '<a href="'.site_url( 'registration' ).'">Регистрация</a>';
        /* Неверный логин/пароль */
        if( $_GET && $_GET['login'] == 'failed' ){
            echo 'Неверный логин/пароль';
            wp_login_form(array('remember' => '0'));
            echo $registr;
    ?>
</div>
</body>
</html>
<div class="form">
    <h2>Авторизация</h2>
    <?php  
            exit;
        }
        else{
            wp_login_form(array('remember' => '0'));
            echo $registr;
    ?>
</div>
</body>
</html>
    <?php 
            exit;
        }
    }
    ?>
