"use strict";

jQuery(document).ready(function ($) {
  /* Toggle Post Format Meta Box
  ============================================================ */
  function dentalia_toggle_post_format_meta_box() {
    var prefix = 'dentalia_post_format_';
    var formats = ['video', 'audio', 'gallery', 'link', 'image', 'aside', 'quote', 'status', 'chat'];
    var active_format = $('input:radio[name=post_format]:checked').val();
    formats.forEach(function (format) {
      var meta_box = $('#' + prefix + format);

      if (format != active_format) {
        meta_box.hide();
      } else {
        meta_box.show();
      }
    });
  }

  dentalia_toggle_post_format_meta_box();
  $('input:radio[name=post_format]').change(dentalia_toggle_post_format_meta_box);
  /* remove anoying revslider activate message */

  $('.plugins-php a[href^="http://revolution.themepunch"]').closest('.plugin-update-tr').css("display", "none");

 $(document).on('change', 'select.siteorigin-widget-input', function () {
    if ($('option[value="colorpicker"]', this).length > 0) {
      if ($(this).val() === 'colorpicker') {
        $(this).parent('.siteorigin-widget-field').next('.siteorigin-widget-field').slideDown();
      } else {
        $(this).parent('.siteorigin-widget-field').next('.siteorigin-widget-field').slideUp();
      }
    }
  }); 
  // uncomment for debugging: this to check all the events:
  // console.log($._data(document, "events")); 


  /* PB row color picker */
  function orionToggleColorPicker() {
    /* does not work on open_dialog : */
    $('option[value="colorpicker"]', document).each(function () {
      var colorPickerParent = $(this).parent('select.siteorigin-widget-input');

      if (colorPickerParent.val() === 'colorpicker') {
        colorPickerParent.parent('.siteorigin-widget-field').next('.siteorigin-widget-field').slideDown();
      } else {
        colorPickerParent.parent('.siteorigin-widget-field').next('.siteorigin-widget-field').slideUp();
      }
    });
  }
  $(document).on('sowsetupform', orionToggleColorPicker);

  /* theme colors and iris colorpicker */
  function orionBgColorRadio() {
    var bgRadio = $('input[id*=orion_theme_colors_bg]:checked, input[id*=orion_theme_colors_separator]:checked' );
    bgRadio.each(function(){
      var radioWrapper = $(this).closest('.style-field-wrapper');
      var soBgColorPicker = $(radioWrapper).next('.style-field-wrapper');
      var parentSection = radioWrapper.closest('.style-section-fields');
      var soBgopacityField = parentSection.find('input[name="style[bg_opacity]"]').closest('.style-field-wrapper');
      var irisColorPicker = $(soBgColorPicker).find('.so-wp-color-field');
      if ($(this).attr('value') == 'custom') {
        soBgColorPicker.show();
        soBgopacityField.show();
      } else {
        irisColorPicker.val('').change(); 
        soBgColorPicker.hide();
        soBgopacityField.hide();
      }      
    })

  }
  $(document).on('mouseenter', '.so-panels-dialog-row-edit, .so-sidebar .style-field-radio, .so-panels-dialog-row-edit .so-sidebar', function() {
    orionBgColorRadio();
  })
  $(document).on('change', 'input[id*=orion_theme_colors_bg], input[id*=orion_theme_colors_separator]', function () {
    orionBgColorRadio();
  })    
});