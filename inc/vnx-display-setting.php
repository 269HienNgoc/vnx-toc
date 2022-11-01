<?php

/*___ADD SETTING SECTION___*/
add_settings_section('vnx-display-section', null, display_setting_toc(), 'display-work-plugin-options');

function display_setting_toc()
{
  $vnx_section_display = 'vnx-display-section';
  $vnx_link_display_page_plugin = 'display-work-plugin-options';

  /**
   * ___ADD FIELD SETTING DISPLAY TOC___
   * Setting TOC scroll in sidebar
   * Field input Title
   * Field position
   * Field Horizontanl
   * Field Sharp
   * Field Boder
   * Field Effec
   * Field Visibility
   * Field Active Link
   * Field Show Icon
   */

  add_settings_field('_vnx_toc_display_title', 'Title', 'display_title',  $vnx_link_display_page_plugin, $vnx_section_display, array('theName' => '_vnx_toc_display_title'));
  register_setting('display_toc_plugin', '_vnx_toc_display_title',  'vnx_toc_title');

  add_settings_field('_vnx_toc_display_position', 'Position', 'display_position',  $vnx_link_display_page_plugin, $vnx_section_display, array('theName' => '_vnx_toc_display_position[]'));
  register_setting('display_toc_plugin', '_vnx_toc_display_position',  'vnx_toc_position');

  add_settings_field('_vnx_toc_display_horizontal', 'Horizontal Offset', 'display_horizontal',  $vnx_link_display_page_plugin, $vnx_section_display, array('theName' => '_vnx_toc_display_horizontal'));
  register_setting('display_toc_plugin', '_vnx_toc_display_horizontal',  'vnx_toc_horizontal');

  add_settings_field('_vnx_toc_display_show_icon', 'Show Icon', 'display_showicon',  $vnx_link_display_page_plugin, $vnx_section_display, array('theName' => '_vnx_toc_display_show_icon[]'));
  register_setting('display_toc_plugin', '_vnx_toc_display_show_icon',  'vnx_toc_icon_size');

  add_settings_field('_vnx_toc_display_style_list', 'Style List', 'display_stylelist',  $vnx_link_display_page_plugin, $vnx_section_display, array('theName' => '_vnx_toc_display_style_list[]'));
  register_setting('display_toc_plugin', '_vnx_toc_display_style_list',  'vnx_toc_icon_size');

  add_settings_field('_vnx_toc_display_iconsize', 'Icon size', 'display_iconsize',  $vnx_link_display_page_plugin, $vnx_section_display, array('theName' => '_vnx_toc_display_iconsize'));
  register_setting('display_toc_plugin', '_vnx_toc_display_iconsize',  'vnx_toc_icon_size');

  add_settings_field('_vnx_toc_display_sharp', 'Sharp', 'display_sharp',  $vnx_link_display_page_plugin, $vnx_section_display, array('theName' => '_vnx_toc_display_sharp[]'));
  register_setting('display_toc_plugin', '_vnx_toc_display_sharp',  'vnx_toc_sharp');

  add_settings_field('_vnx_toc_display_boder', 'Boder Icon', 'display_boder',  $vnx_link_display_page_plugin, $vnx_section_display, array('theName' => '_vnx_toc_display_boder[]'));
  register_setting('display_toc_plugin', '_vnx_toc_display_boder',  'vnx_toc_boder');

  add_settings_field('_vnx_toc_display_width', 'Width Boder Box TOC', 'boder_width',  $vnx_link_display_page_plugin, $vnx_section_display, array('theName' => '_vnx_toc_display_width'));
  register_setting('display_toc_plugin', '_vnx_toc_display_width',  'vnx_toc_width');

  add_settings_field('_vnx_toc_display_heigth', 'Heigth Boder Box TOC', 'boder_heigth',  $vnx_link_display_page_plugin, $vnx_section_display, array('theName' => '_vnx_toc_display_heigth'));
  register_setting('display_toc_plugin', '_vnx_toc_display_heigth',  'vnx_toc_heigth');

  add_settings_field('_vnx_toc_display_effec', 'Effec', 'display_effec',  $vnx_link_display_page_plugin, $vnx_section_display, array('theName' => '_vnx_toc_display_effec'));
  register_setting('display_toc_plugin', '_vnx_toc_display_effec',  'vnx_toc_effec');

  add_settings_field('_vnx_toc_display_active_link', 'Active Link ', 'display_active_link',  $vnx_link_display_page_plugin, $vnx_section_display, array('theName' => '_vnx_toc_display_active_link'));
  register_setting('display_toc_plugin', '_vnx_toc_display_active_link',  'vnx_toc_active_link');

  add_settings_field('_vnx_toc_display_visibility', 'Initial Visibility', 'display_visibility',  $vnx_link_display_page_plugin, $vnx_section_display, array('theName' => '_vnx_toc_display_visibility[]'));
  register_setting('display_toc_plugin', '_vnx_toc_display_visibility',  'vnx_toc_visibility');

  add_settings_field('_vnx_toc_display_color', 'Color', 'display_color',  $vnx_link_display_page_plugin, $vnx_section_display, array('theName' => '_vnx_toc_display_color[]'));
  register_setting('display_toc_plugin', '_vnx_toc_display_color',  'vnx_toc_color');



  /**
   * ___FUNCTION CALL BACK ADD SETTING FIELD___
   * dislpay_title()
   * display_position()
   * display_horizontal()
   * display_showicon()
   * display_stylelist
   * display_iconsize()
   * display_sharp()
   * display_boder()
   * boder_width()
   * boder_heigth()
   * display_effec()
   * display_active_link()
   * display_visibility()
   * display_color()
   */

  function display_title($args)
  { ?>
    <div class="vnx-toc-display-title">
      <input type="text" name="<?php echo $args['theName'] ?>" value=" <?php echo esc_attr(get_option('_vnx_toc_display_title')); ?>">
    </div>
  <?php
  }

  function display_position($args)
  { ?>
    <div class="vnx-toc-display-position">
      <input type="radio" name="<?php echo $args['theName'] ?>" value="middleft" <?php checked(in_array('middleft', get_option('_vnx_toc_display_position')), true) ?>>Middle Left</input>
      <input type="radio" name="<?php echo $args['theName'] ?>" value="middright" <?php checked(in_array('middright', get_option('_vnx_toc_display_position')), true) ?>>Middle Right</input>
    </div>
  <?php
  }

  function display_horizontal($args)
  {
  ?>
    <div class="vnx-toc-display-horizontal">
      <input type="number" id="horizontal" name="<?php echo $args['theName'] ?>" value="<?php echo get_option($args['theName']) ?>"> px</input>
    </div>
  <?php
  }

  function display_showicon($args)
  {
  ?>
    <div class="vnx-toc-display-position">
      <input type="radio" name="<?php echo $args['theName'] ?>" value="numlist" <?php checked(in_array('numlist', get_option('_vnx_toc_display_show_icon')), true) ?>>List Number</input>
      <input type="radio" name="<?php echo $args['theName'] ?>" value="menu" <?php checked(in_array('menu', get_option('_vnx_toc_display_show_icon')), true) ?>>Menu</input>
    </div>
  <?php
  }

  function display_stylelist($args)
  {
  ?>
    <div class="vnx-toc-display-position">
      <input type="radio" name="<?php echo $args['theName'] ?>" value="none" <?php checked(in_array('none', get_option('_vnx_toc_display_style_list')), true) ?>>None</input>
      <input type="radio" name="<?php echo $args['theName'] ?>" value="number" <?php checked(in_array('number', get_option('_vnx_toc_display_style_list')), true) ?>>Number</input>
      <input type="radio" name="<?php echo $args['theName'] ?>" value="decimal" <?php checked(in_array('decimal', get_option('_vnx_toc_display_style_list')), true) ?>>Decimal</input>
      <input type="radio" name="<?php echo $args['theName'] ?>" value="cirle" <?php checked(in_array('cirle', get_option('_vnx_toc_display_style_list')), true) ?>>Cirle</input>
    </div>
  <?php
  }

  function display_iconsize($args)
  { ?>
    <div class="vnx-toc-display-icon-size">
      <input type="number" id="input-size-icon" name="<?php echo $args['theName'] ?>" value="<?php echo get_option($args['theName']) ?>"> px</input>
    </div>
  <?php
  }

  function display_sharp($args)
  { ?>

    <div class="vnx-toc-display-sharp">
      <input type="radio" name="<?php echo $args['theName'] ?>" value="crile" <?php checked(in_array('crile', get_option('_vnx_toc_display_sharp')), true) ?>> Crile</input>
      <input type="radio" name="<?php echo $args['theName'] ?>" value="round" <?php checked(in_array('round', get_option('_vnx_toc_display_sharp')), true) ?>> Round</input>
      <input type="radio" name="<?php echo $args['theName'] ?>" value="square" <?php checked(in_array('square', get_option('_vnx_toc_display_sharp')), true) ?>> Square</input>
    </div>
  <?php
  }

  function display_boder($args)
  { ?>

    <div class="vnx-toc-display-boder">
      <input type="radio" name="<?php echo $args['theName'] ?>" value="none" <?php checked(in_array('none', get_option('_vnx_toc_display_boder')), true) ?>> None</input>
      <input type="radio" name="<?php echo $args['theName'] ?>" value="thin" <?php checked(in_array('thin', get_option('_vnx_toc_display_boder')), true) ?>> Thin</input>
      <input type="radio" name="<?php echo $args['theName'] ?>" value="medium" <?php checked(in_array('medium', get_option('_vnx_toc_display_boder')), true) ?>> Medium</input>
      <input type="radio" name="<?php echo $args['theName'] ?>" value="bold" <?php checked(in_array('bold', get_option('_vnx_toc_display_boder')), true) ?>> Bold</input>
    </div>
  <?php
  }

  function boder_width($args)
  {
  ?>
    <input type="number" name="<?php echo $args['theName'] ?>" value="<?php echo get_option('_vnx_toc_display_width') ?>">px</input>
  <?php
  }
  function boder_heigth($args)
  {
  ?>
    <input type="number" name="<?php echo $args['theName'] ?>" value="<?php echo  get_option('_vnx_toc_display_heigth') ?>">px</input>
  <?php
  }

  function display_effec($args)
  {
  ?>
    <div class="vnx-toc-display-effec">
      <input type="checkbox" name="<?php echo $args['theName'] ?>" value="1" <?php checked('1', get_option($args['theName']), 1) ?>>Zoom</input>
    </div>
  <?php
  }
  function display_active_link($args)
  {
  ?>
    <div class="vnx-toc-display-active-link">
      <input type="checkbox" name="<?php echo $args['theName'] ?>" value="1" <?php checked('1', get_option($args['theName']), 1) ?>>Bounce to Right</input>
    </div>
  <?php
  }
  function display_visibility($args)
  {
  ?>
    <div class="vnx-toc-display-visibility">
      <input type="radio" name="<?php echo $args['theName'] ?>" value="show" <?php checked(in_array('show', get_option('_vnx_toc_display_visibility')), true) ?>> Show</input>
      <input type="radio" name="<?php echo $args['theName'] ?>" value="hide" <?php checked(in_array('hide', get_option('_vnx_toc_display_visibility')), true) ?>> Hide</input>
    </div>
  <?php
  }

  function display_color($args)
  {
    $colorpicker = get_option('_vnx_toc_display_color');
  ?>
    <script>
      jQuery(document).ready(function() {
        jQuery('#btn-color').wpColorPicker()
        jQuery('#backgr-color').wpColorPicker()
        jQuery('#boder-color').wpColorPicker()
        jQuery('#content-btn-color').wpColorPicker()
        jQuery('#content-header-color').wpColorPicker()
        jQuery('#header-backg-color').wpColorPicker()
        jQuery('#content-list-backgr-color').wpColorPicker()
        jQuery('#content-link-color').wpColorPicker()
        jQuery('#link-hover-color').wpColorPicker()
        jQuery('#link-active-color').wpColorPicker()
        jQuery('#active-backgr-color').wpColorPicker()
      });
    </script>
    <div class="vnx-toc-display-color">
      <input type="text" name="<?php echo $args['theName'] ?>" id="btn-color" value="<?php echo $colorpicker[0] ?>">Trigger Button color</input></br>
      <input type="text" name="<?php echo $args['theName'] ?>" id="backgr-color" value="<?php echo $colorpicker[1] ?>">Trigger Background color</input></br>
      <input type="text" name="<?php echo $args['theName'] ?>" id="boder-color" value="<?php echo $colorpicker[2] ?>">Trigger Border color</input></br>
      <input type="text" name="<?php echo $args['theName'] ?>" id="content-btn-color" value="<?php echo $colorpicker[3] ?>">Contents Button color</input></br>
      <input type="text" name="<?php echo $args['theName'] ?>" id="content-header-color" value="<?php echo $colorpicker[4] ?>">Contents Header color</input></br>
      <input type="text" name="<?php echo $args['theName'] ?>" id="header-backg-color" value="<?php echo $colorpicker[5] ?>">Contents Header Background color</input></br>
      <input type="text" name="<?php echo $args['theName'] ?>" id="content-list-backgr-color" value="<?php echo $colorpicker[6] ?>">Contents List Background color</input></br>
      <input type="text" name="<?php echo $args['theName'] ?>" id="content-link-color" value="<?php echo $colorpicker[7] ?>">Contents Link color</input></br>
      <input type="text" name="<?php echo $args['theName'] ?>" id="link-hover-color" value="<?php echo $colorpicker[8] ?>">Contents Link Hover color</input></br>
      <input type="text" name="<?php echo $args['theName'] ?>" id="link-active-color" value="<?php echo $colorpicker[9] ?>">Contents Link Active color</input></br>
      <input type="text" name="<?php echo $args['theName'] ?>" id="active-backgr-color" value="<?php echo $colorpicker[10] ?>">Contents Link Active Backgroud color</input>
    </div>
<?php }
}
