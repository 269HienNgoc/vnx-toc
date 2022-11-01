<?php

/***
 * Class VnxCustomContent custom contents of TOC
 * Return void.
 */


class VnxCustomContent
{
  function __construct()
  {
    add_filter('the_content', array($this, 'vnx_custom_content_toc'));
    add_filter('the_content', array($this, 'auto_id_headings'));
  }

  /**
   * 
   */
  public function vnx_custom_content_toc($content)
  {
    $vnx_post_type_checkbox   = get_option('_vnx_toc_posttype') ?? '';
    $vnx_toc_enable_checkbox  = get_option('_vnx_toc_enable') ?? '';
    $vnx_toc_convertID        = get_option('_vnx_toc_convertID') ?? '';

    if ($vnx_toc_enable_checkbox == 1) {
      if ((is_single() && in_array('post', $vnx_post_type_checkbox)) or (is_page() && in_array('page', $vnx_post_type_checkbox))) {
        if ($vnx_toc_convertID == 1) {
          $out_content              = $this->get_toc_contents($content, 'in-content');
          $vnx_toc_position_in_post = get_option('_vnx_toc_position') ?? '';

          $featured                 = 'wp-block-vnx-featured-snippet';
          $p                        =  '/(<h\d)(.*?>.+?\<\/h\d\>)/i';
          $c                        = '#<div\s+class="wp-block-vnx-featured-snippet">([\s\S]*?)</div>#';
          $holder                   = "%HOLDER_TOC_VNX%";

          $ts = strpos($content, $featured);

          if ($ts != false) {
            if (is_single() && 'top' != $vnx_toc_position_in_post) {
              switch ($vnx_toc_position_in_post) {
                case in_array('before-1st', $vnx_toc_position_in_post): {
                    $content = preg_replace($p, $holder . '${0}', $content, 2);
                    $content = str_replace($holder,  $out_content, $content);
                    break;
                  }
                case in_array('after-1st', $vnx_toc_position_in_post): {
                    $content = preg_replace($p, '${0}' . $holder, $content, 2);
                    $content = str_replace($holder, $out_content, $content);
                    break;
                  }
                case in_array('before-2st', $vnx_toc_position_in_post): {
                    $content = preg_replace($p, $holder . '${0}', $content, 3);
                    $content = preg_replace('/' . $holder . '/', '', $content, 2);
                    $content = str_replace($holder, $out_content, $content);
                    break;
                  }
                case in_array('after-2st', $vnx_toc_position_in_post): {
                    $content = preg_replace($p, '${0}' . $holder, $content, 3);
                    $content = preg_replace('/' . $holder . '/', '', $content, 2);
                    $content = str_replace($holder, $out_content, $content);
                    break;
                  }
                default: {
                    $content = $out_content . $content;
                  }
              }
            } else {
              $content = $out_content  . $content;
            }
          } else {
            if (is_single() && 'top' != $vnx_toc_position_in_post) {
              switch ($vnx_toc_position_in_post) {
                case in_array('before-1st', $vnx_toc_position_in_post): {
                    $content = preg_replace($p, $holder . '${0}', $content, 1);
                    $content = str_replace($holder,  $out_content, $content);
                    break;
                  }
                case in_array('after-1st', $vnx_toc_position_in_post): {
                    $content = preg_replace($p, '${0}' . $holder, $content, 1);
                    $content = str_replace($holder, $out_content, $content);
                    break;
                  }
                case in_array('before-2st', $vnx_toc_position_in_post): {
                    $content = preg_replace($p, $holder . '${0}', $content, 2);
                    $content = preg_replace('/' . $holder . '/', '', $content, 1);
                    $content = str_replace($holder, $out_content, $content);
                    break;
                  }
                case in_array('after-2st', $vnx_toc_position_in_post): {
                    $content = preg_replace($p, '${0}' . $holder, $content, 2);
                    $content = preg_replace('/' . $holder . '/', '', $content, 1);
                    $content = str_replace($holder, $out_content, $content);
                    break;
                  }
                default: {
                    $content = $out_content . $content;
                  }
              }
            } else {
              $content = $out_content  . $content;
            }
          }
        }
      }
    }

    return $content;
  }



