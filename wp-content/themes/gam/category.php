<?php
/*
Template Name: Default
*/
get_header(); ?>
  <main class='col-sm-9 col-sm-offset-3'>
    <div class='row'>
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class='col-sm-8 col-xs-10 col-xs-offset-1 col-sm-offset-2'>
        <div class='post box'>
          <div class='head'>
            <h2>
              <a href='<?php the_permalink(); ?>'>
                <?php the_title(); ?>
              </a>
            </h2>
          </div>
          <?php
          if (has_post_thumbnail()) {
            ?>
            <div class='thumbnail'>
              <a href='<?php the_permalink(); ?>'>
              <?php
                the_post_thumbnail();
                ?>
              </a>
            </div>
            <?php
          }
          ?>
          <div class='body'>
            <?php
            the_excerpt();
            ?>
          </div>
          <div class='foot'>
            <p class='meta'>
              <small class='date'><?php echo get_the_date(); ?></small>
              <small class='cat'><?php
              $cats = get_the_category();
              if (!empty($cats)) {
                echo " | <i class='material-icons'>folder</i>";

                $i = 0;
                foreach ($cats as $cat) {
                  $i++;
                  echo " <a href='" . esc_url(get_category_link($cat->term_id)) . "'>" . esc_html($cat->name) . "</a>";
                  if ($i != count($cats)) {
                    echo ",";
                  }
                }
              }
              ?></small>
            </p>
            <a href='<?php the_permalink(); ?>' class='btn'>Read More</a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
    <div class='col-sm-8 col-xs-10 col-xs-offset-1 col-sm-offset-2'>
      <div class='pagination'>
        <?php next_posts_link("< Older Posts"); ?>
        <?php previous_posts_link("Newer Posts >"); ?>
      </div>
    </div>
  <?php endif; ?>
    </div>
  <?php get_footer(); ?>
  </main>
