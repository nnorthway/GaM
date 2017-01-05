<footer class='row'>
  <p class='col-xs-12 col-sm-6'>&copy; <?php echo date('Y') . " "; bloginfo('name'); ?></p>
  <div id='social' class='col-xs-12 col-sm-6'>
    <?php
    $params = array (
      'menu' => 'Social',
      'container' => 'div',
      'items_wrap' => '%3$s',
      'echo' => false,
    );
    $social_menu = wp_nav_menu($params);

    echo $social_menu;
    ?>
  </div>
</footer>
