<?php
/* пользователь не авторизован */
if( !is_user_logged_in() ):
    $var = '<a href="'.site_url( 'registration' ).'">Регистрация</a>';
    /* Неверный логин/пароль */
    if( $_GET && $_GET['login'] == 'failed' ):
        echo 'Неверный логин/пароль';
        wp_login_form(array('remember' => '0'));
        echo $var;
        exit;
    else:
        wp_login_form(array('remember' => '0'));
        echo $var;
        exit;
    endif;
endif;