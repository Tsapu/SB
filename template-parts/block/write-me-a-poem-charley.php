<?php
// if ( !isset($nicescroll) ) {
//   wp_enqueue_script( 'nicescroll', URL_PANDAGO . '/assets/vendor/nicescroll/jquery.nicescroll.min.js', array( 'jquery' ), '3.7.6' );
//   $nicescroll = true;
// }

$image = get_field('image');
$showcase = get_field('showcase_poem');
$poems = get_field('poems');
?>

<div class="container relative">
  <div class="stories-lead showcase-container">
    <div class="poem-showcase">
      <h6 class="uppercase poem-tag bg-blue mb-3"><?= esc_html__( 'Jaunums!', PANDAGO_TD ); ?></h6>
      <div class="poem-box text-center">
        <h4 class="poem-title mb-4"><?= esc_html__( $showcase['heading'], PANDAGO_TD ); ?></h4>
        <p class="poem-text"><?= unescape_br(esc_html__( $showcase['paragraph'], PANDAGO_TD )); ?></p>
      </div>
    </div>
    <?php if ($image): ?>
      <img
      src="<?= $image['sizes']['medium_large']; ?>"
      width="<?= $image['width']; ?>"
      height="<?= $image['height']; ?>"
      alt="<?= esc_attr( $image['alt'] ); ?>">
    <?php endif; ?>
  </div>
</div>
<div class="container relative poem-library">
  <div class="w-100-sm">
    <h6 class="uppercase poem-tag bg-blue mb-3"><?= esc_html__( 'Visi dzejoļi', PANDAGO_TD ); ?></h6>
    <div class="poem-box poem-list relative">
      <ul class="scroll-js">
      <?php foreach ($poems as $poem): ?>
      <li class="poem-item">
        <p class="poem-title"><?= esc_html__( $poem['heading'], PANDAGO_TD ); ?></h4>
        <p class="poem-text"><?= unescape_br(esc_html__( $poem['paragraph'], PANDAGO_TD )); ?></p>
      </li>
      <?php endforeach; ?>
      </ul>
      <!-- <div class="scrollbar-container bg-white pointer">
        <div class="scrollbar bg-blue" id="poem-scroller"></div>
      </div> -->
    </div>
  </div>
  <div class="poem-container flex-y-c">
    <div class="poem-content">
      <h4 class="poem-title mb-4" id="poem-title"></h4>
      <p id="poem-text" style="white-space: pre-wrap;"></p>
    </div>
  </div>
</div>