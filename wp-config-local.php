<?php
/**
 * Local development overrides.
 * Include this from wp-config.php: require_once __DIR__ . '/wp-config-local.php';
 * Or, these are set via environment variables in docker-compose.yml.
 */

define('WP_HOME', 'http://localhost:8083');
define('WP_SITEURL', 'http://localhost:8083');
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);
define('FORCE_SSL_ADMIN', false);
