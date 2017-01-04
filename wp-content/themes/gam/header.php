<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8' />
    <meta http-equiv='x-ua-compatible' content='ie=edge' />
    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <title>
      <?php
      wp_title('|', true, 'right');
      bloginfo('name'); ?>
    </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600|Roboto:400,500|Material+Icons" rel="stylesheet" type='text/css'>
    <link href="https://file.myfontastic.com/n6vo44Re5QaWo8oCKShBs7/icons.css" rel="stylesheet" type='text/css'>
    <link rel='stylesheet' href='<?php bloginfo('stylesheet_url'); ?>' type='text/css' />
    <script src='<?php echo get_template_directory_uri(); ?>/assets/js/jquery.js' type='text/javascript'></script>
    <script src='<?php echo get_template_directory_uri(); ?>/assets/js/scripts.js' type='text/javascript'></script>
  </head>
<body class='row'>
  <header class='col-sm-3'>
    <div class='logo'>
      <a href='<?php echo home_url('/');?>'>
        <?php
        if (has_custom_logo()) {
          echo the_custom_logo();
        } else {
          echo "<h2>" . bloginfo('name') . "</h2>";
        }
        ?>
      </a>
    </div>
    <button id='menu-toggle'><i class='material-icons'>menu</i></button>
    <?php
      $params = array (
        'menu' => 'Primary Navigation',
        'container' => 'nav',
        'items_wrap' => '%3$s',
        'depth' => 0
      );
      wp_nav_menu($params);
      /*
        output
        <li><a>...</a></li>
        <li><a>...</a></li>
        <li><a>...</a></li>
        <li><a>...</a></li>
        */
    ?>
  </header>
