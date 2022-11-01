<?php
add_action('template_redirect', 'data_get_option');
function data_get_option()
{
    $script_vars      = array(
        //display
        'position'    => get_option('_vnx_toc_display_position') ?? '',
        'horizontal'  => get_option('_vnx_toc_display_horizontal') ?? '',
        'showicon'    => get_option('_vnx_toc_display_show_icon') ?? '',
        'stylelist'   => get_option('_vnx_toc_display_style_list') ?? '',
        'iconsize'    => get_option('_vnx_toc_display_iconsize') ?? '',
        'sharp'       => get_option('_vnx_toc_display_sharp') ?? '',
        'bodericon'   => get_option('_vnx_toc_display_boder') ?? '',
        'width'       => get_option('_vnx_toc_display_width') ?? '',
        'heigth'      => get_option('_vnx_toc_display_heigth') ?? '',
        'effec'       => get_option('_vnx_toc_display_effec') ?? '',
        'visibillity' => get_option('_vnx_toc_display_visibility') ?? '',
        'color'       => get_option('_vnx_toc_display_color') ?? '',
        //Admin
        'shortcut'    => get_option('_vnx_toc_shortcut') ?? '',
    );

    wp_enqueue_script('my_script', '/assets/js/vnx-toc.js', array('jquery'), true);
    wp_localize_script('my_script', 'data', $script_vars);
}
