<?php get_header( 'single' ); ?>

<body class="article__body">
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
    
    <div class="container">
        <section class="section d-flex align-items-center">
            <div class="row">
                <div class="col-12">
                    <div class="section__title">
                        <h2><?php _e('Tag Entries', 'wikipress'); ?> - &laquo;<?php single_tag_title(); ?>&raquo;</h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="section">
            <div class="row">
            <?php
            if( is_tag() ){
                $this_tag = $wp_query->queried_object->slug;
                $tags_posts = get_posts( array ( 'numberposts' => -1, 'tag' => $this_tag ) );
                foreach( $tags_posts as $post ){
                    setup_postdata( $post );
                    if ( $post->ID ){
                        ?>
                        <div id="post-<?php the_ID(); ?>" <?php post_class( ['subsection', 'card-wrapper', 'col-xl-4', 'col-lg-12'] ); ?>>
                            <div class="card d-flex">
                                <div class="card__title">
                                    <h4><?php the_title(); ?></h4>
                                </div>
                                <div class="card__subscription">
                                    <h5><?php the_excerpt(); ?></h5>
                                </div>
                                <div class="card__link">
                                    <a href="<?php the_permalink( $post->ID ); ?>"><?php _e( 'More', 'wikipress' ); ?> &#8594;</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                wp_reset_postdata();
            }
            ?>
            </div>
        </section>
    </div>
    
<?php get_footer(); ?>