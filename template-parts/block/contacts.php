<?php
$heading = get_field('heading');
?>

<svg width="0" height="0" class="hidden">
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" id="incorrect">
    <path d="M16 8a8 8 0 11-8-8 8 8 0 018 8zM8 9.613a1.484 1.484 0 101.484 1.484A1.484 1.484 0 008 9.612zM6.591 4.279l.239 4.387a.387.387 0 00.387.366h1.565a.387.387 0 00.387-.366l.239-4.387a.387.387 0 00-.387-.408H6.977a.387.387 0 00-.386.408z" fill="#e40a19"></path>
  </symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" id="correct">
    <g transform="translate(-904 -1422)">
      <rect width="16" height="16" rx="8" transform="translate(904 1422)" fill="#ebaf88"></rect>
      <path id="checkmark-path" d="M916.287 1426.143l-5.757 6.739a.375.375 0 01-.59 0l-2.227-2.609a.389.389 0 00-.3-.144.389.389 0 00-.3.144.548.548 0 000 .691l2.227 2.607a1.129 1.129 0 001.771 0l5.766-6.737a.548.548 0 000-.691.375.375 0 00-.59 0z"></path>
    </g>
  </symbol>
</svg>

<div class="container relative">
  <svg class="incorrect hidden" width="16" height="16"><use href="#incorrect"></use></svg>
  <svg class="correct hidden" width="16" height="16"><use href="#correct"></use></svg>
  <svg class="hidden" id="success-icon" width="16" height="16"><use href="#correct"></use></svg>
  <span class="hidden red" id="email-error"><?= __('Ievadiet pilnu e-pasta adresi', PANDAGO_TD); ?></span>

  <h1 class="text-center-lg"><?= esc_html__( $heading, PANDAGO_TD ); ?></h1>
  <div class="contact-wrap">
    <?php echo do_shortcode( '[[contact-form-7 id="498" title="Contact form 1"]]' ); ?>
    <div class="contact-info-box bg-orange">

    <?php echo template( 'contacts', array('labeled'=>true) );  ?>
    </div>
  </div>
</div>