<?php
if( !is_user_logged_in() ):
    if( $_GET && $_GET['login'] == 'failed' ):
    ?>
    <?php get_header('login'); ?>
        <h2><?php _e('Login', 'wikipress'); ?></h2>
        <p class="error"><?php _e('Invalid username / password', 'wikipress'); ?></p>
        <?php wp_login_form(array('remember' => '0')); ?>
        
        <a href="<?php echo site_url( 'registration' ); ?>"><?php _e('Registration', 'wikipress'); ?></a>
    <?php get_footer('login'); ?>
    <?php
        exit;
    else:
    ?>
    <?php get_header('login'); ?>
        <h2><?php _e('Login', 'wikipress'); ?></h2>
        <?php wp_login_form(array('remember' => '0')); ?>
        <a href="<?php echo site_url( 'registration' ); ?>"><?php _e('Registration', 'wikipress'); ?></a>
    <?php get_footer('login'); ?>
    <?php        
        exit;
    endif;
endif;