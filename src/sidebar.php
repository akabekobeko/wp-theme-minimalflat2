    <div class="page__content__sidebar">
<?php if( is_active_sidebar( 'sidebar-1' ) ) :
  dynamic_sidebar( 'sidebar-1' );
else: ?>
        <div class="widget"><h2>NO WIDGET</h2>
          <p>Widget is not set.</p>
        </div>
<?php endif; ?>
    </div><!-- /sidebar -->
