<?php
/* Connect scripts and styles */
add_action( 'wp_enqueue_scripts', 'wikipress_scripts' );
function wikipress_scripts() {
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
    
    if ( is_singular() ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

/* Connecting theme support */
add_action( 'after_setup_theme', 'wikipress_setup' );
function wikipress_setup() {
    add_theme_support( 'custom-logo', array(
        'height'      => '43',
        'width'       => '196',
        'flex-width'  => false,
        'flex-height' => false,
        'header-text' => '',
    ) );
    add_theme_support( 'automatic-feed-links' );

    load_theme_textdomain( 'wikipress', get_template_directory() . '/languages' );

    add_theme_support( 'title-tag' );
    
    $GLOBALS['content_width'] = apply_filters( 'wikipress_content_width', 840 );
}

/* Customizer */
add_action( 'customize_register', 'wikipress_customize_register' );

function wikipress_customize_register( $wp_customize ){
    /* Greetings in a head */
    $wp_customize->add_setting( 'wikipress_text_H1', [
        'default'            => __( 'Welcome', 'wikipress' ),
        'sanitize_callback'  => 'sanitize_text_field',
        'transport'          => 'postMessage',
    ] );
    $wp_customize->add_control( 'wikipress_text_H1', array(
        'section'  => 'title_tagline',
        'label'    => __( 'Greetings in a head', 'wikipress' ),
        'type'     => 'text',
        'priority' => 9,
    ) );

    /* Color theme */
    $wp_customize->add_setting( 'wikipress_theme_color', array(
        'default' => '#0071BC',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'=>'postMessage',
    ) );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'wikipress_theme_color',
            array(
                'label'   => __( 'Color theme', 'wikipress' ),
                'section' => 'title_tagline',
                'setting' => 'wikipress_theme_color',
            )
        )
    );
}

add_action( 'wp_head', 'wikipress_customize_css' );
function wikipress_customize_css() {
    ?>
    <style type="text/css">
        header,
        [data-theme-color="bg"] {
            background-color: <?php get_theme_mod( 'wikipress_theme_color' ); ?>;
        }
        .card a {
            color: <?php get_theme_mod( 'wikipress_theme_color' ); ?>;
        }

        [data-theme-color="text"] {
            color: <?php get_theme_mod( 'wikipress_theme_color' ); ?>;
        }

        blockquote {
            border-left-color: <?php get_theme_mod( 'wikipress_theme_color' ); ?>;
        }

        .wp-block-button a {
            background-color: <?php get_theme_mod( 'wikipress_theme_color' ); ?>;
        }

        ul li:before,
        ol li:before {
            color: <?php get_theme_mod( 'wikipress_theme_color' ); ?>;
        }

        figure.wp-block-pullquote {
            border-top-color: <?php get_theme_mod( 'wikipress_theme_color' ); ?>;
            border-bottom-color: <?php get_theme_mod( 'wikipress_theme_color' ); ?>;
        }
        
        cite.fn a {
            color: <?php get_theme_mod( 'wikipress_theme_color' ); ?>;
        }
        
        div.wikipress-list-comments a {
            color: <?php get_theme_mod( 'wikipress_theme_color' ); ?>;
        }
        
        #submit {
            background-color: <?php get_theme_mod( 'wikipress_theme_color' ); ?>;
        }
        
        .wikipress-post-navigation a {
            color: <?php get_theme_mod( 'wikipress_theme_color' ); ?>;
        }
    </style>
    <?php
}

add_action( 'customize_preview_init', 'wikipress_customize_js' );
function wikipress_customize_js() {
    wp_enqueue_script( 'wikipress-customizer', get_template_directory_uri() . '/assets/js/wikipress-customize.js', array( 'jquery','customize-preview' ), '', true );
}

/* AJAX site search */
function wikipress_ajax_search() {

	$args = array(
		'post_type'        => 'any',
		'post_status'      => 'publish',
		'order'            => 'DESC',
		'orderby'          => 'date',
		's'                => $_POST['term'],
		'posts_per_page'   => 5
    );

    $query = new WP_Query( $args );

	if( $query->have_posts() ) {
        while ( $query->have_posts() ) { $query->the_post();
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
            <a href="#"><?php _e( 'Nothing found, try another query', 'wikipress' ); ?></a>
        </li>
        <?php
    }

    exit;
}
add_action( 'wp_ajax_nopriv_wikipress_ajax_search','wikipress_ajax_search' );
add_action( 'wp_ajax_wikipress_ajax_search','wikipress_ajax_search' );

/* Comments */
function wikipress_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case '' :
?>
       <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
            <div id="comment-<?php comment_ID(); ?>" class="comment-body">
                <div class="comment-author vcard">
                    <?php echo get_avatar( $comment->comment_author_email, $args['avatar_size'] ); ?>
                    <?php printf( __( '<cite class="fn">%s</cite>&nbsp;', 'wikipress' ), get_comment_author_link() ) ?>
                    <?php echo edit_comment_link( __( 'Edit', 'wikipress' ), ' ' ); ?>
                </div>
 
                <div class="comment-meta commentmetadata">
                    <?php printf( __( '%1$s at %2$s', 'wikipress' ), get_comment_date(),  get_comment_time() ); ?>
                </div>
 
<?php if ( $comment->comment_approved == '0' ) : ?>
                <div class="comment-awaiting-verification"><?php _e( 'Your comment is awaiting moderation.', 'wikipress' ) ?></div>
             <br />
<?php endif; ?>
                <?php comment_text() ?>
                <div class="reply">
                    <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div>
            </div>
 
<?php
        break;
        case 'pingback'  :
        case 'trackback' :
?>
            <li class="post pingback">
                <?php comment_author_link(); ?>
                <?php edit_comment_link( _e( 'Edit', 'wikipress' ), ' ' ); ?>
<?php
        break;
    endswitch;
}


add_filter( 'comment_form_fields', 'wikipress_comment_fields' );
function wikipress_comment_fields( $fields ){

	$new_fields = array();

	$myorder = array( 'author', 'email', 'url', 'comment' );

	foreach( $myorder as $key ){
		$new_fields[ $key ] = $fields[ $key ];
		unset( $fields[ $key ] );
	}

	if ( $fields )
		foreach( $fields as $key => $val )
			$new_fields[ $key ] = $val;

	return $new_fields;
}