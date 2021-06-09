<?php
$img = get_field('image');
$heading = get_field('heading');
$paragraph = get_field('paragraph');
$buttons = get_field('buttons');
?>


<div class="container relative">
  <?php if ($img): ?>
  <img
    width="<?= $img['width']; ?>"
    height="<?= $img['height']; ?>"
    src="<?= $img['sizes']['large']; ?>"
    srcset=
    "<?= $img['sizes']['1536x1536'] . ' ' . $img['sizes']['1536x1536-width']; ?>w,
    <?= $img['sizes']['large'] . ' ' . $img['sizes']['large-width']; ?>w,
    <?= $img['sizes']['medium_large'] . ' ' . $img['sizes']['medium_large-width']; ?>w"
    sizes="(max-width: 481px) 295px, (max-width: 769px) 502px, 1030px"
    class="w-100"
    alt="<?= esc_attr( $img['alt'] ); ?>">
  <?php endif; ?>
  <div class="cover-wrap">
    <h1 class="cover-title"><?= esc_html__( $heading, PANDAGO_TD ); ?></h1>
    <p class="cover-paragraph"><?= unescape_br( esc_html__( $paragraph, PANDAGO_TD ) );  ?></p>
    <?php if ($buttons) {
      echo template( 'button',  array(
      'content' => $buttons,
      'button_type' => 'primary',
      ));
    } ?>
  </div>
</div>