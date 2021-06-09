<?php
$images = get_field('images');
$heading = get_field('heading');
$paragraph = get_field('paragraph');
$buttons = get_field('buttons');
?>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <defs><style>.black{fill:#1a1a1a;} .gray{fill:#bebebe;} .orange{fill:#ebaf88;} .a{fill:#3d3d3d;} .opaque{opacity:0.2} .white{fill:#fff;}</style>
  <path id="chevron-path" d="M15.036,20a.775.775,0,0,1-.561-.244l-6.484-6.81a4.316,4.316,0,0,1,0-5.892L14.475.244a.767.767,0,0,1,1.122,0,.863.863,0,0,1,0,1.179L9.113,8.233a2.59,2.59,0,0,0,0,3.535l6.484,6.81a.864.864,0,0,1,.172.908A.794.794,0,0,1,15.036,20Z"/>
  <symbol id="chevron" viewBox="0 0 17 20">
    <use href="#chevron-path" transform="translate(-6.829)"/>
  </symbol>
  <symbol id="slide-arrow" viewBox="0 0 36 48">
    <g><path d="M0,0H16A20,20,0,0,1,36,20v8A20,20,0,0,1,16,48H0a0,0,0,0,1,0,0V0A0,0,0,0,1,0,0Z"/><use href="#chevron-path" transform="translate(6.323 14)" class="black"/></g>
  </symbol>
  <symbol id="slide-arrow-opaque" viewBox="0 0 36 48">
    <g><path d="M0,0H16A20,20,0,0,1,36,20v8A20,20,0,0,1,16,48H0a0,0,0,0,1,0,0V0A0,0,0,0,1,0,0Z"/><use href="#chevron-path" transform="translate(6.323 14)" class="black opaque"/></g>
  </symbol>
  <symbol id="zoom-glass" viewBox="0 0 24 24"><g><path class="a" d="M23.675,22.263,17.714,16.3A10,10,0,1,0,16.3,17.714l5.961,5.961a1,1,0,1,0,1.412-1.412ZM9.987,17.976a7.989,7.989,0,1,1,7.989-7.989,7.989,7.989,0,0,1-7.989,7.989Z"/><path class="a" d="M13,9H11V7A1,1,0,0,0,9,7V9H7a1,1,0,0,0,0,2H9v2a1,1,0,0,0,2,0V11h2a1,1,0,0,0,0-2Z"/></g></symbol>
  <symbol id="zoom-close" viewBox="0 0 20 20"><path class="white" d="M27.5,9.514,25.486,7.5,17.5,15.486,9.514,7.5,7.5,9.514,15.486,17.5,7.5,25.486,9.514,27.5,17.5,19.514,25.486,27.5,27.5,25.486,19.514,17.5Z" transform="translate(-7.5 -7.5)"/></symbol>
  </defs>
</svg>

<div class="container relative book-preview-container book-container-js">
  <?php if ($images): ?>
    <div class="book-preview">
      <div class="featured relative">
        <div class="spotlight-container-js relative">
          <img
          src="<?= $images[0]['sizes']['medium_large']; ?>"
          alt="<?= esc_attr( $images[0]['alt'] ); ?>"
          class="spotlight">
          <span class="zoom-glass"><svg class="pointer" width="24" height="24"><use href="#zoom-glass"></use></svg></span>
        </div>
        <div class="spotlight-sliders-js">
        <span class="slide-prev slide-control no-select-js"><svg width="36" height="48"><use href="#slide-arrow-opaque"></use></svg></span>
        <span class="slide-next slide-control"><svg class="flip" width="36" height="48"><use href="#slide-arrow"></use></svg></span></div>
      </div>
      <div class="relative">
        <ul class="preview-gallery">
        <?php foreach( $images as $index=>$image ): ?>
          <li><img
            src="<?= $image['sizes']['thumbnail']; ?>"     
            data-src="<?= $image['sizes']['medium_large']; ?>"
            data-src_lg="<?= $image['sizes']['large']; ?>"
            class="thumbnail <?= ($index == 0) ? 'active' : '' ?>"
            alt="<?= esc_attr( $image['alt'] ); ?>"></li>
        <?php endforeach; ?>
        </ul>
        <span class="slide-left slide-control chevron hidden"><svg width="14" height="20"><use href="#chevron"></use></svg></span>
        <span class="slide-right slide-control chevron"><svg class="flip" width="14" height="20"><use href="#chevron"></use></svg></span>
      </div>
    </div>
  <div class="site-overlay">
    <span class="zoom-close"><svg width="20" height="20"><use href="#zoom-close"></use></svg></span>
  </div>
  <?php endif; ?>

  <div class="expo-wrap">
    <h2 class="cover-title max-60-sm"><?= esc_html__( $heading, PANDAGO_TD ); ?></h2>
    <p class="cover-paragraph"><?= unescape_br( esc_html__( $paragraph, PANDAGO_TD ) );  ?></p>

    <?php if ($buttons) {
      echo template( 'button',  array(
      'content' => $buttons,
      'button_type' => 'primary',
      ));
    } ?>
  </div>
  
</div>

