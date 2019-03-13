<?php /* Template Name: Deals */
get_header();
$args1 = array('post_type' => 'butiker', 'posts_per_page'=>99999);
$args2 = array('post_type' => 'deals','posts_per_page'=>99999);

$stores = new WP_QUERY($args1);
$deals = new WP_QUERY($args2);
 ?>

 <?php
 $categories = get_categories( array(
     'orderby' => 'post_date',
     'order'   => 'DESC',
     'taxonomy' => 'deals-kategorier',
     'hide_empty'   => 0,
 ) );
 ?>
 <div class="wrapper" style="background-image:url('<?php the_post_thumbnail_url();?>'); background-color:#eee;">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 content-butiker" id="butiker-tax">
        <div class="head-tax">
          <h1><?php the_title();?></h1>
          <?php get_search_form();?>
           <nav class="navbar navbar-expand-lg" id="butik-cat">
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon">VISA ALLT</span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <a id="active-single" class="butik-cat"href="<?php the_permalink();?>">Visa alla</a>
             </ul>
             <?php foreach( $categories as $category ) :
              echo '<ul class="navbar-nav">';
              $category_link = sprintf(
                '<a class="butik-cat" href="%1$s" alt="%2$s">%3$s </a>',
                esc_url( get_category_link( $category->term_id ) ),
                esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
                esc_html( $category->name )
              ); ?>
              <?php echo sprintf( esc_html__( '%s', 'textdomain' ), $category_link );?>
             </ul>
            <?php  endforeach;?>
           </div>
          </nav>
        </div>
        <div class="row">
          <div class="col-md-12" style="background:#eee;">
            <div class="row">
              <?php while($stores->have_posts()) : $stores->the_post();?>
                <?php $posts = get_field('deals'); if( $posts ): $i = 0; ?>
                <div id="deal-hover" class="col-sm-2 deal-con">
                  <a>
                    <div class="deal-holder">
                      <?php $logo = get_field('logo'); $dealCover = get_field('deals_cover');?>
                      <div class="tile-img">
                        <img src="<?php the_field('image','option');?>" alt="">
                      </div>
                      <div class="cover">
                          <img id="deals-cover" src="<?php echo $dealCover;?>" alt="">
                      </div>
                      <div class="text">
                        <p><?php if(!empty($count)) : echo $count; endif; echo " erbjudanden" ?></p>
                        <p>KLICKA HÄR</p>
                      </div>
                      <img id="deals-logo" src="<?php echo $logo; ?>" alt="">
                      <?php $postsdiv = get_field('deals');
                      if( $postsdiv): $i= 0; ?>
                      <div id="deal">
                          <ul class="row">
                          <?php foreach( $postsdiv as $post): $i++;?>
                              <?php setup_postdata($post); ?>
                              <li class="col-sm-2">
                                  <div class="deal-holder">
                                    <?php the_post_thumbnail();?>
                                    <p><?php the_title();?></p>
                                  </div>
                              </li>
                              <?php $count = $i; ?>
                          <?php endforeach; ?>
                          </ul>

                      </div>
                    <?php endif; ?>
                     <?php wp_reset_postdata(); ?>
                    </div>
                  </a>
                </div>
              <?php endif;endwhile; ?>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div id="content-deal">
                  <?php while($stores->have_posts()) : $stores->the_post();?>
                    <div class="row">
                      <div class="col-md-9">

                      </div>
                    </div>

               <?php endwhile;?>
                </div>
              </div>
            </div>
           </div>
          </div>
        </div>
       <br><br><br>
      </div>
    </div>
  </div>
 </div>
 <br><br><br><br><br>

 <?php get_footer();?>
