<?php
/* Connect scripts and styles */
add_action( 'wp_enqueue_scripts', 'wikipress_scripts' );
function wikipress_scripts(){
    wp_enqueue_style(
        'wikipress_style'
        ,get_template_directory_uri() . '/style.css'
    );

    wp_enqueue_style(
        'wikipress_bootstrap'
        ,get_template_directory_uri() . '/assets/css/libs/bootstrap-grid.min.css'
    );

    wp_enqueue_style(
        'wikipress_fonts'
        ,'https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap&subset=cyrillic'
    );

    wp_enqueue_script(
        'wikipress_core'
        ,get_template_directory_uri() . '/assets/js/core/core.min.js'
        ,array()
        ,false
        ,'in_footer'
    );

    wp_enqueue_script(
        'wikipress_scripts'
        ,get_template_directory_uri() . '/assets/js/scripts.js'
        ,array()
        ,false
        ,'in_footer'
    );
}

/* Connecting theme support */
add_action( 'after_setup_theme', 'wikipress_setup' );
function wikipress_setup(){
    add_theme_support( 'custom-logo', [
        'height'      => '43',
        'width'       => '196',
        'flex-width'  => false,
        'flex-height' => false,
        'header-text' => '',
    ] );
    add_theme_support( 'automatic-feed-links' );

    load_theme_textdomain('wikipress', get_template_directory() . '/languages');

    add_theme_support( 'title-tag' );
    
    $GLOBALS['content_width'] = apply_filters( 'wikipress_content_width', 840 );
}

// Customizer
add_action('customize_register', 'wikipress_customize_register');

function wikipress_customize_register($wp_customize){
    /* Greetings in a head */
    $wp_customize->add_setting( 'wikipress_text_H1', [
        'default'            => 'Welcome',
        'sanitize_callback'  => 'sanitize_text_field',
        'transport'          => 'postMessage',
    ] );
    $wp_customize->add_control( 'wikipress_text_H1', [
        'section'  => 'title_tagline',
        'label'    => 'Greetings in a head',
        'type'     => 'text',
        'priority' => 9,
    ] );

    /* Color theme */
    $wp_customize->add_setting('wikipress_theme_color', array(
        'default' => '#e77e22',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'=>'postMessage',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'wikipress_theme_color',
            array(
                'label'   => 'Color theme',
                'section' => 'title_tagline',
                'setting' => 'wikipress_theme_color',
            )
        )
    );
}

add_action('wp_head', 'wikipress_customize_css');
function wikipress_customize_css(){
    ?>
    <style type="text/css">
        header,
        [data-theme-color="bg"] {
            background-color: <?php get_theme_mod('wikipress_theme_color'); ?>
        }
        .card a {
            color: <?php get_theme_mod('wikipress_theme_color'); ?>
        }



        [data-theme-color="text"] {
            color: <?php get_theme_mod('wikipress_theme_color'); ?>
        }

        blockquote {
            border-left-color: <?php get_theme_mod('wikipress_theme_color'); ?>
        }

        .wp-block-button a {
            background-color: <?php get_theme_mod('wikipress_theme_color'); ?>
        }

        ul li:before,
        ol li:before {
            color: <?php get_theme_mod('wikipress_theme_color'); ?>
        }

        figure.wp-block-pullquote {
            border-top-color: <?php get_theme_mod('wikipress_theme_color'); ?>;
            border-bottom-color: <?php get_theme_mod('wikipress_theme_color'); ?>
        }
    </style>
    <?php
}

add_action('customize_preview_init', 'wikipress_customize_js');
function wikipress_customize_js(){
    wp_enqueue_script('wikipress-customizer', get_template_directory_uri() . '/assets/js/wikipress-customize.js', array( 'jquery','customize-preview' ),	'', true);
}

// AJAX site search
function wikipress_ajax_search(){

	$args = array(
		'post_type'        => 'any',
		'post_status'      => 'publish',
		'order'            => 'DESC',
		'orderby'          => 'date',
		's'                => $_POST['term'],
		'posts_per_page'   => 5
    );

    $query = new WP_Query( $args );

	if($query->have_posts()) {
        while ($query->have_posts()) { $query->the_post();
?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php the_excerpt();?>
            </li>
            <?php
        }
    }
    else {
            ?>
        <li>
            <a href="#">Nothing found, try another query</a>
        </li>
        <?php
    }

    exit;
}
add_action('wp_ajax_nopriv_ajax_search','wikipress_ajax_search');
add_action('wp_ajax_ajax_search','wikipress_ajax_search');