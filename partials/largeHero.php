<!DOCTYPE html>
<html lang="en" dir="ltr" id="html">
  <?php wp_head();?>
  <div class="container-fluid" style="background:#F2F2F2;">
    <div class="row">
      <div class="col-lg-12 hero-large">
        <a <?php if(!empty(get_field('hero_link'))) :?>href="<?php the_field('hero_link');?>" <?php endif; ?>>
          <img src="<?php the_post_thumbnail_url()?>" alt="">
        </a>
      </div>
    </div>
    <div class="row mobile-hide">
      <div class="col-lg-12 hero-large-menu" style="background:#333333;">
        <?php wp_nav_menu(array('theme_location' => 'menu for large hero template'));?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 hero-large-content">
        <div class="row">
          <div class="col-md-8 articles">
            <?php while (have_rows('content')) : the_row();?>
          <?php if(get_row_layout() == 'articles_block') : ?>
            <?php while(have_rows( 'articles')) : the_row();?>
            <div class="row">
              <div class="col-md-12 article-block">
                <?php the_sub_field('article');?>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; endwhile;?>
          </div>
          <div class="col-md-4 banners">
            <?php while (have_rows('content')) : the_row();?>
            <?php if(get_row_layout() == 'side_banners-large') : ?>
            <div class="row">
              <?php while(have_rows('banner_4x4')) : the_row();?>
                <div class="col-md-12 large-banner">
                  <a href="<?php the_sub_field('link');?>"> <img src="<?php the_sub_field('image');?>" alt=""> </a>
                </div>
              <?php endwhile; ?>
            </div>
          <?php elseif(get_row_layout() == 'side_banners_small') : ?>
            <div class="row">
              <?php while(have_rows('banner_2x2')) : the_row();?>
                <div class="col-xs-6 small-banner col-sm-6">
                  <a href="<?php the_sub_field('link');?>"> <img src="<?php the_sub_field('image');?>" alt=""> </a>
                </div>
              <?php endwhile; ?>
            </div>
          <?php elseif(get_row_layout() == 'side_banners_wide') : ?>
            <div class="row">
              <?php while(have_rows('banner_4x3')) : the_row();?>
                <div class="col-md-12 wide-banner">
                  <a href="<?php the_sub_field('link');?>"> <img src="<?php the_sub_field('image');?>" alt=""> </a>
                </div>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
        <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</html>
