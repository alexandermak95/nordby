<?php
$categories = get_categories( array(
    'orderby' => 'post_date',
    'order'   => 'DESC',
    'taxonomy' => 'category',
    'hide_empty'   => 0,
) );
?>

<div class="wrapper" style="background-image:url('<?php the_field('single_page_background','option');?>'); overflow:hidden;">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 content-butiker" id="blogg">
        <div class="content-head">
          <h1 id="single-post-terms"><?php the_terms($post->ID, 'category')?></h1>
          <?php $title = get_the_category($post->ID);?>
          <nav class="navbar navbar-expand-lg" id="butik-cat">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon">VISA ALLT</span>
           </button>
           <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav">
               <span>
               <a class="butik-cat" href="<?php the_field('alla_inlagg', 'option');?>">SENASTE</a>
               </span>
            </ul>
            <?php  $tags = get_tags(array('get'=>'all'));
            foreach ($tags as $tag):
                echo '<ul class="navbar-nav">';
                echo "<span>";
                echo '<a class="butik-cat" href="'. get_term_link($tag).'">'. $tag->name .'</a>';
                echo "</span>";
                echo '</ul>';
            endforeach;
            ?>
            <?php foreach( $categories as $category ) :
              echo '<ul class="navbar-nav">'; ?>
                <span class="span-flex" id="<?php if($category->name == $title[0]->name): echo 'active-cat'; endif; ?>">
                  <?php
                  $category_link = sprintf(
                    '<a class="butik-cat" href="%1$s" alt="%2$s">%3$s </a>',
                    esc_url( get_category_link( $category->term_id ) ),
                    esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
                    esc_html( $category->name )
                  ); ?>
                  <?php echo sprintf( esc_html__( '%s', 'textdomain' ), $category_link );?>
                </span>
              </ul>
            <?php  endforeach;?>
            </div>
          </nav>
        </div>
        <div class="row" style="width: 100%; margin: 0em auto;">
          <?php while(have_posts()) : the_post();?>
            <article class="col-md-12 article">
              <div class="blogg-text">
                <div class="blogg-title">
                  <a href="<?php the_permalink();?>"><h2 id="single-post-title"><?php the_title();?></h2></a>
                </div>
              </div>
              <div class="blogg-bild">
                <?php the_post_thumbnail(); ?>
              </div>
              <div class="blogg-text">
                <div class="blogg-content">
                  <?php the_content();?>
                </div>
                <div class="blogg-meta">
                  <p><span>Puplicerat av:</span> <?php the_author(); echo ' '; the_date('Y-m-d');?></p>
                </div>
                <div class="social">
                  <a class="resp-sharing-button__link" href="https://facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink();?>" target="_blank" rel="noopener" aria-label="">
                    <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/></svg>
                      </div>
                    </div>
                  </a>
                  <a class="resp-sharing-button__link" href="https://twitter.com/intent/tweet/?text=<?php echo get_the_permalink();?>" target="_blank" rel="noopener" aria-label="">
                    <div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z"/></svg>
                      </div>
                    </div>
                  </a>
                  <a class="resp-sharing-button__link" href="https://plus.google.com/share?url=<?php echo get_the_permalink();?>" target="_blank" rel="noopener" aria-label="">
                    <div class="resp-sharing-button resp-sharing-button--google resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.37 12.93c-.73-.52-1.4-1.27-1.4-1.5 0-.43.03-.63.98-1.37 1.23-.97 1.9-2.23 1.9-3.57 0-1.22-.36-2.3-1-3.05h.5c.1 0 .2-.04.28-.1l1.36-.98c.16-.12.23-.34.17-.54-.07-.2-.25-.33-.46-.33H7.6c-.66 0-1.34.12-2 .35-2.23.76-3.78 2.66-3.78 4.6 0 2.76 2.13 4.85 5 4.9-.07.23-.1.45-.1.66 0 .43.1.83.33 1.22h-.08c-2.72 0-5.17 1.34-6.1 3.32-.25.52-.37 1.04-.37 1.56 0 .5.13.98.38 1.44.6 1.04 1.84 1.86 3.55 2.28.87.23 1.82.34 2.8.34.88 0 1.7-.1 2.5-.34 2.4-.7 3.97-2.48 3.97-4.54 0-1.97-.63-3.15-2.33-4.35zm-7.7 4.5c0-1.42 1.8-2.68 3.9-2.68h.05c.45 0 .9.07 1.3.2l.42.28c.96.66 1.6 1.1 1.77 1.8.05.16.07.33.07.5 0 1.8-1.33 2.7-3.96 2.7-1.98 0-3.54-1.23-3.54-2.8zM5.54 3.9c.33-.38.75-.58 1.23-.58h.05c1.35.05 2.64 1.55 2.88 3.35.14 1.02-.08 1.97-.6 2.55-.32.37-.74.56-1.23.56h-.03c-1.32-.04-2.63-1.6-2.87-3.4-.13-1 .08-1.92.58-2.5zM23.5 9.5h-3v-3h-2v3h-3v2h3v3h2v-3h3"/></svg>
                      </div>
                    </div>
                  </a>
                  <a class="resp-sharing-button__link" href="https://www.tumblr.com/widgets/share/tool?posttype=link&amp;title=<?php echo get_the_permalink();?>shareSource=tumblr_share_button" target="_blank" rel="noopener" aria-label="">
                    <div class="resp-sharing-button resp-sharing-button--tumblr resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M13.5.5v5h5v4h-5V15c0 5 3.5 4.4 6 2.8v4.4c-6.7 3.2-12 0-12-4.2V9.5h-3V6.7c1-.3 2.2-.7 3-1.3.5-.5 1-1.2 1.4-2 .3-.7.6-1.7.7-3h3.8z"/></svg>
                      </div>
                    </div>
                  </a>
                  <a class="resp-sharing-button__link" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=http%3A%2F%2Fsharingbuttons.io&amp;title=<?php echo get_the_permalink();?>" target="_blank" rel="noopener" aria-label="">
                    <div class="resp-sharing-button resp-sharing-button--linkedin resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6.5 21.5h-5v-13h5v13zM4 6.5C2.5 6.5 1.5 5.3 1.5 4s1-2.4 2.5-2.4c1.6 0 2.5 1 2.6 2.5 0 1.4-1 2.5-2.6 2.5zm11.5 6c-1 0-2 1-2 2v7h-5v-13h5V10s1.6-1.5 4-1.5c3 0 5 2.2 5 6.3v6.7h-5v-7c0-1-1-2-2-2z"/></svg>
                      </div>
                    </div>
                  </a>
                  <a id="bokmarke"  rel="sidebar" title="bookmark this page"> <i class="fa fa-star"></i> </a>
                </div>
              </div>
            </article>
          <?php endwhile;?>
        </div>
        <?php $args = array('posts_per_page' => 5, 'offset' => 1, 'orderby' => 'date', 'order' => 'ASC');
              $related = new WP_QUERY($args);?>
        <div class="row">
          <div class="col-md-12 related-wrap">
            <div class="related-posts">
              <?php while($related->have_posts()) : $related->the_post();?>
                  <div class="row">
                    <hr>
                    <div class="col-sm-9">
                      <a href="<?php the_permalink();?>"><h2><?php the_title();?></h2></a>
                      <p><?php the_excerpt();?></p>
                      <div class="blogg-meta">
                        <p><span>Puplicerat av:</span> <?php the_author(); echo ' '; the_date('Y-m-d');?></p>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="bild">
                        <?php the_post_thumbnail();?>
                      </div>
                    </div>
                  </div>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 sidebar-bottom">
            <div class="widgets-bottom" style="background:#454545; font-style: italic;">
              <div class="row">
                <?php get_sidebar("main-sidebar-left") ?>
                <?php get_sidebar("main-sidebar-middle") ?>
                <?php get_sidebar("main-sidebar-right") ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br><br><br><br><br>
