# Restrict WordPress Feed

A WordPress plugin that removes posts with the "private" tag from all RSS feeds.

## Description

This plugin automatically filters out any posts that have been tagged with "private" (slug) or "Private" (name) from all RSS feeds, including:

- Main feed
- Category feeds
- Tag feeds
- Author feeds
- Custom post type feeds
- All feed formats (RSS 2.0, Atom, RDF)

## Installation

1. Upload the `restrict-wordpress-feed.php` file to your `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. The plugin will immediately start filtering posts with the "private" tag from all RSS feeds

## Requirements

- WordPress 6.8.3 or higher
- PHP 7.4 or higher

## How It Works

The plugin hooks into WordPress's `pre_get_posts` action and modifies feed queries to exclude posts tagged with "private". It uses WordPress's built-in `tax_query` functionality to filter posts by tag slug.

## Support

For issues, questions, or contributions, please visit the [GitHub repository](https://github.com/yourusername/restrict-wordpress-feed).

## License

GPL v2 or later

