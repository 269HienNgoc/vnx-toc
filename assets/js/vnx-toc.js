

jQuery(document).ready(function () {

  /**
   * DATA GET_OPTION DISPLAY - ADMIN => data.php
   */
  //display
  var position = data.position;
  var horizontal = new Number(data.horizontal);
  var showicon = data.showicon;
  var stylelist = data.stylelist;
  var iconsize = data.iconsize;
  var sharp = data.sharp;
  var bodericon = data.bodericon;
  var width = data.width;
  var heigth = data.heigth;
  var effec = data.effec;
  var visibillity = data.visibillity;
  var colorpicker = data.color;
  var shortcut = data.shortcut;
  // btn - class
  var el_btn_left = jQuery('.btn-display-middle-left');
  var el_btn_right = jQuery('.btn-display-middle-right');
  var el_boxtoc = jQuery('.vnx-toc-box-out-content');
  var el_headerbox = jQuery('.vnx-toc-header-out-content');

  /**
   *remove class toc in class featured-snippet
   */
  jQuery('.wp-block-vnx-featured-snippet').find('.vnx-toc-box-in-content').remove();

  // vnx-toc-box-in-content
  jQuery('.vnx-toc-header-in-content').click(function () {
    jQuery(this).parent().find('.vnx-toc-header-in-content').toggleClass('vnx-active');
    jQuery(this).parent().find('.vnx-toc-head-list-in-content').slideToggle();
  })

  jQuery('.vnx-toc-box-in-content').css({
    'border-color': colorpicker[3],
  })
  jQuery('.vnx-toc-head-list-in-content').css({
    'background': colorpicker[6],
  })
  jQuery('ul.vnx-toc-head-list-out-content').css({
    'background': colorpicker[6],
    'height': heigth,
    'width': width,
  })

  jQuery('a.vnx-toc-sub').css({
    'color': colorpicker[7]
  })


  jQuery('a.vnx-toc-sub').hover(function () {
    jQuery(this).css({ 'color': colorpicker[8] })
  }, function () {
    jQuery(this).css({ 'color': colorpicker[7] })
  })


  /** */

  /**LIST STYLE */
  if (jQuery.inArray('none', stylelist) != -1) {
    jQuery('.vnx-toc-box-in-content ul > li').addClass('list_none')
    jQuery('.vnx-toc-box-out-content ul > li').addClass('list_none')
  }
  if (jQuery.inArray('number', stylelist) != -1) {
    jQuery('.vnx-toc-box-in-content ul > li').addClass('list_number')
    jQuery('.vnx-toc-box-out-content ul > li').addClass('list_number')
  }
  if (jQuery.inArray('decimal', stylelist) != -1) {
    jQuery('.vnx-toc-box-in-content ul > li').addClass('list_decimal')
    jQuery('.vnx-toc-box-out-content ul > li').addClass('list_decimal')
  }
  if (jQuery.inArray('cirle', stylelist) != -1) {
    jQuery('.vnx-toc-box-in-content ul > li').addClass('list_cirle')
    jQuery('.vnx-toc-box-out-content ul > li').addClass('list_cirle')
  }

  /**
   * Shortcut
   */
  jQuery(document).keydown(function (e) {
    var key = e.which;
    if (key == 13) {
      jQuery(el_boxtoc).show();
    }
    if (key == 27) {
      jQuery(el_boxtoc).hide();
    }
  });
  //QickMin
  // jQuery(document).keydown(function (e) {
  //   var key = e.which;
  //   if (jQuery.inArray('entermax', shortcut) && key == 13) {
  //     jQuery(el_boxtoc).show()
  //   }
  //   if (jQuery.inArray('escmin', shortcut) && key == 27) {
  //     jQuery(el_boxtoc).hide()
  //   }
  // });
  // jQuery(window).click(function () {
  //   jQuery(el_boxtoc).hide()
  // });
  // jQuery(el_boxtoc).click(function (e) {
  //   e.stopPropagation()
  // })

  /**
   * Effec Display: None, Zoom
   */
  if (effec != 1) {
    el_btn_left.click(function () {
      el_boxtoc.removeClass('zoomeffec')
      el_boxtoc.show();
    })
    el_btn_right.click(function () {
      el_boxtoc.removeClass('zoomeffec')
      jQuery(el_boxtoc).show();
    })
    el_headerbox.click(function () {
      jQuery(el_boxtoc).hide()
    })
  } else {
    el_btn_left.click(function () {
      el_boxtoc.addClass('zoomeffec')
      el_boxtoc.toggle(400);
    })
    el_btn_right.click(function () {
      el_boxtoc.addClass('zoomeffec')
      el_boxtoc.toggle(400);
    })
    el_headerbox.click(function () {
      el_boxtoc.toggle(400)
    })
  }

  jQuery('.vnx-toc-header-out-content').css({
    "font-size": iconsize + 'px',
    "color": colorpicker[4],
    "background": colorpicker[5],
  })
  jQuery('.vnx-header-title-out-content').css({
    "font-size": iconsize + 'px',
  })
  jQuery('#middleft').css({
    "font-size": iconsize + 'px',
    "color": colorpicker[0],
    "border-color": colorpicker[2],
    "background-color": colorpicker[1]
  })
  jQuery('#middright').css({
    "font-size": iconsize + 'px',
    "color": colorpicker[0],
    "border-color": colorpicker[2],
    "background-color": colorpicker[1]
  })
  jQuery('.vnx-toc-header-in-content::before').css({
    "font-size": iconsize + 'px',
  })
  jQuery('.vnx-toc-header-in-content').css({
    "font-size": iconsize + 'px',
    "color": colorpicker[4],
    "background": colorpicker[5],
  })
  jQuery('.vnx-header-title-in-content').css({
    "font-size": iconsize + 'px',
  })
  /**
   * Active Link.
   */
  var topMenu = jQuery(".vnx-toc-box-out-content"),
    menuItems = topMenu.find("a"),
    scrollItems = menuItems.map(function () {
      var item = jQuery(jQuery(this).attr("href"));
      if (item.length) { return item; }
    });

  jQuery(window).scroll(function () {
    var fromTop = jQuery(this).scrollTop();
    var cur = scrollItems.map(function () {
      if (jQuery(this).offset().top < fromTop)
        return this;
    });
    cur = cur[cur.length - 1];
    var id = cur && cur.length ? cur[0].id : "";
    menuItems
      .parent().removeClass("active").css({ 'background': colorpicker[6] }).end().filter("[href='#" + id + "']").parent().addClass("active").css({ 'background': colorpicker[10] })

    //Scroll Hide/Show Button
    var scrollbtn = jQuery(window).scrollTop()
    scroll_btn(scrollbtn)
  })
  /**
  * Function Scroll Hide/Show Button
  */
  var scroll_btn = function (target) {
    if (target >= 1000) {
      el_btn_left.fadeIn()
      el_btn_right.fadeIn()
    } else {
      el_btn_left.fadeOut()
      el_btn_right.fadeOut()
    }
  }



  jQuery(window).scroll(function () {
    /**
     * Horizontal, Width/Height Boder
     */
    var w = jQuery(window).width();
    var content = jQuery('.article-content').offset().left;
    var middleft = jQuery('.vnx-middle-left');
    var middright = jQuery('.vnx-middle-right');

    jQuery('#middleft').addClass('btn-zoom')


    if (w >= 1200) {
      if (jQuery('#middleft').attr('checked', true)) {
        middleft.css({
          'right': w - content + horizontal + 'px',
          'left': 'auto',
        })
        jQuery('.middleft').css({
          'right': w - content + horizontal + 'px',
          'left': 'auto',
          'border-color': colorpicker[3]
        });
      }
      if (jQuery('#middright').attr('checked', true)) {
        middright.css({
          'right': 'auto',
          'left': w - content + horizontal + 'px',
        })
        jQuery('.middright').css({
          'right': 'auto',
          'left': w - content + horizontal + 'px',
          'border-color': colorpicker[3]
        });
      }
    }
  }).trigger('scroll')

});