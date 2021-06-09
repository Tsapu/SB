<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php if ( have_rows( 'social', 'option' ) ): ?>
  <ul class="social">
    <?php while ( have_rows( 'social', 'option' ) ): the_row(); ?>
      <?php if ( get_sub_field( 'url' ) && get_sub_field( 'icon' ) ): ?>
        <li>
          <a class="" href="<?php the_sub_field( 'url' ); ?>" target="_blank">
            <img src="<?= the_sub_field( 'icon' ); ?>" alt="" class="social-icon">
          </a>
        </li>
      <?php endif; ?>
    <?php endwhile; ?>
  </ul>
<?php endif; ?>