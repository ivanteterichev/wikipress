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

        <div class="container article-wrapper">
            <div class="article-wrapper__navigation">
                <span class="article-wrapper-navigation article-wrapper-navigation__chapter"><a href="<?php echo get_site_url(); ?>" style="display:inline;padding:0;"><?php _e( 'Home', 'wikipress' ); ?></a></span>
                <img src="<?php echo get_template_directory_uri() . '/assets/img/navigation.png' ?>">
                <span class="article-wrapper-navigation article-wrapper-navigation__article" data-theme-color="text"><?php single_post_title(); ?></span>
            </div>

            <div class="article">
                <div class="article__h1">
                    <h1><?php the_title(); ?></h1>
                </div>
                <?php if ( the_content() ) : ?>
                    <?php the_content(); ?>
                <?php endif; ?>
            </div>

            <p><?php _e( 'Last Modified Date', 'wikipress' ); ?>: <?php the_modified_date( "d-m-Y" ); ?></p>
        </div>

        <div class="container">
            <?php 
            $args = array(
                'before'           => '<div class="pagination">' . _e( 'Pages', 'wikipress' ),
                'after'            => '</div>',
                'link_before'      => '',
                'link_after'       => '',
                'next_or_number'   => 'number',
                'nextpagelink'     => _e( 'Next page', 'wikipress' ),
                'previouspagelink' => _e( 'Previus page', 'wikipress' ),
                'pagelink'         => '%',
                'echo'             => 1,
            ); 

            wp_link_pages( $args );
            ?>
        </div>

        <div class="container">
            <div style="display:flex;justify-content:space-between;" class="wikipress-post-navigation">
                <?php
                if ( get_previous_post_link() ) {
                    previous_post_link( '%link', '&laquo; %title', 1 );
                }
                if ( get_next_post_link() ) {
                    next_post_link( '%link', '%title &raquo;', 1 );
                }
                ?>
            </div>
        </div>

        <?php if( get_the_tags() ) : ?>
            <div class="container"><p><?php the_tags( null, '', '' ); ?></p></div>
        <?php endif; ?>
        <div class="container"><?php comments_template( '', true ); ?></div>
        <?php get_footer(); ?>