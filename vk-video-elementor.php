<?php
/**
 * Plugin Name: VK Video for Elementor
 * Description: VK Video widget (stable editor/frontend, styles, preview)
 * Version: 1.4.3
 * Author: StudioAVP
 */

if (!defined('ABSPATH')) exit;

add_action('plugins_loaded', function() {

    if (!did_action('elementor/loaded')) return;

    // Register assets
    add_action('elementor/frontend/after_register_scripts', function() {
        wp_register_script('vk-video-script', plugins_url('assets/script.js', __FILE__), [], '1.4.3', true);
    });

    add_action('elementor/frontend/after_register_styles', function() {
        wp_register_style('vk-video-style', plugins_url('assets/style.css', __FILE__), [], '1.4.3');
    });

    // Register widget
    add_action('elementor/widgets/register', function($widgets_manager) {
        require_once(__DIR__ . '/widgets/vk-video-widget.php');
        $widgets_manager->register(new \VK_Video_Widget());
    });

});
