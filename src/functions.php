<?php

load_theme_textdomain( 'minimalflat2', get_template_directory() . '/languages' );

// Require: Content width
if( ! isset( $content_width ) ) { $content_width = 640; }

// Reccomended: Feed
add_theme_support( 'automatic-feed-links' );

// Reccomended: Post thumbnail
add_theme_support( 'post-thumbnails' );

// Reccomended: Editor style
add_editor_style( 'editor_style.css' );

// Reccomended: Sidebar
function mytheme_register_sidebar()
{
    register_sidebar( array( 'name'          => __( 'Sidebar', 'minimalflat2' ),
                             'id'            => 'sidebar-1',
                             'description'   => __( 'Sidebar area', 'minimalflat2' ),
                             'before_widget' => '<div id="%1$s" class="widget %2$s">',
                             'after_widget'  => '</div>' )
    );
}
add_action( 'widgets_init', 'mytheme_register_sidebar' );

// Reccomended: Custom background
add_theme_support( 'custom-background', array( 'default-color' => 'ffffff' ) );

// Reccomended: Custom header
add_theme_support( 'custom-header', array( 'width' => 32, 'height' => 32,'header-text' => false ) );

/**
 * Load theme stylesheets.
 */
function mytheme_stylesheets()
{
    wp_enqueue_style( 'minimalflat-style', get_stylesheet_uri() );
}
add_action( 'wp_print_styles', 'mytheme_stylesheets' );

/**
 * Get the comments of the article.
 *
 * @return comments.
 */
function get_comment_only_number()
{
    global $wpdb, $tablecomments, $post;
    $comments = $wpdb->get_results( "SELECT * FROM $wpdb->comments WHERE comment_post_ID = $post->ID AND comment_type NOT REGEXP '^(trackback|pingback)$' AND comment_approved = '1'" );

    return count( $comments );
}

/**
 * Output the pin-backs to the article.
 *
 * @param $comment Comment.
 * @param $args    Default args.
 * @param $depth   Defaukt depth.
 */
function mytheme_pings( $comment, $args, $depth )
{
    $GLOBALS['comment'] = $comment; ?>
    <li><i class="icon-link"></i> <?php echo comment_date(); ?> : <?php comment_author_link(); ?>
<?php }

/**
 * Output the comment to the article.
 *
 * @param $comment Comment.
 * @param $args    Default args.
 * @param $depth   Defaukt depth.
 */
function mytheme_comment( $comment, $args, $depth )
{
    $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
  <div class="meta">
    <?php echo get_avatar( $comment, 44 ); ?>
    <div class="name"><?php printf( '<cite class="fn">%s</cite>', get_comment_author_link()) ?></div>
    <div class="date">
      <i class="icon-clock"></i> <?php printf( '%1$s', get_comment_date() . ' ' . get_comment_time() ) ?><?php edit_comment_link( ' <i class="icon-write"></i>' . __( 'Edit', 'minimalflat2' ), '  ', '' ) ?>
      <?php comment_reply_link( array_merge( $args, array( 'reply_text' => ' <i class="icon-comment"></i>' . __( 'Reply', 'minimalflat2' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
    </div>
  </div>
  <div class="body">
    <?php if( $comment->comment_approved == '0') : ?>
    <p class="wait"><?php _e( 'Pending', 'minimalflat2' ) ?></p>
    <?php endif; ?>
    <?php comment_text() ?>
  </div>
</li>
<?php }

/**
 * Customize the tag-cloud.
 *
 * @param $args Default settings.
 *
 * @return New settings.
 */
function mytheme_widget_tag_cloud_args( $args )
{
    $args = array(
        'unit'     => 'em',
        'number'   => 20,
        'smallest' => 0.8,
        'largest'  => 0.8
    );

    return $args;
}
add_filter( 'widget_tag_cloud_args', 'mytheme_widget_tag_cloud_args');

?>