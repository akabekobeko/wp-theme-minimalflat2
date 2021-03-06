<?php get_header(); ?>
  <div class="page__content">
    <div class="page__content__main-single">
<?php if( have_posts() ) :
while( have_posts() ) : the_post(); ?>
      <article class="page__content__post post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="page__content__post__header">
            <h1 class="page__content__post__header__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <div class="page__content__post__header__meta">
                <span class="value"><i class="minimalflat2-icon-clock"></i> <a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
                <span class="value"><i class="minimalflat2-icon-comment"></i> <?php comments_popup_link( '0','1','%','','-' ); ?></span>
                <span class="value"><i class="minimalflat2-icon-category"></i> <?php the_category( ', ' ); ?></span>
                <span class="value"><i class="minimalflat2-icon-tag"></i> <?php the_tags( '', ', ' ); ?></span>
                <span class="value"><?php edit_post_link( __( 'Edit', 'minimalflat2' ), '<i class="minimalflat2-icon-write"></i> ', '' ); ?></span>
            </div>
        </div>

<?php the_post_thumbnail(); ?>
<?php the_content(); ?>
<?php
  $args = array( 'before' => '<div class="page-link">', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' );
  wp_link_pages( $args );
?>
      <nav class="page__content__location">
        <div class="to prev"><?php previous_post_link( '%link', '<i class="minimalflat2-icon-arrow-left"></i> %title'); ?></div>
        <div class="to next"><?php next_post_link( '%link', '%title <i class="minimalflat2-icon-arrow-right"></i>'); ?></div>
        <div class="clarfix"></div>
      </nav>
<?php comments_template(); ?>
      </article>
<?php endwhile;
else : ?>
      <article class="page__content__post">
        <h2><?php __( 'Posts not found', 'minimalflat2' ); ?></h2>
        <p><?php __( 'Posts you are looking for was not found.', 'minimalflat2' ); ?></p>
      </article>
<?php endif; ?>
    </div><!-- /main -->
  </div><!-- /content -->
  <div class="clarfix"></div>
<?php get_footer(); ?>
