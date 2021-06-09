<?php
/**
 * @param $content
 * @param $button_type
 */

$btn_type = ( count($content) > 1 ) ? 'secondary' : 'primary';
?>

<div class="button-container <?= ( count($content) > 1 ) ? "clean-height" : ''; ?>">

    <?php foreach( $content as $item ):
    $button_text = $item['button_text'];
    $button_link = $item['button_link'];
    $button_color = $item['color']; 
    ?>

    <a href="<?= esc_attr( $button_link ); ?>" class="button-anchor">
    <button class="<?= sprintf('button-%2$s bg-%1$s shadow-%1$s', $button_color, $btn_type); ?>"> <?= esc_html__( $button_text, PANDAGO_TD ); ?></button></a>    
    <?php endforeach; ?>
</div>