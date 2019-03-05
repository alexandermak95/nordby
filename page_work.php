<?php
/* Template Name: Jobba hos oss */
$args = array('post_type' => 'jobb', 'posts_per_page' => 20);
$job = new WP_QUERY($args);
get_header();
 ?>
 <div class="wrapper" style="background-image:url('<?php the_field('single_page_background','option');?>')">
   <div id="center" class="container">
     <div class="row">
       <div class="col-lg-12 content-butiker">
         <div class="content-head">
         <?php while(have_posts()) : the_post();?>
           <h2 style="margin-bottom:1.5em;color:#666;font-weight:700;">Om Nordby</h2>
           <?php if(have_rows('lankgrupp', 'option')) : ?>
             <div id="butik-cat">
            <?php while(have_rows('lankgrupp', 'option')) : the_row();?>
              <?php $link = get_sub_field('lank');?>
              <span class="cat-span">
                <a class="butik-cat <?php if($link['title'] == get_the_title()) : echo 'active-cat'; endif; ?>" href="<?php echo $link['url']; ?>"><?php echo $link['title'];?></a>
              </span>
           <?php endwhile;endif; ?>
            </div>
         <?php endwhile; ?>
         </div>
         <?php if(!empty(get_the_content()) || !empty(get_the_post_thumbnail())) : ?>
         <div class="content-main">
           <div class="row">
             <div class="col-lg-10">
               <?php if (!empty(get_the_post_thumbnail())): ?>
                 <div class="main-thumbnail">
                   <?php the_post_thumbnail();?>
                 </div>
                 <br>
               <?php endif; ?>
               <div class="content-block">
                 <?php the_content();?>
               </div>
               <br>
             </div>
           </div>
         </div>
       <?php endif; ?>
         <div class="content-extra">
           <div class="row">
             <div class="col-lg-10 content-head-holder" style="background-color:<?php the_field('container_color');?>">
               <?php while(have_rows('tillagg')) : the_row(); ?>
                 <?php if (get_row_layout() == 'textblock') : ?>
                   <div class="content-block" style="background:<?php the_sub_field('background_color');?>;margin-top:<?php the_sub_field('margin_top');?>px; padding:10px <?php the_sub_field('padding');?>%">
                     <?php the_sub_field('block'); ?>
                   </div>
                   <br>
                 <?php elseif(get_row_layout() == 'karta') :?>
                   <?php
                   $location = get_sub_field('en_karta');
                   ?>
                   <div id="map" class="acf-map">
                    <p class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></p>
                   </div>
                 <?php elseif(get_row_layout() == 'text_block_two_columns') : ?>
                   <div class="two-columns" style="padding:0 <?php the_sub_field('padding');?>%">
                     <?php if(!empty(get_sub_field('headline'))) :  ?>
                       <h1><?php the_sub_field('headline'); ?></h1>
                     <?php endif; ?>
                     <div class="row">
                       <div class="col-sm-6 left">
                         <?php the_sub_field('left_column') ?>
                       </div>
                       <div class="col-sm-6 right">
                          <?php the_sub_field('right_column') ?>
                       </div>
                     </div>
                   </div>
                 <?php elseif(get_row_layout() == 'karta_360') :  ?>
                   <?php $street = get_sub_field('en_360_karta');?>
                   <div class="street-wrap">
                     <h4><?php the_sub_field('title'); ?></h4>
                     <p style="margin:0;"><?php the_sub_field('underline');?></p>
                     <div class="acf-street-view" id="street-view">
                       <p class="marker-street" data-lat="<?php echo $street['lat']; ?>" data-lng="<?php echo $street['lng']; ?>"></p>
                     </div>
                   </div>
                 <?php endif; ?>
               <?php endwhile; ?>
               <div class="row">
                 <div class="col-md-9 jobs">
                   <?php while($job->have_posts()) : $job->the_post(); ?>
                     <?php the_content();?>
                   <?php endwhile; ?>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <?php get_footer();?>
