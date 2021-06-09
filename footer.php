<?php
$logos = get_field( 'logos', 'option' );
?>

</div>
<footer class="site-footer <?php if (is_front_page()) { echo 'pull-up'; } ?>">
  <div class="container">
    <div class="row mb-5-resp">
      <div class="col col-md-5 footer-section">
        <?php if ( $logos && $logos['site_logo'] ): $site_logo = $logos['site_logo']; ?>
        <a href="<?= home_url(); ?>"><img
        src="<?= $site_logo['url']; ?>"
        width="<?= $site_logo['width']; ?>"
        height="<?= $site_logo['height']; ?>"
        class="site-logo"></a>
        <?php endif; ?>
      </div>
      <div class="w-100 d-md-none"></div>
      <div class="col-sm-7 col-md-4 footer-section">
        <h6 class=""><?= __('Kontakti', PANDAGO_TD); ?></h6>
        <?php echo template( 'contacts', array('labeled'=>false) );  ?>
      </div>
      <div class="col-sm-5 col-md-3 footer-section text-right-lg">
        <h6 class="spaced-letters"><?= __('Seko mums', PANDAGO_TD); ?></h6>
        <?php get_template_part( 'template-parts/social' );  ?>
      </div>
    </div>
    <div class="row flex-wrap-reverse">
      <div class="col-md-auto">
        <span><?php echo '© ' . date("Y") . ' ' . __('Saldumlācim lasīt tīk.', PANDAGO_TD); ?></span>
        <br class="d-sm-none">
        <span><?php _e('Visas tiesības aizsargātas.', PANDAGO_TD); ?></span>
      </div>
      <div class="col-md-auto footer-section">
        <a href="<?= home_url() . '/privatuma-politika'; ?>"><span><?php _e('Privātuma politika', PANDAGO_TD) ?></span></a>
      </div>
    </div>
  </div>
</footer>
<?php get_template_part( 'template-parts/foot' ); ?>