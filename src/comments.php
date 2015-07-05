<div class="page__content__post__comment">

<?php if( have_comments() ): ?>
<?php $comments_cnt = get_comment_only_number(); ?>

<!-- TRACKBACKS -->
<?php if( get_comments_number() - $comments_cnt > 0 ) { ?>
  <h3>TRACKBACKS</h3>
    <ul class="trackbacks">
        <?php wp_list_comments('type=pings&callback=mytheme_pings'); ?>
    </ul>
<?php } ?>

<!-- COMMENTS -->
<?php if( $comments_cnt > 0 ) { ?>
  <h3>COMMENTS</h3>
    <ul class="comments">
        <?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
    </ul>
    <div class="page-link">
        <?php paginate_comments_links(); ?>
    </div>
<?php } ?>

<?php endif; ?>

<!-- REPLY -->
<?php $args = array(
    'title_reply'  => 'REPLY',
    'label_submit' => __( 'Submit comment', 'minimalflat2' ),
    'fields' => array(
        'author' => '<p><i class="minimalflat2-icon-smiley"></i> <label for="author">' . __( 'Name', 'minimalflat2' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"  placeholder="' . __( 'Name', 'minimalflat' ) . '" size="30" /></p>',

        'email' => '<p><i class="minimalflat2-icon-mail"></i> <label for="email">' . __( 'Email', 'minimalflat2' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" placeholder="' . __( 'Email', 'minimalflat' ) . '" size="30" /></p>',

        'url' => '<p><i class="minimalflat2-icon-earth"></i> <label for="url">' . __( 'Website', 'minimalflat2' ) . '</label>' . '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="' . __( 'Website', 'minimalflat' ) . '" size="60" /></p>'
    ),

    'comment_field' => '<p><i class="minimalflat2-icon-comment"></i> <label for="comment">' . __( 'Comment', 'minimalflat2' ) . ' <span class="required">*</span></label><br /><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',

    'comment_notes_after' => ''
);

comment_form( $args ); ?>

</div>
