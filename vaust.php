<?php
/**
 * Plugin Name: Vaust
 * Plugin URI: https://github.com/brockpresland/vaust
 * Description: A framework-neutral application layer for modern WordPress front ends, with a first-class Vue adapter.
 * Version: 0.1.0-dev
 * Requires at least: 6.5
 * Requires PHP: 8.1
 * Author: Brock Presland
 * License: GPL-2.0-or-later
 * Text Domain: vaust
 */

declare(strict_types=1);

if (! defined('ABSPATH')) {
    exit;
}

define('VAUST_VERSION', '0.1.0-dev');
define('VAUST_PLUGIN_FILE', __FILE__);
define('VAUST_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('VAUST_PLUGIN_URL', plugin_dir_url(__FILE__));

$vaustAutoloader = VAUST_PLUGIN_DIR . 'vendor/autoload.php';

if (is_readable($vaustAutoloader)) {
    require $vaustAutoloader;
} else {
    require VAUST_PLUGIN_DIR . 'src/Plugin.php';
}

Vaust\Plugin::boot();

