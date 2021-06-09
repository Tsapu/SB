<?php
$blueprints = get_field('blueprints');
?>

<svg width="0" height="0" class="hidden">
  <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 62 62" id="palette">
    <circle cx="31" cy="31" r="31" fill="#cbe19c"></circle>
    <path d="M38.012 25.41a1.92 1.92 0 102.349 1.363 1.92 1.92 0 00-2.349-1.363zm-6.467-3.879a1.92 1.92 0 102.349 1.363 1.92 1.92 0 00-2.349-1.363zm-6.466 3.879a1.92 1.92 0 102.35 1.364 1.92 1.92 0 00-2.35-1.364zm0 7.76a1.92 1.92 0 102.349 1.363 1.92 1.92 0 00-2.349-1.363z" fill="#3d3d3d"></path>
    <path d="M32.038 15.009A15.5 15.5 0 1031.499 46a14.9 14.9 0 001.292-.065 1.292 1.292 0 001.183-1.292l-.041-4.634a4.607 4.607 0 017.866-3.309l.129.129a2.47 2.47 0 002.289.671 2.439 2.439 0 001.779-1.52 15.4 15.4 0 001-5.869 15.7 15.7 0 00-14.958-15.102zM43.639 34.9l-.018-.018a7.19 7.19 0 00-12.27 5.147l.031 3.387a12.917 12.917 0 01.116-25.833c.151 0 .3 0 .456.008a13.08 13.08 0 0112.458 12.585 12.777 12.777 0 01-.769 4.716z" fill="#3d3d3d"></path>
  </symbol>
</svg>

<div class="blueprint-files">
  <div class="container relative">
    <?php if ($blueprints): ?>
    <div class="row">
      <?php foreach( $blueprints as $blueprint ): 
      $image = $blueprint['image']?>
      <div class="blueprint-file col-12 col-sm-6 col-md-4 text-center">
        <a href="<?= $blueprint['file']; ?>" target="_blank">
        <svg class="color-icon" width="62" height="62"><use href="#palette"></use></svg>
        <img
        src="<?= $image['url']; ?>"
        width="<?= $image['width']; ?>"
        height="<?= $image['height']; ?>"
        class="pdf-image cursor"
        alt="<?= esc_attr( $image['alt'] ); ?>"></a>
        <div class="button-container">
          <a href="<?= $blueprint['file']; ?>" target="_blank"><button class="button-primary bg-green shadow-green"> <?= esc_html__( 'Lejupielādēt', PANDAGO_TD ); ?></button></a>
        </div> 
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</div>