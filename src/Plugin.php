<?php

declare(strict_types=1);

namespace Vaust;

final class Plugin
{
    private const REST_NAMESPACE = 'vaust/v1';

    private static bool $booted = false;

    public static function boot(): void
    {
        if (self::$booted) {
            return;
        }

        self::$booted = true;

        add_action('init', [self::class, 'loadTextDomain']);
        add_action('rest_api_init', [self::class, 'registerRestRoutes']);
    }

    public static function loadTextDomain(): void
    {
        load_plugin_textdomain(
            'vaust',
            false,
            dirname(plugin_basename(VAUST_PLUGIN_FILE)) . '/languages'
        );
    }

    public static function registerRestRoutes(): void
    {
        register_rest_route(
            self::REST_NAMESPACE,
            '/capabilities',
            [
                'methods' => 'GET',
                'callback' => [self::class, 'getCapabilities'],
                'permission_callback' => '__return_true',
            ]
        );
    }

    public static function getCapabilities(): \WP_REST_Response
    {
        return new \WP_REST_Response(
            [
                'plugin' => [
                    'name' => 'Vaust',
                    'version' => VAUST_VERSION,
                ],
                'wordpress' => [
                    'version' => get_bloginfo('version'),
                    'restUrl' => rest_url(),
                    'homeUrl' => home_url('/'),
                ],
                'features' => [
                    'acf' => function_exists('get_field'),
                    'wpGraphql' => class_exists('WPGraphQL'),
                ],
            ]
        );
    }
}

