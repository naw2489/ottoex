-- Run after DB import to fix WordPress URLs for local development.
-- This handles wp_options; use WP-CLI search-replace for serialized data.

UPDATE site_options SET option_value = 'http://localhost:8083' WHERE option_name = 'siteurl';
UPDATE site_options SET option_value = 'http://localhost:8083' WHERE option_name = 'home';
