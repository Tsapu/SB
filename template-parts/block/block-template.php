<?php
$images = get_field('images');
$heading = get_field('heading');
$paragraph = get_field('paragraph');
$buttons = get_field('buttons');
?>

<div class="container relative">

  <?php if ($images): ?>
    <?php foreach( $images as $index=>$image ): ?>
      
    <?php endforeach; ?>
  <?php endif; ?>

  <img
  src="<?= $image['url']; ?>"
  width="<?= $image['width']; ?>"
  height="<?= $image['height']; ?>"
  class="">

  <h2 class="cover-title"><?= esc_html__( $heading, PANDAGO_TD ); ?></h2>
  <p class="cover-paragraph"><?= unescape_br( esc_html__( $paragraph, PANDAGO_TD ) );  ?></p>

  <?php if ($buttons) {
    echo template( 'button',  array(
    'content' => $buttons,
    'button_type' => 'primary',
    ));
  } ?>
  
</div>