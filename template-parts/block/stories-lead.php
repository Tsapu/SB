<?php
$img = get_field('image');
$heading = get_field('heading');
$paragraph = get_field('paragraph');
$buttons = get_field('buttons');

if ( get_field('crop_bool') ) {
  $img_crop1 = get_field('crop')['crop_horizontal'];
  $img_crop2 = get_field('crop')['crop_vertical'];
}
$float = get_field('float');
$flex_order = get_field('flex_order');
$text_align = get_field('text_align');
?>

<div class="stories-lead container relative">
  <div class="lead-wrap mb-3
    <?= 'text-' . $text_align ?>
    <?= get_field('crop_bool') ? 'block-maxed' : ''; ?>">
    <h2 class="lead-title"><?= esc_html__( $heading, PANDAGO_TD ); ?></h2>
    <p class="lead-paragraph"><?= unescape_br( esc_html__( $paragraph, PANDAGO_TD ) );  ?></p>
    <?php if ($buttons) {
      echo template( 'button',  array(
      'content' => $buttons
      ));
    } ?>
  </div>

  <?php if ($img): ?>
  <img
    src="<?= $img['sizes']['medium_large']; ?>"
    width="<?= $img['width']; ?>"
    height="<?= $img['height']; ?>"
    style="
    <?php if ( get_field('crop_bool') ): ?>
    object-position: <?= $img_crop1  . ' ' . $img_crop2; ?>;
    <?php endif; ?>
    order: <?= ($flex_order == 1) ? '-1' : '1'; ?>;"
    class="<?= get_field('crop_bool') ? 'img-crop border-right' : ''; ?> <?= ($float == 'left') ? 'order-lg-n1' : 'order-lg-1'; ?>"
    alt="<?= esc_attr( $img['alt'] ); ?>">
  <?php endif; ?>
</div>