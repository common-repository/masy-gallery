<?php
/*
 * Plugin Name: Masy Gallery
 * Plugin URI:  https://github.com/ImDR/masy-gallery
 * Description: Just an another wordpress gallery plugin
 * Version:     1.7
 * Author:      Dinesh Rawat
 * Author URI:  https://imdr.github.io/
 * Text Domain: masy-gallery
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

define('MASYGAL_PLUGIN',  plugin_dir_url(__FILE__));

if (!function_exists('masygal_add_plugin_scripts')) :
	function masygal_add_plugin_scripts()
	{
		wp_enqueue_style('fancybox4', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css', array(), '4.0');
		wp_enqueue_style('justifiedGallery', MASYGAL_PLUGIN . 'css/justifiedGallery.min.css', array(), '3.8.0');
		wp_enqueue_script('jquery');
		wp_enqueue_script('masy', 'https://cdn.jsdelivr.net/npm/macy@2', array('jquery'), '2.5.1', true);
		wp_enqueue_script('fancybox4', 'https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js', array('jquery'), '4.0', true);
		wp_enqueue_script('justifiedGallery', MASYGAL_PLUGIN . 'js/jquery.justifiedGallery.min.js', array('jquery'), '3.8.0', true);
	}
endif; // end masygal_add_plugin_scripts
add_action('wp_enqueue_scripts', 'masygal_add_plugin_scripts');

if (!function_exists('masygal_add_plugin_admin_scripts')) :
	function masygal_add_plugin_admin_scripts()
	{
		wp_enqueue_media();
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('masy-gallery', MASYGAL_PLUGIN . 'js/masy-gallery.js', array('jquery', 'jquery-ui-sortable'), '1.7', true);
	}
endif; // end masygal_add_plugin_admin_scripts
add_action('admin_enqueue_scripts', 'masygal_add_plugin_admin_scripts');

include_once('inc/masygal-post-register.php');
include_once('inc/masygal-gallery-metabox.php');
include_once('inc/masygal-masonry-shortcode.php');
include_once('inc/masygal-justified-shortcode.php');
include_once('inc/masygal-doc-page.php');
