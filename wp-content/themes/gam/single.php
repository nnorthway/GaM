<?php
/*
Template Name: Default
*/
get_header(); ?>
  <main <?php body_class("col-sm-9 col-sm-offset-3"); ?>>
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php if (has_post_thumbnail()) {
              ?>
              <div class='thumbnail'>
                <img src='<?php  ?>' />
              </div>
            </div>
              <?php
            }
            ?>
        <div class='row'>
          <div class='post col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
            <div class='head'>
              <h2>
                <a href='<?php the_permalink(); ?>'>
                  <?php the_title(); ?>
                </a>
              </h2>
              <small class='meta'>
                <span class='date'><i class='material-icons'>today</i> <?php the_date(); ?></span>
                <span class='cat'> | <i class='material-icons'>folder</i> <?php
                $cats = get_the_category();
                if (!empty($cats)) {
                  echo '<a href="' . esc_url(get_category_link($cats[0]->term_id)) . '">' . esc_html($cats[0]->name) . '</a>';
                }
                ?></span>
              </small>
              <?php
              if (has_post_thumbnail()) :
                ?>
                <div class='post-thumb'>
                  <img src='<?php the_post_thumbnail_url(); ?>' />
                </div>
                <?php
              endif;
              ?>
              <?php if (get_field_objects()) : ?>
                <div class='social'>
                  <?php
                  if (get_field('itunes')) {
                    ?><a href='<?php echo get_field('itunes'); ?>' target='_blank'><i class='socicon-itunes'></i></a><?php
                  }
                  if (get_field('soundcloud')) {
                    ?><a href='<?php echo get_field('soundcloud'); ?>' target='_blank'><i class='socicon-soundcloud'></i></a><?php
                  }
                  if (get_field('youtube')) {
                    ?><a href='<?php echo get_field('youtube'); ?>' target='_blank'><i class='socicon-youtube'></i></a><?php
                  }
                  if (get_field('stitcher')) {
                    ?><a href='<?php echo get_field('stitcher'); ?>' target='_blank'><img id='stitcher_icon' class='img-icon' src='<?php echo get_template_directory_uri(); ?>/assets/images/stitcher.png' /></a><?php
                  }
                  if (get_field('podomatic')) {
                    ?><a href='<?php echo get_field('podomatic'); ?>' target='_blank'><img id='pod_icon' class='img-icon' src='<?php echo get_template_directory_uri(); ?>/assets/images/podomatic.png' /></a><?php
                  }
                  if (get_field('tunein')) {
                    ?><a href='<?php echo get_field('tunein'); ?>' target='_blank'><img id='tunein_icon' class='img-icon' src='<?php echo get_template_directory_uri(); ?>/assets/images/tunein.png' /></a><?php
                  }
                  ?>
                </div>
              <?php endif; ?>
            </div>
            <div class='body'>
              <?php the_content(); ?>
            </div>
            <div class='foot'>

            </div>
            <?php
              comments_template();
            ?>
          </div>
        </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  <?php get_footer(); ?>
  </main>
