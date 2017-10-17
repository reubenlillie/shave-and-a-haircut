<?php
/**
 * The main plugin file for Shave and a Haircut
 *
 * Trim `wp_head`.
 *
 * @link https://github.com/reubenlillie/shave-and-a-haircut/
 *
 * @package Shave and a Haircut
 * @subpackage Shave and a Haircut\main
 * @author Reuben L. Lillie <email@reubenlillie.com>
 * @copyright 2017 Reuben L. Lillie
 * @license <http://www.gnu.org/licenses/gpl-2.0.txt> GNUv2 or later
 *
 * @wordpress-plugin
 * Plugin Name: Shave and a Haircut
 * Plugin URI:  https://github.com/reubenlillie/shave-and-a-haircut/
 * Description: Trim `wp_head`.
 * Author:      Reuben L. Lillie
 * Author URI:  https://reubenlillie.com/about/
 * Version:     0.1.0
 * License:     GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 * Text Domain: shave-and-a-haircut
 *
 * Shave and a Haircut is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License,
 * or any later version.
 *
 * Shave and a Haircut is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General
 * Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with Shave and a Haircut. If not, see https://www.gnu.org/licenses/gpl-2.0.html/.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Clean up the code WordPress outputs in the HTML `<head>` tag.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_head/
 * @link https://developer.wordpress.org/reference/hooks/wp_print_styles/
 * @link https://developer.wordpress.org/reference/functions/admin_print_scripts/
 * @link https://developer.wordpress.org/reference/functions/admin_print_styles/
 * @link https://wpsmackdown.com/wordpress-cleanup-wp-head/
 *
 * @since 0.1.0
 */
remove_action( 'wp_head', 'wp_generator');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'rsd_link');
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action( 'wp_head', 'start_post_rel_link', 10, 0);
remove_action( 'wp_head', 'print_emoji_detection_script', 7);
remove_action( 'wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Remove inline custom background `<style>`.
 *
 * @link https://developer.wordpress.org/reference/functions/current_theme_supports/
 * @since 0.1.0
 */
function two_bits() {
    if ( current_theme_supports( 'custom-background' ) ) {
        wp_enqueue_script( 'two_bits', plugin_dir_url( __FILE__ ) .
            '/js/two-bits.js', array(), '1.0.0', true );
    }
}
add_action( 'wp_enqueue_scripts', 'two_bits' );
