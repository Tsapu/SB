<?php
$heading = get_field('heading');
$videos = get_field('videos');
?>


<svg width="0" height="0" class="hidden">
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62 62" id="videocon">
    <g transform="translate(-698 -279)">
      <circle cx="31" cy="31" r="31" transform="translate(698 279)" fill="#f8c0c9"></circle>
      <path d="M744.618 305.03a2.465 2.465 0 00-2.619.232l-2.291 1.716a6.279 6.279 0 00-6.209-5.678h-.11l-5.151-5.2a3.7 3.7 0 00-2.651-1.1h-8.338a1.261 1.261 0 000 2.522h8.338a1.252 1.252 0 01.884.369l3.383 3.409h-7.606a6.284 6.284 0 00-6.249 6.309V317.7a6.284 6.284 0 006.249 6.3h11.251a6.279 6.279 0 006.217-5.674l2.283 1.72a2.481 2.481 0 002.617.238 2.524 2.524 0 001.383-2.255v-10.744a2.509 2.509 0 00-1.381-2.255zm-7.373 12.67a3.766 3.766 0 01-3.746 3.778h-11.251a3.766 3.766 0 01-3.749-3.778v-10.091a3.766 3.766 0 013.749-3.783h11.251a3.766 3.766 0 013.749 3.783zm6.249.324l-3.75-2.824v-5.1l3.749-2.819z" fill="#3d3d3d"></path>
    </g></symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="play">
    <g transform="translate(-169 -1707)">
      <circle cx="16" cy="16" r="16" transform="translate(169 1707)" fill="#f8c0c9"></circle>
      <path d="M191.068 1720.265l-6.738-4.919a3.533 3.533 0 00-5.618 2.834v9.841a3.533 3.533 0 005.62 2.833l6.738-4.92a3.5 3.5 0 000-5.668zm-.836 4.534l-6.738 4.92a2.12 2.12 0 01-3.369-1.7v-9.839a2.071 2.071 0 011.159-1.878 2.14 2.14 0 01.964-.231 2.1 2.1 0 011.246.414l6.738 4.92a2.1 2.1 0 010 3.4z" fill="#3d3d3d"></path>
    </g></symbol>
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" id="zoom-close"><path d="M27.5,9.514,25.486,7.5,17.5,15.486,9.514,7.5,7.5,9.514,15.486,17.5,7.5,25.486,9.514,27.5,17.5,19.514,25.486,27.5,27.5,25.486,19.514,17.5Z" transform="translate(-7.5 -7.5)" fill="#FFF"/></symbol>
</svg>

<div class="container relative video-stories">
  <div class="title-box text-center mb-5">
  <svg class="icon mb-4" width="62" height="62"><use href="#videocon"></use></svg>
  <h3 class="cover-title"><?= esc_html__( $heading, PANDAGO_TD ); ?></h3>
  </div>

  <?php if ($videos): ?>
  <div class="row">
    <?php foreach( $videos as $video ):
    $video_img = $video['video_front']['image']; ?>
    <div class="col-12 col-sm-6 col-md-4 mb-5 video-item">
      <div class="video-thumb content-center">
        <img
        src="<?= $video_img['sizes']['medium_large']; ?>"
        width="<?= $video_img['width']; ?>"
        height="<?= $video_img['height']; ?>"
        alt="<?= esc_attr( $video_img['alt'] ); ?>">
        <svg class="icon absolute pointer" width="80" height="80"><use href="#play"></use></svg>
      </div>
      <p class="video-name content-center pointer fw-600"><?= esc_html__( $video['video_front']['name'], PANDAGO_TD ); ?></p>
    </div>
    <?php endforeach; ?>
  </div>
  <div class="site-overlay" id="video-overlay">
    <span class="zoom-close" id="video-close"><svg width="20" height="20"><use href="#zoom-close"></use></svg></span>
  </div>
  <?php endif; ?>
</div>

<?php foreach( $videos as $video ): ?>
<div class="embed-container abs-center">
  <?php echo $video['oembed']; ?>
</div>
<?php endforeach; ?>
