<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php get_header(); ?>

<div class="container h-100 text-center" style="padding-top: 5rem; padding-bottom: 5rem;">
  <h1 class="code404 mb-2" style="font-size: 140px; color: #EBAF88">404</h1>
  <p class="fw-600 mb-2"><?php _e( 'Lapa netika atrasta!', TD ); ?></p>
  <p><?php _e( 'Radusies kāda tehniska kļūda, vai arī šī lapa vairs nav pieejama.', TD ); ?></p>
  <div class="button-container">
    <a href="<?= home_url(); ?>">
      <button class="button-primary bg-blue shadow-blue"><?php _e( 'Uz sākumlapu', 'pandago' ); ?></button>
    </a>
  </div>
</div>

<?php get_footer(); ?>