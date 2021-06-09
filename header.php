<?php
get_template_part( 'template-parts/head' ); 
$logos = get_field( 'logos', 'option' );
//var_dump($logos['site_logo']);
?>
<header class="site-header">
  <div class="container relative h-100">
    <?php if ( $logos && $logos['site_logo'] ): $site_logo = $logos['site_logo']; ?>
    <a href="<?= home_url(); ?>"><img
      src="<?= $site_logo['url']; ?>"
      width="<?= $site_logo['width']; ?>"
      height="<?= $site_logo['height']; ?>"
      class="site-logo absolute"></a>
    <?php endif; ?>
    <img class="menu-open" src="<?=get_stylesheet_directory_uri();?>/assets/img/menu-open.svg">
    <img class="menu-close" src="<?=get_stylesheet_directory_uri();?>/assets/img/menu-close.svg">
    <div class="nav-container flex justify-content-end">
      <nav class="nav-header" id="nav-header"><?php pandago_nav( 'header' ); ?></nav>
    </div>
  </div>
</header>
<div class="empty-nav-div"></div>
<img src="<?=get_stylesheet_directory_uri();?>/assets/img/edge.svg" class="hedge left" alt="">
<img src="<?=get_stylesheet_directory_uri();?>/assets/img/edge.svg" class="hedge right" alt="">
<div class="site-content">