  <?php  foreach( $posts as $post):  $i++; endforeach; echo '<p>'; echo $i; echo " erbjudanden</p>";?>



<?php while($stores->have_posts()) : $stores->the_post();?>
<div class="ss">
  <?php the_title();?>
  <?php

$posts = get_field('deals');

if( $posts ): ?>
    <ul>
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
        <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </li>
    <?php endforeach; ?>
    </ul>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
</div>
<?php endwhile; ?>







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






<?php if(get_row_layout() == 'side_banners-large') : ?>

    <div class="row">
      <?php while(have_rows('banner_4x4')) : the_row();?>
        <div class="col-md-12 large-banner">
          <a href="<?php the_sub_field('link');?>"> <img src="<?php the_sub_field('image');?>" alt=""> </a>
        </div>
      <?php endwhile; ?>
    </div>
  <?php elseif(get_row_layout() == 'side_banners-small') : ?>
    <div class="row">
      <?php while(have_rows('banner_2x2')) : the_row();?>
        <div class="col-md-6 small-banner">
          <a href="<?php the_sub_field('link');?>"> <img src="<?php the_sub_field('image');?>" alt=""> </a>
        </div>
      <?php endwhile; ?>
    </div>
  <?php elseif(get_row_layout() == 'side_banners-wide') : ?>
    <div class="row">
      <?php while(have_rows('banner_4x3')) : the_row();?>
        <div class="col-md-12 wide-banner">
          <a href="<?php the_sub_field('link');?>"> <img src="<?php the_sub_field('image');?>" alt=""> </a>
        </div>
      <?php endwhile; ?>
    </div>
  <?php endif; ?>

</div>
</div>







<div class="col-md-6 butik-letter">
  <div class="butik-info">
    <div class="info-col">
      <?php if($letter != strtoupper(get_the_title()[0])) : echo ($letter != '') ? '</ul></div>' : ''; ?><?php endif; ?>
      <div class="butik-name">
        <a href="<?php the_permalink();?>"><h5><?php echo strtoupper( get_the_title()[0]);?></h5></a>
      </div>
      <div class="butik-tel">
        <span><?php the_field('telefonnummer');?></span>
      </div>

    </div>
  </div>
