<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php get_sidebar(); ?>

<div class="page-content-wrapper">
    <section class="top-panel align-items-center">
        <div class="row">
            <div class="col-12">
                <div class="top-panel__icon">
                    <img src="<?php echo get_template_directory_uri() . '/img/menu.png'; ?>"/>
                </div>
            </div>
        </div>
    </section>
    
    <header class="header d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-12">
                <div class="header__title">
                    <h1>
                        <span id="text-h1"><?php echo get_theme_mod( 'wikipress_text_H1' ); ?></span>
                        <?php echo get_bloginfo( 'name' ); ?>
                    </h1>
                </div>
            </div>
            <div class="col-12">
                <div class="header__input header-input d-flex justify-content-center">
                    <input class="header-input__search-field" 
                           type="text"
                           placeholder="<?php echo esc_html__( 'Keyword, for example, &laquo;Salary&raquo;, &laquo;Promotion&raquo;, &laquo;About the company&raquo;', 'wikipress' ); ?>">
                    <ul class="header-input__search-result"></ul>
                </div>
            </div>
        </div>
    </header>