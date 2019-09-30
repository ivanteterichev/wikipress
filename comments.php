    <h3><?php _e('Comments on the post', 'wikipress') ; ?> &laquo;<?php the_title();?>&raquo;</h3>
    <div class="wikipress-list-comments">
        <?php the_comments_navigation(); ?>
        <ul>
            <?php
                wp_list_comments([
                    'avatar_size'  => 45,
                    'reply_text'   => _e('Reply to comment', 'wikipress'),
                    'callback'     => 'wikipress_comment',
                ]); 
            ?>
        </ul>
        <?php the_comments_navigation(); ?>
        <?php
        if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
            ?>
        <p class="no-comments"><?php _e('No comments', 'wikipress') ; ?></p>
        <?php endif; ?>
        <?php
		comment_form(
			array(
				'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
				'title_reply_after'  => '</h2>',
			)
		);
		?>
    </div>