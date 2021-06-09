<?php
$img = get_field('image');
$heading = get_field('heading');
$annotation = get_field('annotation');
$paragraph = get_field('paragraph');
$buttons = get_field('buttons');
$float = get_field('float');
$float_opposite = ( $float == 'right' ) ? 'left' : 'right';
$bg_bool = get_field('bg_color_bool');
$bg_color = $bg_bool ? get_field('bg_color')['color'] : '';

if ( get_field('crop_bool') ) {
  $img_crop1 = get_field('crop')['crop_horizontal'];
  $img_crop2 = get_field('crop')['crop_vertical'];
}

$custom_classes = get_field('custom_edit');
?>

<div class="author-expo <?= sprintf("block-%s-lg bg-opaque-%s", $float_opposite, $bg_color) . ' ' . ((!$bg_bool) ? 'pad-reset' : '') . ' '; ?>
<?= $custom_classes; ?>" style="">
  <div class="container relative">
    <div class="title-box text-center-sm">
      <h2 class="title"><?= esc_html__( $heading, PANDAGO_TD ); ?></h2>
      <h5 class="annotation"><?= esc_html__( $annotation, PANDAGO_TD ); ?></h5>
    </div>
    <img
      src="<?= $img['sizes']['medium_large']; ?>"
      width="<?= $img['width']; ?>"
      height="<?= $img['height']; ?>"
      class="profile-image mb-5 <?= sprintf("float-%s-lg", $float) ?>"
      style="object-position: <?= $img_crop1  . ' ' . $img_crop2; ?>"
      alt="<?= esc_attr( $img['alt'] ); ?>">
    <div class="expo-wrap">
      <div class="title-box text-center-sm">
        <h2 class="title"><?= esc_html__( $heading, PANDAGO_TD ); ?></h2>
        <h5 class="annotation"><?= esc_html__( $annotation, PANDAGO_TD ); ?></h5>
      </div>
      <div class="expo-pbox">
        <p class="expo-paragraph"><?= unescape_br( esc_html__( $paragraph, PANDAGO_TD ) );  ?></p>
        <?php if ($buttons) {
          echo template( 'button',  array(
          'content' => $buttons,
          'button_type' => 'primary',
          ));
        } ?>
      </div>
    </div>
  </div>
</div>