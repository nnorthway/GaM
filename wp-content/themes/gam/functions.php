<?php
add_theme_support('post-thumbnails');

function menu_reg() {
  register_nav_menus(array(
    'primary' => __('Primary Navigation', 'gam'),
    'social' => __('Social Links', 'gam')
  ));
}
add_action('init','menu_reg');

function theme_prefix_setup() {
    add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme', 'theme_prefix_setup' );
show_admin_bar(true);
if ( ! current_user_can( 'manage_options' ) ) {
    show_admin_bar( false );
}
?>
