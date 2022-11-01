<?php

/**ADD FILTER DISPLAY TOC*/
add_filter('the_content',  'display');

/**FUNCTION CALL BACK */
function display($content)
{
  $vnx_toc_enable_checkbox = get_option('_vnx_toc_enable') ?? '';
  $vnx_post_type_checkbox = get_option('_vnx_toc_posttype') ?? '';

  if ($vnx_toc_enable_checkbox == 1) {
    if ((is_single() && in_array('post', $vnx_post_type_checkbox)) or (is_page() && in_array('page', $vnx_post_type_checkbox))) {

      $vnx_toc_positon = get_option('_vnx_toc_display_position') ?? '';
      $box_toc = new VnxCustomContent();
      $boder_style = change_style_boder() ?? '';
      $icon_show = change_show_icon() ?? '';
      $sharp_style = change_style_sharp() ?? '';


      if (in_array('middleft', $vnx_toc_positon) == true) {
        $out = '<div class="vnx-middle-left" >';
        $out .=  '<button type="button" id="middleft" class="btn-display-middle-left ' . $icon_show . ' ' . $boder_style . ' ' . $sharp_style . ' "></button>';
        $out .= $box_toc->get_toc_contents($content, 'out-content', 'middleft');
        $out .= '</div>';
        $content = $out . $content;
      }
      if (in_array('middright', $vnx_toc_positon) == true) {
        $out = '<div class="vnx-middle-right">';
        $out .=  '<button type="button" id="middright" class="btn-display-middle-right ' . $icon_show . ' ' . $boder_style . ' ' . $sharp_style . ' " ></button>';
        $out .= $box_toc->get_toc_contents($content, 'out-content', 'middright');
        $out .= '</div>';
        $content = $out . $content;
      }
    }
  }
  return $content;
}
/**Function run when use option "Show Icon" in display */
function change_show_icon()
{
  $list_num = 'fas fa-list-ol';
  $menu = 'fas fa-bars';
  $vnx_toc_show_icon = get_option('_vnx_toc_display_show_icon') ?? '';
  if ('in-content' == true || 'out-content' == true) {
    if (in_array('numlist', $vnx_toc_show_icon)) {
      return $list_num;
    } else if (in_array('menu', $vnx_toc_show_icon)) {
      return $menu;
    }
  }
}
/**Function run when use option "Boder" in display */
function change_style_boder()
{
  $vnx_toc_boder = get_option('_vnx_toc_display_boder') ?? '';
  $boder_none = 'boder-none';
  $boder_thin = 'boder-thin';
  $boder_medium = 'boder-medium';
  $boder_bold = 'boder-bold';
  if (in_array('none', $vnx_toc_boder)) {
    return $boder_none;
  }
  if (in_array('thin', $vnx_toc_boder)) {
    return $boder_thin;
  }
  if (in_array('medium', $vnx_toc_boder)) {
    return $boder_medium;
  }
  if (in_array('bold', $vnx_toc_boder)) {
    return $boder_bold;
  }
}
/**Function run when use option "Sharp" in display */
function change_style_sharp()
{
  $sharp = get_option('_vnx_toc_display_sharp') ?? '';
  $sharp_crile = 'sharp-crile';
  $sharp_round = 'sharp-round';
  $sharp_square = 'sharp-square';
  if (in_array('crile', $sharp)) {
    return $sharp_crile;
  }
  if (in_array('round', $sharp)) {
    return $sharp_round;
  }
  if (in_array('square', $sharp)) {
    return $sharp_square;
  }
}
