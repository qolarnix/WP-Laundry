<?php declare(strict_types=1);
/**
 * Plugin Name: WP Laundry
 * Requires PHP: 8.2.1
 */

use Symfony\Component\Templating\Loader\FilesystemLoader as Loader;
use Symfony\Component\Templating\PhpEngine as Engine;
use Symfony\Component\Templating\Helper\SlotsHelper;
use Symfony\Component\Templating\TemplateNameParser;

require __DIR__ . '/vendor/autoload.php';

add_action('admin_menu', 'wp_laundry_menu');
function wp_laundry_menu() {
    add_menu_page(
        'WP Laundry', 
        'Laundry', 
        'manage_options', 
        'wp-laundry', 
        'wp_laundry_ui'
    );

    add_action('admin_enqueue_scripts', function() {
        wp_enqueue_style('wp-laundry-style', plugin_dir_url(__FILE__) . 'style.css');
    });
}

function wp_laundry_ui() {
    $fs_loader = new Loader(__DIR__ . '/views/%name%');
    $template = new Engine(new TemplateNameParser(), $fs_loader);
    $template->set(new SlotsHelper());

    echo $template->render('admin.php');
}