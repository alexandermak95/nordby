<?php
get_header();
 ?>
  <?php
  $categories = get_categories( array(
      'orderby' => 'title',
      'order'   => 'DESC',
      'taxonomy' => 'kategorier',
      'hide_empty'   => 0,
  ) );
  ?>
   <div class="wrapper" style="background-image:url('<?php the_field('single_page_background','option');?>')">
     <div class="container">
       <div class="row">
         <div class="col-lg-12 content-butiker" id="butiker-tax">
           <div class="head-tax">
           <h1><?php single_cat_title();?></h1>
           <?php $title = single_cat_title('', false);?>
           <?php get_search_form();?>
             <nav class="navbar navbar-expand-lg" id="butik-cat">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">VISA ALLT</span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <a  class="butik-cat"href="<?php the_field('alla_butiker_lank', 'option'); ?>">Alla butiker</a>
               </ul>
             <?php foreach( $categories as $category ) :
                 ?>
                <span class="span-flex" id="<?php if($category->name == $title): echo 'active-cat'; endif; ?>">
                  <ul class="navbar-nav">
                  <?php  $category_link = sprintf(
                     '<a class="butik-cat"  href="%1$s" alt="%2$s">%3$s </a>',
                     esc_url( get_category_link( $category->term_id ) ),
                     esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
                     esc_html( $category->name )
                   ); ?>
                   <?php echo sprintf( esc_html__( '%s', 'textdomain' ), $category_link );?>
                  </ul>
                 </span>
                 <?php  endforeach;?>
             </nav>
           </div>
           <hr>
           <div class="row" style="width: 80%; margin: 0em auto;">
             <?php while(have_posts()) : the_post();?>
               <div class="col-md-6">
                 <div class="butik-info">
                   <div class="info-col">
                     <div class="butik-name">
                       <a href="<?php the_permalink();?>"><h5><?php echo the_title();?></h5></a>
                     </div>
                     <div class="butik-tel">
                       <span><?php the_field('telefonnummer');?></span>
                     </div>
                   </div>
                 </div>
               </div>
             <?php endwhile; wp_reset_postdata();?>
           </div>
          <br><br><br>
         </div>
       </div>
     </div>
   </div>
   <br><br><br><br><br>
<?php get_footer();?>
