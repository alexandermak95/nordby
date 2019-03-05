<header>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php the_field('logo','option');?>" alt=""></a>
      </div>
      <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
        <div class="logo-text">
          <?php the_field('site_headline','option');?>
        </div>
      </div>
      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <div class="menu-button">
          Meny
          <i class="fa fa-bars"></i>
        </div>
      </div>
    </div>
  </div>
</header>


$args = array(
  'post_type' => 'butiker',
  'tax_query' => array(array(
   'taxonomy' => 'kategorier',
   'field' => 'term_id',
   'terms' => $category->cat_ID,
 ),
)
);
$shop = new WP_QUERY($args);
