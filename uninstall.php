
<?php
/**
 * package: plugin_table_of_contents
 */

if (!define("WP_UNINSTALL_PLUGIN")) {
    exit;
}
$clear_data = get_posts(array('post_type' => '', 'numberpost' => -1));

foreach ($clear_data as $clear_datas) {
    wp_delete_post($clear_datas->ID, true);
}
