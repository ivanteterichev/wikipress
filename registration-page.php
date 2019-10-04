<?php
/*
* Template Name: Registration Page
*/
if( isset($_POST['wp-submit']) ){
    $userdata = array(
		'user_login' => $_POST['user_login'],
		'user_email' => $_POST['user_email'],
        'user_pass'  => $_POST['user_pass'],
		'role'       => 'subscriber',
	);
    $user_id = wp_insert_user( $userdata ) ;

	// возврат
	if( !is_wp_error( $user_id ) ) {
		wp_redirect( site_url() );
	}
    else {
		echo $user_id->get_error_message();
	} 
}

?>
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
    <h2>Регистрация</h2>
    <form id="registerform" action="" method="post">
        <p>
            <label for="user_login">Имя пользователя</label>
            <input type="text" name="user_login" id="user_login">
            
        </p>
        <p>
            <label for="user_email">E-mail</label>
            <input type="email" name="user_email" id="user_email">
        </p>
        <p>
            <label for="user_pass">Пароль</label>
            <input type="password" name="user_pass" id="user_pass">
        </p>
        <!--<p id="reg_passmail">Подтверждение регистрации будет отправлено на ваш e-mail.</p>-->
        <p class="submit">
            <input type="submit" name="wp-submit" id="wp-submit" value="Регистрация">
        </p>
    </form>
</div>
</body>
</html>