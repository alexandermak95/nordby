<?php
/* Template Name: Katergorier */
get_header();
 ?>

 <?php while(have_posts()) : the_post(); ?>
   <?php get_template_part('partials/shops'); ?>
 <?php endwhile; ?>
<?php get_footer();?>