  /**
   * Function get box content toc
   */
  public function get_toc_contents($content, $container = '', $position = '')
  {
    $change_icon = change_show_icon();
    $vnx_toc_heading_checkbox = get_option('_vnx_toc_heading') ?? '';
    $title = get_option('_vnx_toc_display_title') ?? '';
    $list_head = $this->get_list_heading_content($vnx_toc_heading_checkbox, $content);
    $scroll_heading = $this->handle_scroll_heading($list_head);
    if ($container == 'out-content') {
      $out = '<div class="vnx-toc-box-' . $container . '  ' . $position . ' ">
        <div class="vnx-toc-header-' . $container . ' ' . $change_icon . ' ">
        <span class="vnx-header-title-' . $container . '">' . $title . '</span>
        </div>
        <ul class="vnx-toc-head-list-' . $container . '">';
      foreach ($scroll_heading as $val) {
        $out .= '<li class="vnx-toc-item out-content"  >' . $val . '</li>';
      }
    }
    if ($container == 'in-content') {
      $out = '<div class="vnx-toc-box-' . $container . '">
    <div class="vnx-toc-header-' . $container . ' ' . $change_icon . ' ">
    <span class="vnx-header-title-' . $container . '">' . $title . '</span>
    </div>
    <ul class="vnx-toc-head-list-' . $container . '">';
      foreach ($scroll_heading as $val) {
        $out .= '<li class="vnx-toc-item"  >' . $val . '</li>';
      }
    }

    $out .= '</ul> </div>';
    return $out;
  }
  /**
   * Function auto convert heading -> id
   */
  public function auto_id_headings($content)
  {
    $content = preg_replace_callback('/(\<h[1-6](.*?))\>(.*?)(<\/h[1-6]>)/i', function ($matches) {
      if (!stripos($matches[0], 'id=')) :
        $matches[0] = $matches[1] . $matches[2] . ' id="' . sanitize_title($matches[3]) . '">' . $matches[3] . $matches[4];
      endif;
      return $matches[0];
    }, $content);
    return $content;
  }

  /**
   * Function scroll -> heading.
   */
  function handle_scroll_heading($list_array)
  {

    foreach ($list_array as $key_list => $val_list) {
      $text_content_tag = mb_strtolower(strip_tags($val_list[0]));
      $text_content_slug = sanitize_html_class(sanitize_title(preg_replace('/[\@\.\;\-\" "]+/', '-', trim($text_content_tag))));
      $tag_head_open = "<" . $val_list[1];
      $tag_head_close = "</" . $val_list[1] . ">";
      $tag_open = '<a href="#' . $text_content_slug . '" class= "vnx-toc-sub-' . $val_list[1] . ' vnx-toc-sub"';
      $tag_close = '</a>';
      $id_string = str_replace($tag_head_open, $tag_open, $val_list[0]);
      $id_string = str_replace($tag_head_close, $tag_close, $id_string);
      $list_array[$key_list] = $id_string;
    }
    return $list_array;
  }
  /**
   * Function get list heading in content.
   */
  function get_list_heading_content($head_check_box, $content)
  {
    $arr = array();
    $pattern = '/(\<h[1-6](.*?))\>(.*?)(<\/h[1-6]>)/i';
    preg_match_all($pattern, $content, $head);
    foreach ($head[0] as $key => $val_head) {
      //  var_dump($head[$key][0]);
      $tag = substr($val_head, 1, 2);
      if (in_array($tag, $head_check_box)) {
        $arr_1['title'] = $val_head;
        $arr_2['tag'] = $tag;
        array_push($arr, [$arr_1['title'], $arr_2['tag']]);
      }
    }
    return $arr;
  }

  /**Khong hieu cho nay --- khong hieu cach no hoat dong -- DE QUY ??????*/
  function buildtree($elements = array(), $parent_id = 0)
  {
    $branch = array();
    $tag_parent = substr($elements[$parent_id][1], 1, 1);
    for ($i = $parent_id; $i < count($elements); $i++) {
      $element = $elements[$i];
      $tag_children = substr($element[1], 1, 1);
      if ($tag_parent < $tag_children) {
        $children[$i] = $element;
      }
    }
    return $branch;
  }
}
