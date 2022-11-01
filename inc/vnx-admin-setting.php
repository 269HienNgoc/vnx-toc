<?php

/**ADD SETTING SECTION */
add_settings_section('vnx-first-section', null, admin_setting_toc(), 'work-plugin-options');

function admin_setting_toc()
{

  /**
   * ___ADD FIELD SETTING DISPLAY TOC___
   * Setting TOC scroll in sidebar
   * Field Enable
   * Field Convert ID
   * Field Heading
   * Field Type
   * Field Shortcut
   * Field Visibility
   */

  $vnx_admin_section = 'vnx-first-section';
  $vnx_link_page_plugin = 'work-plugin-options';

  add_settings_field('_vnx_toc_enable', 'Enable/DisEnable VNX T.O.C', 'enable_toc',  $vnx_link_page_plugin, $vnx_admin_section, array('theName' => '_vnx_toc_enable'));
  register_setting('toc_plugin', '_vnx_toc_enable',  'vnx_toc_check_box_enable');

  add_settings_field('_vnx_toc_position', 'Position in Post', 'position_toc',  $vnx_link_page_plugin, $vnx_admin_section, array('theName' => '_vnx_toc_position[]'));
  register_setting('toc_plugin', '_vnx_toc_position',  'vnx_toc_radio_position');

  add_settings_field('_vnx_toc_convertID', 'Convert Heading Into ID', 'checkbox_convertID', $vnx_link_page_plugin, $vnx_admin_section, array('theName' => '_vnx_toc_convertID'));
  register_setting('toc_plugin', '_vnx_toc_convertID', 'vnx_toc_check_box_converID');

  add_settings_field('_vnx_toc_heading', 'Heading', 'checkbox_Heading',  $vnx_link_page_plugin, $vnx_admin_section, array('theName' => '_vnx_toc_heading[]'));
  register_setting('toc_plugin', '_vnx_toc_heading', 'vnx_toc_check_box_heading');

  add_settings_field('_vnx_toc_posttype', 'Post Type', 'checkbox_Post_Type', $vnx_link_page_plugin, $vnx_admin_section, array('theName' => '_vnx_toc_posttype[]'));
  register_setting('toc_plugin', '_vnx_toc_posttype',  'vnx_toc_check_box_posttype');

  add_settings_field('_vnx_toc_shortcut', 'Shortcut', 'short_cut',  $vnx_link_page_plugin, $vnx_admin_section, array('theName' => '_vnx_toc_shortcut[]'));
  register_setting('toc_plugin', '_vnx_toc_shortcut', 'vnx_toc_check_box_shortcut');

  /**
   * FUNCTION CALL BLACK:
   * enable_toc()
   * position_toc()
   * checkbox_convertID()
   * checkbox_Heading()
   * checkbox_Post_Type()
   * short_cut()
   */

  function enable_toc($args)
  { ?>
    <div class="vnx-table-of-content-enable">
      <input type="checkbox" id="enabla" name="<?php echo $args['theName'] ?>" value="1" <?php checked(get_option($args['theName']), '1') ?>>
    </div>
  <?php
  }
  function position_toc($args)
  {
  ?>
    <div class="vnx-table-of-content-position">
      <input type="radio" id="top" name="<?php echo $args['theName'] ?>" value="top" <?php checked(in_array('top', get_option('_vnx_toc_position'), 1)) ?>>
      <label for="top"> Top of the post</label><br>
      <input type="radio" id="before1st" name="<?php echo $args['theName'] ?>" value="before-1st" <?php checked(in_array('before-1st', get_option('_vnx_toc_position'), 1)) ?>>
      <label for="before1st"> Before the 1st heading</label><br>
      <input type="radio" id="after1st" name="<?php echo $args['theName'] ?>" value="after-1st" <?php checked(in_array('after-1st', get_option('_vnx_toc_position'), 1)) ?>>
      <label for="after1st"> After the 1st heading</label><br>
      <input type="radio" id="before2st" name="<?php echo $args['theName'] ?>" value="before-2st" <?php checked(in_array('before-2st', get_option('_vnx_toc_position'), 1)) ?>>
      <label for="before2st"> Before the 2nd heading</label><br>
      <input type="radio" id="after2st" name="<?php echo $args['theName'] ?>" value="after-2st" <?php checked(in_array('after-2st', get_option('_vnx_toc_position'), 1)) ?>>
      <label for="after2st"> After the 2nd heading</label><br>
    </div>
  <?php
  }
  function checkbox_convertID($args)
  { ?>
    <div class=" vnx-table-of-content-convert-id">
      <input type="checkbox" id="convert_id" name="<?php echo $args['theName'] ?>" value="1" <?php checked(get_option($args['theName']), '1') ?>>
    </div>

  <?php
  }
  function checkbox_Post_Type($args)
  { ?>
    <div class="vnx-table-of-content-post-type">
      <input type="checkbox" id="post" name="<?php echo $args['theName'] ?>" value="post" <?php checked(in_array('post', get_option('_vnx_toc_posttype'), '1')) ?>>
      <label for="post"> Post</label><br>
      <input type="checkbox" id="page" name="<?php echo $args['theName'] ?>" value="page" <?php checked(in_array('page', get_option('_vnx_toc_posttype'), '1')) ?>>
      <label for="page"> Page</label><br>
    </div>
  <?php
  }
  function checkbox_Heading($args)
  {
  ?>
    <div class="vnx-table-of-content-heading">
      <input type="checkbox" id="h1" name="<?php echo $args['theName'] ?>" value="h1" <?php checked(in_array('h1', get_option('_vnx_toc_heading'), '1')) ?>>
      <label for="h1"> Heading 1</label><br>
      <input type="checkbox" id="h2" name="<?php echo $args['theName'] ?>" value="h2" <?php checked(in_array('h2', get_option('_vnx_toc_heading'), '1')) ?>>
      <label for="h2"> Heading 2</label><br>
      <input type="checkbox" id="h3" name="<?php echo $args['theName'] ?>" value="h3" <?php checked(in_array('h3', get_option('_vnx_toc_heading'), '1')) ?>>
      <label for="h3">Heading 3</label><br>
      <input type="checkbox" id="h4" name="<?php echo $args['theName'] ?>" value="h4" <?php checked(in_array('h4', get_option('_vnx_toc_heading'), '1')) ?>>
      <label for="h4"> Heading 4</label><br>
      <input type="checkbox" id="h5" name="<?php echo $args['theName'] ?>" value="h5" <?php checked(in_array('h5', get_option('_vnx_toc_heading'), '1')) ?>>
      <label for="h5">Heading 5</label><br>
      <input type="checkbox" id="h6" name="<?php echo $args['theName'] ?>" value="h6" <?php checked(in_array('h6', get_option('_vnx_toc_heading'), '1')) ?>>
      <label for="h6">Heading 6</label><br>
    <?php
  }
  function short_cut($args)
  {
    ?>
      <div class="vnx-table-of-content-heading">
        <input type="checkbox" id="q-min" name="<?php echo $args['theName'] ?>" value="qmin" <?php checked(in_array('qmin', get_option('_vnx_toc_shortcut'), '1'))  ?>>
        <label for="q_min"> Quick Min</label><br>
        <input type="checkbox" id="e-min" name="<?php echo $args['theName'] ?>" value="escmin" <?php checked(in_array('escmin', get_option('_vnx_toc_shortcut'), '1'))  ?>>
        <label for="e_min"> ESC Min</label><br>
        <input type="checkbox" id="e-max" name="<?php echo $args['theName'] ?>" value="entermax" <?php checked(in_array('entermax', get_option('_vnx_toc_shortcut'), '1'))  ?>>
        <label for="e_max">Enter Max</label><br>
    <?php
  }
}
