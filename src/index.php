<?php get_header(); ?>
  <div class="content">
    <div class="main">
<?php if( have_posts() ) :
while( have_posts() ) : the_post(); ?>
      <article class="post post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="header">
            <h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <div class="meta">
                <span class="value"><i class="minimalflat2-icon-clock"></i> <a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
                <span class="value"><i class="minimalflat2-icon-comment"></i> <?php comments_popup_link( '0','1','%','','-' ); ?></span>
                <span class="value"><i class="minimalflat2-icon-category"></i> <?php the_category( ', ' ); ?></span>
                <span class="value"><i class="minimalflat2-icon-tag"></i> <?php the_tags( '', ', ' ); ?></span>
            </div>
        </div>
<?php the_content( __( '(more...)', 'minimalflat2' ) ); ?>
      </article>
<?php endwhile;
else : ?>
      <article class="post">
        <h2><?php __( 'No posts found', 'minimalflat2' ); ?></h2>
        <p><?php __( 'Posts you are looking for was not found.', 'minimalflat2' ); ?></p>
      </article>
<?php endif; ?>
      <nav class="location">
        <div class="to prev"><?php previous_posts_link( '<i class="minimalflat2-icon-arrow-left"></i> PREV' ); ?></div>
        <div class="to next"><?php next_posts_link( 'NEXT <i class="minimalflat2-icon-arrow-right"></i>' ); ?></div>
        <div class="clarfix"></div>
      </nav>
    </div><!-- /main -->
<?php get_sidebar(); ?>
  </div><!-- /content -->
  <div class="clarfix"></div>
<?php get_footer(); ?>