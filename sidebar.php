<aside class="aside">
	<div class="aside__element d-flex justify-content-center">
        <?php if( has_custom_logo() ) : the_custom_logo(); else: ?>
		<a class='logo-link' href='/index.php'>
            <img src="<?php echo get_template_directory_uri() . '/img/logo-footer.png'; ?>" alt="Logo">
        </a>
        <?php endif; ?>
	</div>
	<div class="aside__element d-flex justify-content-center">
        <input class="aside__search-field" type="text" placeholder="Search">
        <ul class="aside__search-result"></ul>
	</div>
	<div class="aside__element d-flex">
		<div class="aside__menu aside-menu">
        <?php
            $categories = get_categories( array(
            'taxonomy'     => 'category',
            'type'         => 'post',
            'child_of'     => 0,
            'parent'       => '',
            'orderby'      => 'name',
            'order'        => '',
            'hide_empty'   => 1,
            'hierarchical' => 1,
            'exclude'      => '',
            'include'      => '',
            'number'       => 0,
            'pad_counts'   => false,
        ) );
        ?>
        <?php if( $categories ): ?>
        <?php foreach($categories as $k => $v): ?>
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
                'meta_value'  =>'',
                'post_type'   => 'post',
                'suppress_filters' => true,
            ) );
        ?>
        <?php if($k == 0): ?>
            <div class="aside-menu__navigation aside-menu-navigation aside-menu__start aside-menu-start">
				<div class="aside-menu-navigation__title aside-menu-start__title"><?php echo $v->name; ?></div> 
				<span class="aside-menu-start__img">
					<img src="<?php echo get_template_directory_uri() . '/img/arrow.png'; ?>"/>
				</span>
			</div>
			<ul class="aside-menu__list aside-menu-start__list">
                <?php foreach( $posts as $post ): ?>
                <?php setup_postdata($post); ?>
				<li><a href="<?php the_permalink($post->ID); ?>"><?php the_title(); ?></a></li>
                <?php endforeach;wp_reset_postdata(); ?>
			</ul>
                <?php else: ?>
            <div class="aside-menu__navigation aside-menu-navigation aside-menu__setting aside-menu-setting">
				<div class="aside-menu-navigation__title aside-menu-setting__title"><?php echo $v->name; ?></div> 
				<span class="aside-menu-setting__img">
					<img src="<?php echo get_template_directory_uri() . '/img/arrow.png'; ?>"/>
				</span>
			</div>
			<ul class="aside-menu__list aside-menu-setting__list">
				<?php foreach( $posts as $post ): ?>
                <?php setup_postdata($post); ?>
				<li><a href="<?php the_permalink($post->ID); ?>"><?php the_title(); ?></a></li>
                <?php endforeach;wp_reset_postdata(); ?>
			</ul>
        <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>
		</div>
	</div>
</aside>