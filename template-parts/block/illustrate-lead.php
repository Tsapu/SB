<?php
$images = get_field('images');
$heading = get_field('heading');
$paragraph = get_field('paragraph');
$buttons = get_field('buttons');
?>

<div class="blueprints">
  <div class="container relative text-center">
    <h2 class="title"><?= esc_html__( $heading, PANDAGO_TD ); ?></h2>
    <p class="paragraph mb-5"><?= unescape_br( esc_html__( $paragraph, PANDAGO_TD ) );  ?></p>
    
    <?php if ($images): ?>
    <div class="row">
      <?php foreach( $images as $image ): ?>
      <div class="blueprint col-12 col-sm-6 col-md-3 mb-gutters">
      <img
      src="<?= $image['sizes']['medium_large']; ?>"
      width="<?= $image['width']; ?>"
      height="<?= $image['height']; ?>"
      alt="<?= esc_attr( $image['alt'] ); ?>">
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php if ($buttons) {
      echo template( 'button',  array(
      'content' => $buttons,
      'button_type' => 'primary',
      ));
    } ?>
  </div>
</div>