<!DOCTYPE html>
<html lang="sv" dir="ltr" id="html">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php wp_title();?></title>
  </head>
  <?php wp_head(); ?>
  <body id="body" <?php body_class(); ?>>
    <header class="sticky-top">
      <nav class="navbar">
        <div class="logo">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php the_field('logo','option');?>" alt=""></a>
        </div>
        <div class="logo-text">
          <?php the_field('site_headline','option');?>
        </div>
        <div class="menu-button" onclick="openNav()" style="cursor:pointer">
          <span>MENY</span>
          <i class="fa fa-bars"></i>
        </div>
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <?php wp_nav_menu(array('theme_location' => 'sidebar')) ?>
          <?php get_search_form();?>
          <p class="sidebar-text">Följ oss på:</p>
          <ul id="sidesocial">
            <?php while (have_rows('links', 'option')) : the_row(); ?>
              <?php $link = get_sub_field('link');?>
              <li><a href="<?php echo $link['url'] ?>"> <img src="<?php the_sub_field('link_imageicon');?>" alt=""> </a></li>
            <?php endwhile; ?>
          </ul>
        </div>
      </nav>
    </header>
    <div id="main" style="background-color:#F2F2F2;">
