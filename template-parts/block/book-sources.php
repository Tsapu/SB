<?php
$images = get_field('images');
$heading = get_field('heading');
?>

<div class="container relative text-center">
  <h2 class="title"><?= esc_html__( $heading, PANDAGO_TD ); ?></h2> 
  <?php if ($images): ?>
  <div class="book-sources">
    <?php foreach( $images as $index=>$image ): ?>
      <div><img
      src="<?= $image['url']; ?>"
      width="<?= $image['width']; ?>"
      height="<?= $image['height']; ?>"
      alt="<?= esc_attr( $image['alt'] ); ?>">
      </div>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>
</div>