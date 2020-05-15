<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <?php wp_head(); ?>
    <style type="text/css">
        header.header {
            background: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
        }
        .card a {
            color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
        }

        a, a:visited {
            color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
        }

        [data-theme-color="text"] {
            color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
        }

        blockquote {
            border-left-color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
        }

        .wp-block-button a {
            background-color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
        }

        ul li:before,
        ol li:before {
            color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
        }

        figure.wp-block-pullquote {
            border-top-color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
            border-bottom-color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
        }

        cite.fn a {
            color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
        }

        div.wikipress-list-comments a {
            color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
        }

        #submit {
            background-color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
        }

        .wikipress-post-navigation a {
            color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
        }

        .article-wrapper .article-wrapper__navigation .article-wrapper-navigation__article {
            color: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?>;
        }

        .wp-block-file__button {
            background: <?php echo get_theme_mod( 'wikipress_theme_color' ); ?> !important;
        }
    </style>
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
                        placeholder="<?php _e( 'Search', 'wikipress' ); ?>">
                        <ul class="header-input__search-result"></ul>
                    </div>
                </div>
            </div>
        </header>