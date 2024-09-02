# WordPress PHPMailer SMTP Configuration Plugin

[![StandWithUkraine](https://raw.githubusercontent.com/vshymanskyy/StandWithUkraine/main/badges/StandWithUkraine.svg)](https://github.com/vshymanskyy/StandWithUkraine)&nbsp;
[![GitHub @andriilive](https://img.shields.io/github/followers/andriilive?label=@andriilive&style=social)](https://www.github.com/andriilive)

Configure WP PHPMailer to send mail via SMTP, by defining the SMTP configuration in the `wp-config.php` file.

- Requires PHP at least `8.0`
- Tested with WP `5.8.1`-`6.4.1.`
- Supports [Bedrock](https://roots.io/bedrock) `WordPress` installs

## Bedrock installation

1. Edit the `.env` file
2. Require the package via composer

```dotenv
# Required SMTP configuration
SMTP_HOST=smtp.xxx.com
SMTP_PORT=465
SMTP_USERNAME=bot@digitalandy.eu
SMTP_PASSWORD=xxxxxxxx

# Optional
SMTP_FROM=bot@digitalandy.eu
SMTP_FROM_NAME=Bot
DISABLE_WP_PHPMAILER_SMTP=true
SMTP_REPLY_TO=hi@digitalandy.eu
```

```shell
composer require andriilive/wp-phpmailer-smtp
```

## Manual installation

1. Edit the `wp-config.php` file
2. Put the `wp-phpmailer-smtp.php` file in to `mu-plugins` or `plugins` dir

### wp-config.php

Add SMTP configuration to wp-config.php file

```php
/* Required SMTP configuration */
define('SMTP_HOST', 'smtp.xxx.com');
define('SMTP_PORT', 465);
define('SMTP_USERNAME', 'bot@digitalandy.eu');
define('SMTP_PASSWORD', 'xxxxxxxx');

/* Optional */
define('SMTP_FROM', 'bot@digitalandy.eu'); // From email
define('SMTP_FROM_NAME', 'Bot'); // From name
define('DISABLE_WP_PHPMAILER_SMTP', true); // Disable WP PHPMailer SMTP
define('SMTP_REPLY_TO', ''); // Adds reply-to header
```
### Download `wp-phpmailer-smtp.php`

Launch the following command in the `mu-plugins` or `plugins` directory

```shell
wget https://raw.githubusercontent.com/digitalandy/wp-phpmailer-smtp/main/wp-phpmailer-smtp.php -O wp-phpmailer-smtp.php
```
