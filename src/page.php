<?php get_header(); ?>
  <div class="content">
    <div class="main-single">
<?php if( have_posts() ) :
while( have_posts() ) : the_post(); ?>
      <article class="post post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="header">
            <h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <div class="meta">
                <span class="value"><i class="minimalflat2-icon-clock"></i> <a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
                <span class="value"><i class="minimalflat2-icon-comment"></i> <?php comments_popup_link( '0','1','%','','-' ); ?></span>
                <span class="value"><?php edit_post_link( __( 'Edit', 'minimalflat2' ), '<i class="minimalflat2-icon-write"></i> ', '' ); ?></span>
            </div>
        </div>
<?php the_content(); ?>
<?php comments_template(); ?>
      </article>
<?php endwhile;
else : ?>
      <article class="post">
        <h2><?php __( 'Page not found', 'minimalflat2' ); ?></h2>
        <p><?php __( 'Pages you are looking for was not found.', 'minimalflat2' ); ?></p>
      </article>
<?php endif; ?>
    </div><!-- /main -->
  </div><!-- /content -->
  <div class="clarfix"></div>
<?php get_footer(); ?>