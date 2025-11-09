<?php
/**
 * Plugin Name: Restrict WordPress Feed
 * Plugin URI: https://github.com/SenalKaranda/Wordpress-Restrict-Feed
 * Description: Removes posts with the "private" tag from all RSS feeds (main, category, tag, author, etc.) in all formats (RSS 2.0, Atom, RDF).
 * Version: 1.0.0
 * Author: Senal Karanda
 * Author URI: https://senal.dev
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wordpress-restrict-feed
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Filter out posts with "private" tag from RSS feeds
 *
 * @param WP_Query $query The WP_Query instance
 */
function restrict_wordpress_feed_exclude_private_tag($query) {
    // Only modify feed queries
    if (!$query->is_feed()) {
        return;
    }

    // Get the current tax_query or initialize empty array
    $tax_query = $query->get('tax_query');
    if (!is_array($tax_query)) {
        $tax_query = array();
    }

    // Add condition to exclude posts with "private" tag
    $tax_query[] = array(
        'taxonomy' => 'post_tag',
        'field'    => 'slug',
        'terms'    => 'private',
        'operator' => 'NOT IN',
    );

    // Set the modified tax_query
    $query->set('tax_query', $tax_query);
}
add_action('pre_get_posts', 'restrict_wordpress_feed_exclude_private_tag');

