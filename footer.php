
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
