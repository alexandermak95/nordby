<?php
get_header();
 ?>
 <div class="wrapper" style="background-image:url('<?php the_field('single_page_background','option');?>')">
   <div class="container">
     <div class="row">
       <div class="col-lg-12 content-butiker">
         <?php while(have_posts()) : the_post(); the_content(); endwhile;?>
       </div>
     </div>
   </div>
 </div>
<?php get_footer();?>
