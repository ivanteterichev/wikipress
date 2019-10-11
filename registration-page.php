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

	if( !is_wp_error( $user_id ) ) {
		wp_redirect( site_url() );
	}
    else {
		echo $user_id->get_error_message();
	} 
}
get_header('login');
?>
    <h2><?php _e('Registration', 'wikipress'); ?></h2>
    <form id="registerform" action="" method="post">
        <p>
            <label for="user_login"><?php _e('Username', 'wikipress'); ?></label>
            <input type="text" name="user_login" id="user_login">
            
        </p>
        <p>
            <label for="user_email">E-mail</label>
            <input type="email" name="user_email" id="user_email">
        </p>
        <p>
            <label for="user_pass"><?php _e('Password', 'wikipress'); ?></label>
            <input type="password" name="user_pass" id="user_pass">
        </p>
        <p class="submit">
            <input type="submit" name="wp-submit" id="wp-submit" value="<?php __('Registration', 'wikipress'); ?>">
        </p>
        <a href="<?php echo site_url(); ?>"><?php _e('Login', 'wikipress'); ?></a>
    </form>
    
<?php get_footer('login'); ?>