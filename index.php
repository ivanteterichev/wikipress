<?php get_header(); ?>
<?php
global $wpdb;
            
$wikipress_options = array (
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
    <div class="container">
        <?php foreach ( $categories as $k => $v ) : ?>
            <section class="section d-flex align-items-center">
                <div class="row">
                    <div class="col-12">
                        <div class="section__title">
                            <h2><?php echo $v->name; ?></h2>
                        </div>
                    </div>
                    <?php if ( $v->description ) : ?>
                        <div class="col-12">
                            <div class="section__subscription">
                                <p><?php echo $v->description, 'wikipress'; ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
            
            <section class="section">
                <div class="row">
                    <?php
                    $posts = get_posts( array(
                        'numberposts' => -1,
                        'category'    => $v->term_id,
                        'orderby'     => 'date',
                        'hide_empty'  => 0,
                        'order'       => 'DESC',
                        'include'     => array(),
                        'exclude'     => array(),
                        'meta_key'    => '',
                        'meta_value'  => '',
                        'post_type'   => 'post',
                        'suppress_filters' => true,
                    ) );
                    ?>
                    <?php foreach ( $posts as $k2 => $post ) : ?>
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
                    <?php endforeach; ?>
                </div>
            </section>
            
        <?php endforeach; ?>
    </div>
    <!-- <?php the_posts_pagination(); ?> -->
<?php endif; ?>

<?php get_footer(); ?>