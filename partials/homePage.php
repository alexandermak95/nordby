
<section class="container-fluid slideshow hero" style="background-image: url('<?php the_field('hero_background');?>')" data-autoplay="5000" data-singleitem="true" data-items="1">
      <?php if (have_rows('hero_slider')) : while(have_rows('hero_slider')) : the_row();?>
      <div class="slide" style="background-image: url('<?php the_sub_field('background_image');?>')">
        <p><img id="slider-image" src="<?php the_sub_field('image');?>" alt=""></p>
        <p class="slider-text"><?php the_sub_field('text');?></p>
        <?php $herolink = get_sub_field('link'); if(!empty($herolink)) : ?>
        <a href="<?php echo $herolink['url'];?>"><?php echo $herolink['title'];?></a>
        <?php endif; ?>
      </div>
    <?php endwhile;endif; ?>
</section>

<section class="container-fluid home-content">
  <div class="row">
    <div class="col-lg-10 home-content-col" style="background: white; margin: 0 auto;">
      <?php if(have_rows('content')) : while(have_rows('content')) : the_row();?>
      <?php if(get_row_layout() == 'text_puffar') : ?>
        <div class="row text-puff">
          <?php while (have_rows('text_puff')) : the_row();?>
            <?php $blockLink = get_sub_field('link');?>
            <div class="col-sm-6">
              <a href="<?php echo $blockLink['url'];?>">
              <div class="holder" style="background-color: <?php the_sub_field('background_color');?>;cursor: pointer;">
                <h2><?php the_sub_field('title');?></h2>
                <hr>
                <p><?php the_sub_field('undertext');?></p>
              </div>
              </a>
            </div>
          <?php endwhile; ?>
        </div>
      <?php elseif (get_row_layout() == 'kompletterande_text_med_lankar') : ?>
        <div class="row">
          <div class="col-md-6 kompl">
            <h2><?php the_sub_field('title');?></h2>
            <p><?php the_sub_field('undertext');?></p>
            <?php if (have_rows('links')) : ?>
            <ul>
              <?php while (have_rows('links')) : the_row();?>
                <?php $komplink = get_sub_field('link'); if(!empty($komplink)) : ?>
                <li><a href="<?php echo $komplink['url'];?>"><?php echo $komplink['title'];?></a></li>
                <?php endif; ?>
              <?php endwhile; endif;?>
            </ul>

          </div>
        </div>
      <?php elseif (get_row_layout() == 'bild_puffar') : ?>
        <div class="row">
          <?php while (have_rows('bild_puff')) : the_row();?>
          <div class="col-sm-6">
            <a href="<?php the_sub_field('link');?>">
              <div class="holder-img" style="background-image: url('<?php the_sub_field('image');?>');"></div>
            </a>
          </div>
        <?php endwhile; ?>
        </div>
      <?php elseif (get_row_layout() == 'bildspel') : ?>
        <div class="row" id="hover-row">
          <div id="hover-btn" class="col-md-10" style="margin: 0 auto;">
            <div class="slider slideshow" data-autoplay="8000" data-singleitem="true" data-items="1">
              <?php while (have_rows('slide')) : the_row();?>
                <a  href="<?php the_sub_field('link');?>">
                  <div class="slide" style="background-image: url('<?php the_sub_field('image');?>')"></div>
                </a>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
      <?php endwhile; endif;?>
    </div>
  </div>
</section>
