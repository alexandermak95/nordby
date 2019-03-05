<?php
get_header();
$args = array('post_type' => 'butiker');
$shops = new WP_QUERY($args);
 ?>
 <div class="wrapper" style="background-image:url('<?php the_field('single_page_background','option');?>')">
   <div class="container">
     <div class="row">
       <div class="col-lg-12 content-butiker">
         <div class="row">
           <section class="col-md-10 slideshow" id="single-butik" data-singleitem="true" data-items="1">
             <!-- Hämtar samma posts för alla inlägg -->
           <!-- <?php while ($shops->have_posts()): $shops->the_post();?>
             <?php if(have_rows('slider')) : while(have_rows('slider')) : the_row(); ?>
               <div class="slide single-butik-slide" style="background-image:url('<?php the_sub_field('image');?>')">

               </div>
             <?php endwhile;endif; ?>
           <?php endwhile; ?> -->
          </section>
         </div>
       </div>
     </div>
   </div>
 </div>
<?php get_footer();?>
