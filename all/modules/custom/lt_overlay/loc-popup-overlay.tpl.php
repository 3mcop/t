<?php
/**
 * @file
 * Template for the Localitee postcode/login/signup overlay.
 *
 * Variables:
 * $close_button, $postcode_form and $login_form are all
 * forms already processed by drupal_get_form(). This allows the forms and
 * their submit handlers to be defined independently.
 */
?>

<?php echo drupal_render( $close_button ); ?>
<?php echo drupal_render( $postcode_form ); ?>
<?php echo drupal_render( $login_form ); ?>

