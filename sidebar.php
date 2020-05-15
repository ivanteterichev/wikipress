<aside class="aside">
    <div class="aside__element d-flex justify-content-center">
        <?php if ( has_custom_logo() ) : the_custom_logo(); else : ?>
            <a class='logo-link' href='/index.php'>
                <img src="<?php echo get_template_directory_uri() . '/img/logo.png'; ?>" 
                width="150px" 
                alt="<?php _e( 'Logo', 'wikipress' ); ?>">
            </a>
        <?php endif; ?>
    </div>
    <div class="aside__element d-flex justify-content-center">
        <input class="aside__search-field" type="text" placeholder="<?php _e( 'Search', 'wikipress' ); ?>">
        <ul class="aside__search-result"></ul>
    </div>
    
    <div class="aside__element d-flex">
        <div class="aside__menu aside-menu">
            <?php
            global $wpdb;
            
            $wikipress_options = array(
                'taxonomy' => 'category',
                'type' => 'post',
                'child_of' => 0,
                'parent' => '',
                'orderby' => 'name',
                'order' => '',
                'hide_empty' => 0,
                'hierarchical' => 1,
                'exclude' => '',
                'include' => '',
                'number' => 0,
                'pad_counts' => false,
            );
            $categories = get_categories( $wikipress_options );
            ?>
            <?php if ( $categories ) : ?>
                <?php foreach ( $categories as $k => $v ) : ?>
                    <?php
                    $posts = get_posts( array(
                        'numberposts' => -1,
                        'category'    => $v->term_id,
                        'orderby'     => 'date',
                        'hide_empty'  => 0,
                        'order'       => 'ASC',
                        'include'     => array(),
                        'exclude'     => array(),
                        'meta_key'    => '',
                        'meta_value'  => '',
                        'post_type'   => 'post',
                        'suppress_filters' => true,
                    ) );
                    ?>
                    <?php if ( $k == 0 ) : ?>
                        <div class="aside-menu__navigation aside-menu-navigation aside-menu__start aside-menu-start">
                            <div class="aside-menu-navigation__title aside-menu-start__title"><?php echo $v->name; ?></div>
                            <span class="aside-menu-start__img">
                                <img src="<?php echo get_template_directory_uri() . '/img/arrow.png'; ?>"/>
                            </span>
                            <ul class="aside-menu__list aside-menu-start__list">
                                <?php foreach( $posts as $post ) : ?>
                                    <?php setup_postdata( $post ); ?>
                                    <li><a href="<?php the_permalink( $post->ID ); ?>"><?php the_title(); ?></a></li>
                                <?php endforeach;
                                wp_reset_postdata(); ?>
                            </ul>
                        </div>
                        <?php else: ?>
                            <div class="aside-menu__navigation aside-menu-navigation aside-menu__setting aside-menu-setting">
                                <div class="aside-menu-navigation__title aside-menu-setting__title"><?php echo $v->name; ?></div>
                                <span class="aside-menu-setting__img">
                                    <img src="<?php echo get_template_directory_uri() . '/img/arrow.png'; ?>"/>
                                </span>
                                
                                <ul class="aside-menu__list aside-menu-setting__list">
                                    <?php foreach( $posts as $post ) : ?>
                                        <?php setup_postdata( $post ); ?>
                                        <li><a href="<?php the_permalink( $post->ID ); ?>"><?php the_title(); ?></a></li>
                                    <?php endforeach;
                                    wp_reset_postdata(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </aside>