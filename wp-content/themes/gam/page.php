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
                <?php the_post_thumbnail(); ?>
              </div>
            </div>
              <?php
            }
            ?>
        <div class='row'>
          <div class='post col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1'>
            <div class='body'>
              <?php the_content(); ?>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  <?php get_footer(); ?>
  </main>
