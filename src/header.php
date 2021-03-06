<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <?php if( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="page">
  <header class="page__header">
    <nav class="page__header__menu">
      <?php wp_nav_menu( array ( 'theme_location' => 'header-navi' ) ); ?>
      <div class="clarfix"></div>
    </nav>
    <h1 class="page__header__title"><a href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
    <h2 class="page__header__subtitle"><?php bloginfo( 'description' ); ?></h2>
  </header>
