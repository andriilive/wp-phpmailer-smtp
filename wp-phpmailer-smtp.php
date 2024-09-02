<?php
/**
 * Plugin Name:  WP PHPMailer SMTP
 * Plugin URI:   https://github.com/andriilive/wp-phpmailer-smtp
 * Description:  Configure PHPMailer to send mail via SMTP.
 * Version:      0.0.1
 * Author:       Andrii Iv. (@digitalandyeu)
 * Author URI:   https://github.com/andriilive
 * License:      Apache License 2.0
 * License URI:  https://www.apache.org/licenses/LICENSE-2.0
 * Requires at least: 5.8
 * Requires PHP: 8.0
 */

if (!defined('ABSPATH')) {
    exit;
}

if (defined('DISABLE_WP_PHPMAILER_SMTP') && DISABLE_WP_PHPMAILER_SMTP) {
    return;
}

$requred_config = ['SMTP_HOST', 'SMTP_PORT', 'SMTP_USERNAME', 'SMTP_PASSWORD'];

foreach ($requred_config as $constant) {
    if (!defined($constant)) {
        wp_die(sprintf('The constant %s is required. Define it in wp-config.php.', $constant));
    }
}

use PHPMailer\PHPMailer\PHPMailer;

function phpmailer_smtp(PHPMailer $phpmailer): void
{
    $phpmailer->isSMTP();

    if (defined('SMTP_FROM')) {
        $phpmailer->From = SMTP_FROM;
    }

    if (defined('SMTP_FROM_NAME')) {
        $phpmailer->FromName = SMTP_FROM_NAME;
    }

    if (defined('SMTP_REPLY_TO')) {
        $phpmailer->addReplyTo(SMTP_REPLY_TO, SMTP_FROM_NAME);
    }

    $phpmailer->Host = SMTP_HOST;
    $phpmailer->SMTPAuth = true;
    $phpmailer->SMTPAutoTLS = true;
    $phpmailer->SMTPSecure = PhpMailer::ENCRYPTION_SMTPS;
    $phpmailer->Port = SMTP_PORT;
    $phpmailer->Username = SMTP_USERNAME;
    $phpmailer->Password = SMTP_PASSWORD;
}

add_action('phpmailer_init', 'phpmailer_smtp');