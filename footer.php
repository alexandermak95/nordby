  <?php if(!is_front_page()): ?>
    <div class="container-fluid fixed-bottom">
      <div class="row">
        <div class="col-sm-12 mobile-nav">
          <ul>
            <?php while(have_rows('footer_nav_mobile', 'option')) : the_row(); ?>
              <?php $link = get_sub_field('link_to_page');?>
              <li><a href="<?php echo $link['url'];?>"><img src="<?php the_sub_field('icon');?>" alt=""><span><?php echo $link['title'];?></span></a></li>
            <?php endwhile; ?>
          </ul>
        </div>
      </div>
    </div>
  <?php endif; ?>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <p class="footer-head"><?php the_field('headline', 'option');?></p>
            <?php the_field('undertext', 'option');?>
            <?php if(have_rows('links', 'option')) :  ?>
            <ul>
              <?php while (have_rows('links', 'option')) : the_row(); ?>
                <?php $link = get_sub_field('link');?>
                <li><a href="<?php echo $link['url'] ?>"> <img src="<?php the_sub_field('link_imageicon');?>" alt=""> </a></li>
                <?php endwhile; ?>
            </ul>
           <?php endif; ?>
          </div>
        </div>
      </div>
     </footer>
    </div>
   <script  defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAek2X6YRcS4XJ1SalmKH7YsKda63eMau0&callback=initMap"></script>
  </body>
  <?php wp_footer();?>
</html>
