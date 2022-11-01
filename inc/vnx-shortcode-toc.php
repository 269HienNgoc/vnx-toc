<?php
add_shortcode('VNX-TOC', 'add_shortcode_toc');
/**
 * Function run when use short code [VNX-TOC]
 */
function add_shortcode_toc($content = null)
{
    $content = get_the_content();
    $out = new VnxCustomContent();
    $return_shortcode_toc = do_shortcode($out->get_toc_contents($content, 'in-content', ''));
    return $return_shortcode_toc;
}
