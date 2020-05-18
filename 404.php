<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat%3A400%2C500%2C700&display=swap&subset=cyrillic&ver=5.2.3">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() . '/assets/css/404.css'; ?>">
</head>
<body>
    <div class="wrap">
        <div class="txt">
            <div class="logo">
                <img src="<?php echo get_template_directory_uri() . '/img/logo-footer.png'; ?>" 
                     alt="<?php esc_attr_e( 'Logo', 'wikipress' ); ?>">
            </div>
            <div class="txt-item-1">
                <b><?php _e( 'Sorry, the page you tried to view does not exist.', 'wikipress' ); ?></b>
            </div>
            <div class="txt-btn">
                <a href="/"><?php _e( 'Go to Home page', 'wikipress' ); ?></a>
            </div>
        </div>
    </div>
</body>
</html>