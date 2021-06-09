<?php
$heading = get_field('heading');
$paragraph = get_field('paragraph');
$text_align = get_field('text_align');
?>

<div class="container relative page-intro">
  <h1 class="text-center"><?= esc_html__( $heading, PANDAGO_TD ); ?></h1>
  <p class="text-<?= $text_align; ?>"><?= unescape_br( esc_html__( $paragraph, PANDAGO_TD ) );  ?></p>
</div>