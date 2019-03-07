<div class="wrapper" style="background-image:url('<?php the_field('single_page_background','option');?>');">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 content-butiker">
        <div class="row">
          <section class="col-md-10" style="margin:0 auto;">
            <span id="hoverover">
              <div class="slideshow" id="single-butik" data-singleitem="true" data-items="1">
                <?php while (have_posts()): the_post();?>
                  <?php if(have_rows('slider')) : while(have_rows('slider')) : the_row(); ?>
                    <div class="slide">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="content-slider" style="background-image:url('<?php the_sub_field('image');?>');">
                            <div class="content-slider-text">
                              <?php if(!empty(get_sub_field('subtitle')) || !empty(get_sub_field('title')) ) : ?>
                                <h2><?php the_sub_field('title');?></h2>
                                <p><?php the_sub_field('subtitle');?></p>
                              <?php else: ?>
                              <h2><?php the_title();?></h2>
                            <?php endif; ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endwhile;endif; ?>
                <?php endwhile; ?>
              </div>
            </span>
          </section>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row" style="min-height:150px;background:rgba(255, 255, 255, 0.9)">
      <div class="col-md-12 meta-wrap">
        <div class="row margin-6">
          <?php if(!empty(get_field('logo'))) : ?>
          <div class="col-md-4">
            <img src="<?php the_field('logo');?>" alt="">
          </div>
        <?php endif; ?>
        <?php if(!empty(get_field('oppettider'))) : ?>
          <div class="col-md-2">
            <b>ÖPPETTIDER</b>
            <p><?php the_field('oppettider');?></p>
          </div>
           <?php endif; ?>
          <?php if(!empty(get_field('telefonnummer')) || !empty(get_field('kontakt'))) : ?>
          <div class="col-md-2">
            <b>KONTAKT</b><br>
            <?php if(have_rows('kontakt')) : while(have_rows('kontakt')) : the_row(); ?>
              <p><?php the_sub_field('tel');?></p>
              <a href="mailto:<?php the_sub_field('e-postadress');?>">Skicka e-post</a>
            <?php endwhile; else: ?>
            <p><?php the_field('telefonnummer');?></p>
          <?php endif; ?>
          </div>
           <?php endif; ?>
          <?php if(!empty(get_the_content()) || !empty(get_field('lank_till_butikens_hemsida'))) : ?>
          <div class="col-md-2">
            <b>OM BUTIKEN</b><br>
            <?php if(has_excerpt()) : the_excerpt(); else: the_content(); endif;?>
             <?php if(!empty(get_field('lank_till_butikens_hemsida'))) : ?>
              <a href="<?php the_field('lank_till_butikens_hemsida') ?>">Besök hemsidan</a>
            <?php endif; ?>
          </div>
           <?php endif; ?>
          <?php if(!empty(get_the_terms($post->ID, 'kategorier'))) : ?>
          <div class="col-md-2">
            <b>KATEGORIER</b><br>
            <p><?php the_terms($post->ID, 'kategorier');?></p>
          </div>
           <?php endif; ?>
        </div>
        <div class="row">
          <div id="tom">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br><br><br><br><br><br>
