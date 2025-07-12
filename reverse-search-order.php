<?php
/**
 * Plugin Name: Reverse Search Result Order
 * Description: Reverses the order of search results to show the oldest posts first.
 * Version: 1.0
 * Author: Erdész György
 */

function reverse_search_order_plugin($query) {
    if ($query->is_main_query() && !is_admin()) {
        // Reverse order for search results
        if ($query->is_search()) {
            $query->set('order', 'ASC'); // Oldest first
            $query->set('orderby', 'date'); // Ordered by post date
        }

        // Reverse order for monthly archives
        if ($query->is_archive() && $query->is_date()) {
            $query->set('order', 'ASC');
            $query->set('orderby', 'date');
        }
    }
}
add_action('pre_get_posts', 'reverse_search_order_plugin');
