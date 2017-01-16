<?php
$theDescription = '';
$theAuthor = '';
$theTitle = '';

if (is_single()) {
  while (have_posts()) {
    $theDescription = get_the_excerpt();
    $theAuthor = get_the_author();
    $theTitle = get_the_title();
  }
} else if (is_category()) {
  $theDescription = single_cat_description();
  $theAuthor = 'Game and Movie';
  $theTitle = single_cat_title();
} else {
  $theDescription = bloginfo('description');
  $theAuthor = 'Game and Movie';
  $theTitle = '';
}

if ($theDescription === '') {
  $theDescription = bloginfo('description');
}

if ($theDescription === '') {
  $theDescription = "Game and Movie podcast combines the world of Video Gaming with cinemaphiles";
}

if ($theDescription != '') {
  $cutDesc = substr($theDescription, 0, strpos($theDescription, wordwrap($theDescription, 197, "\n"))) . "...";
}
 ?>

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
    <meta name='description' content='<?php echo $theDescription; ?>' />
    <meta name='robots' content='index,follow,noodp' />
    <meta name='googlebot' content='index,follow' />
    <meta name='google' content='nositelinkssearchbox' />
    <meta name='google' content='notranslate' />
    <meta name='generator' content='Atom.io, WordPress.org, Google Chrome, Apple Safari, Mozilla Firefox, MAMP' />
    <meta name='subject' content='video games, movies, video gaming, gaming, entertainment' />
    <meta name='rating' content='general' />
    <meta name='referrer' content='no-referrer' />
    <meta name='format-detection' content='telephone=no' />
    <meta name='x-dns-prefetch-control' content='off' />
    <meta name='ICBM' content='43.0389° N, 87.9065° W' />
    <meta name='geo.position' content='43.0389° N;87.9065° W' />
    <meta name='geo.region' content='US[WI]' />
    <meta name='geo.placename' content='Milwaukee' />
    <meta property='og:url' content='https://www.facebook.com/gameandmoviepodcast' />
    <meta property='og:type' content='website' />
    <meta property='og:title' content='<?php echo $thetitle; ?>' />
    <meta property='og:image' content='<?php echo get_site_icon_url(); ?>' />
    <meta property='og:description' content='<?php echo $theDescription; ?>' />
    <meta property='og:site_name' content='Game and Movie Podcast' />
    <meta property='og:locale' content='en_US' />
    <meta property='article:author' content='<?php echo $theAuthor; ?>' />
    <meta name='twitter:card' content='<?php echo $theDescription; ?>' />
    <meta name='twitter:site' content='@GAMEANDMOVIEUSA' />
    <meta name='twitter:title' content='<?php echo $theTitle; ?>' />
    <meta name='twitter:description' content='<?php echo $theDescription; ?>' />
    <meta name='twitter:image' content='<?php echo get_site_icon_url(); ?>' />
    <meta itemprop='name' content='<?php echo $theTitle; ?>' />
    <meta itemprop='description' content='<?php $cutDesc; ?>' />
    <meta itemprop='image' content='<?php echo the_custom_logo(); ?>' />
    <meta name='pinterest' content='nopin' description="Sorry, you can't save to Pinterest on this site." />
    <meta name='renderer' content='webkit|ie-comp|ie-stand' />
    <meta name='nightmode' content='disable' />
    <meta name='layoutmode' content='fitscreen' />
    <meta name='wap-font-scale' content='no' />
    <link rel='icon' href='<?php echo get_site_icon_url(); ?>' type='image/png' />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600|Roboto:400,500|Material+Icons" rel="stylesheet" type='text/css'>
    <link href="https://file.myfontastic.com/n6vo44Re5QaWo8oCKShBs7/icons.css" rel="stylesheet" type='text/css'>
    <link rel='stylesheet' href='<?php bloginfo('stylesheet_url'); ?>' type='text/css' />
    <script src="https://connect.soundcloud.com/sdk/sdk-3.1.2.js"></script>
    <script src='<?php echo get_template_directory_uri(); ?>/assets/js/jquery.js' type='text/javascript'></script>
    <script src='<?php echo get_template_directory_uri(); ?>/assets/js/scrollstop.js' type='text/javascript'></script>
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
      <ul id='cats'>
        <?php
        $params = array(
          'echo' => true,
          'hide_empty' => 1,
          'hide_title_if_empty' => 1,
          'style' => 'list'
        );
        wp_list_categories($params);
        ?>
      </ul>
      <?php
      get_search_form();
    ?>
  </header>
