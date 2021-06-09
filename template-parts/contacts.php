<?php
/**
 * @param $labeled
 * 
 */

$tel = get_field( 'tel', 'option' );
$email = get_field( 'email', 'option' );
?>

<ul class="contacts">
  <?php if ( $tel ): ?>
  <li>
    <?= $labeled ? '<p>' . __('Tālrunis:', PANDAGO_TD) . '</p>' : '' ; ?>
    <a href="tel: <?= esc_attr($tel); ?>">
    <img src="<?=get_stylesheet_directory_uri();?>/assets/img/phone.svg" alt="" class="contact-icon">
    <span><?= esc_html($tel); ?></span></a>
  </li>
  <?php endif; ?>
  <?php if ( $email ): ?>
  <li>
    <?= $labeled ? '<p>' . __('E - pasts:', PANDAGO_TD) . '</p>' : '' ; ?>
    <a href="mailto: <?= esc_attr($email); ?>">
    <img src="<?=get_stylesheet_directory_uri();?>/assets/img/envelope.svg" alt="" class="contact-icon">
    <span><?= esc_html($email); ?></span></a>
  </li>
  <?php endif; ?>
</ul>