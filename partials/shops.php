<?php
$args = array('post_type' => 'butiker', 'posts_per_page' => 9999);
$shops = new WP_QUERY($args);
 ?>
 <?php
 $categories = get_categories( array(
     'orderby' => 'post_date',
     'order'   => 'DESC',
     'taxonomy' => 'kategorier',
     'hide_empty'   => 0,
 ) );
 ?>


<div class="wrapper" style="background-image:url('<?php the_post_thumbnail_url();?>');">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 content-butiker">
        <h1><?php the_title();?></h1>
        <?php get_search_form();?>
        <div id="butik-cat">
          <span id="active-cat" style="margin-right: -6px;">
            <a class="butik-cat"href="<?php the_permalink();?>">Alla butiker</a>
          </span>
        <?php foreach( $categories as $category ) :
            $category_link = sprintf(
              '<a class="butik-cat" href="%1$s" alt="%2$s">%3$s </a>',
              esc_url( get_category_link( $category->term_id ) ),
              esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
              esc_html( $category->name )
            ); ?>

            <?php echo sprintf( esc_html__( '%s', 'textdomain' ), $category_link );?>
            <?php  endforeach;?>
        </div>
        <hr style="width:80%;">
        <div class="row" style="width: 80%; margin: 0em auto;">
          <?php while($shops->have_posts()) : $shops->the_post();?>
            <div class="col-md-6 butik-letter">
              <div class="butik-info">
                <div class="info-col">
                  <div class="butik-name">
                    <a href="<?php the_permalink();?>"><h5><?php the_title();?></h5></a>
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
