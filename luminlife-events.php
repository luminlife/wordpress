<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://lumin.life
 * @since             1.0.0
 * @package           Luminlife_Events
 *
 * @wordpress-plugin
 * Plugin Name:       Lumin.Life Events
 * Plugin URI:        https://github.com/luminlife/wordpress
 * Description:       Shortcodes to include Lumin.life web widgets
 * Version:           1.0.0
 * Author:            Lumin Arts Inc.
 * Author URI:        http://lumin.life
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       luminlife-events
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define("SHORTCODE_NAME", 'lumin_events');
define("LUMINEVENTS_URL",
  "https://s3-us-west-2.amazonaws.com/cdn.lumin.life/widgets/v2/event.widget.min.js");
define("LUMINEVENTS_STYLE_URL",
  "https://s3-us-west-2.amazonaws.com/cdn.lumin.life/widgets/v2/css/lumin_widget_styles.min.css");

function lumin_events_shortcode($attributes) {
  /*
   * We only do shortcodes on a page
   */
  if (!is_page()) {
    return "<p>'".SHORTCODE_NAME."' shortcode is only usable on a page</p>";
  }

  /*
   * Get any attributes for the shortcode
   */
  extract(shortcode_atts(array(
    'elem_id' => NULL,
    'venue_id'=> NULL,
    'limit' => NULL,
    'show_date_badge' => NULL,
    'disable_description' => NULL
  ), $attributes));

  $divId = 'luminlife-events';
  /*
   * User can give a unique identifier if there are using multiple per page
   */
  if (isset($elem_id)) {
    $divId .= "-{$elem_id}";
  }

  /*
   * Set up the options for the event widget
   */
  $optionsStr = "{";
  if (isset($venue_id)) {
    $optionsStr .= "venueId: ${venue_id},";
  }
  if (isset($limit)) {
    $optionsStr .= "limit: ${limit},";
  }
  if (isset($show_date_badge)) {
    $optionsStr .= "showCalendarDateBadge: ${show_date_badge},";
  }
  if (isset($disable_description)) {
    $optionsStr .= "disableEventDescription: ${disable_description},";
  }
  $optionsStr .= "}";

  wp_enqueue_script('luminlife-events_scripts');
  wp_add_inline_script('luminlife-events_scripts',
    "luminEvents('${divId}', ${optionsStr});");

  $return_string = "<div id='${divId}'></div>";
  return $return_string;
}

function register_shortcodes() {
  add_shortcode(SHORTCODE_NAME, 'lumin_events_shortcode');
}

add_action('init', 'register_shortcodes');

function register_scripts() {
  /*
   * Prepare the javascript to be enqueued later
   */
  wp_register_script('luminlife-events_scripts',
    esc_url_raw(LUMINEVENTS_URL),
    '',
    null);

  if (is_page()) {
    global $post;

    /*
     * Look for the shortcode on the page. If we have one,
     * we enqueue our widget stylesheet.
     */
    if (has_shortcode($post->post_content, SHORTCODE_NAME)) {
      wp_enqueue_style('luminlife-events_style',
        esc_url_raw(LUMINEVENTS_STYLE_URL),
        '',
        null);
    }
  }
}

add_action('wp_enqueue_scripts', 'register_scripts');
