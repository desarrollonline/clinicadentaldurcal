"use strict";

jQuery(function($) {

	var orionSvgs = new Object();


	orionSvgs.svg_1 = '<svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1440 36"><path fill="{{svgBgColor}}" d="M1437,0h-7H758c-1.65,0-3.955,0.955-5.121,2.121L722.12,32.879c-1.167,1.167-3.076,1.166-4.242,0	L687.121,2.122C685.955,0.955,683.65,0,682,0H10H3H0v3v30v3h3h7h1420h7h3v-3V3V0H1437z"/></svg>';
	orionSvgs.svg_13 = '<?xml version="1.0" encoding="UTF-8"?><svg enable-background="new 0 0 1440 72" version="1.1" viewBox="0 0 1440 72" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><g fill="{{svgBgColor}}"><path d="m360 11.993c120 0 240 10.085 360 30.251 34.031 5.344 68.06 9.904 102.09 13.731 85.97 9.673 171.94 14.536 257.91 14.536 111.63 0 223.26-8.164 334.89-24.473 8.37-1.222 16.743-2.48 25.113-3.795v-12.18s-18.02 2.781-27.041 4.099c-110.55 16.151-222.61 24.341-333.06 24.341-84.943 0-171.24-4.865-256.5-14.458-34.062-3.831-68.206-8.423-101.49-13.649-120.04-20.17-241.77-30.396-361.81-30.396-119.47 0-240.61 10.134-360.1 30.113v12.131c120-20.166 240-30.251 360-30.251z" opacity=".3"/><path d="m1080 70.512c-85.971 0-171.94-4.863-257.91-14.536-34.031-3.828-68.06-8.388-102.09-13.732-120-20.166-240-30.251-360-30.251s-240 10.085-360 30.251v29.756h1440v-29.756c-8.37 1.314-16.743 2.573-25.113 3.795-111.63 16.309-223.26 24.473-334.89 24.473z"/></g></svg>';
	/*check if is hex color */
	function is_hexadecimal(str) {
		var regexp = /^[0-9a-fA-F]+$/;
	    if (regexp.test(str)) {
	        return true;
	    } else {
	        return false;
	    }
	}

	/* create a row with separator */
	$.fn.createSvgFile = function(position, fileName, color){
		var row = $(this);
		var datatypeAttr = '';
		var separator = '';
		var placement = '';
		var svg = '';
		var zIndexAttr = '';
		var zIndexAttribute = ' style="z-index:2;"';
		
		var SvgPath = orionColors.svg_path;

		var dataType = $(this).attr('data-stretch-type');
		if (dataType != undefined) {
			if (dataType == 'full') {
				dataType = 'full-stretched';
			}
			datatypeAttr = 'data-stretch-type="'+ dataType + '"';
		}

		var zIndex = $(this).attr('data-z-index');
		if (zIndex != undefined) {
			zIndexAttribute = ' style="z-index:'+ (parseInt(zIndex) + 1) + '"';
		}

		if (position == 'bottom-svg-inside' || position == 'bottom-svg-outside') {
			placement = 'bottom';
		} else {
			placement = 'top';
		}

		var classList = $(this).attr('class').split(/\s+/);
		if (placement == 'bottom') {
			var newClassList = classList.filter(function (item) {
   				return item.indexOf("top-") !== 0;
   			});
		} else {
			var newClassList = classList.filter(function (item) {
	   			return item.indexOf("bottom-") !== 0;
			});			
		}
		newClassList = newClassList.filter(function(e) { return e !== 'middle_align' });
		newClassList = newClassList.filter(function(e) { return e !== 'bottom_align' });
		newClassList = newClassList.filter(function(e) { return e !== 'orion-equal-height' });
		newClassList = newClassList.filter(function(e) { return e !== 'full-screen-row' });
		newClassList = newClassList.join(' ');		

		// get svg object property
		var svgProperty = fileName.replace('-', '_');
		// console.log(svgProperty);
		if (orionSvgs.hasOwnProperty(svgProperty)) {

			separator = orionSvgs[svgProperty];
			if (separator.includes("{{svgBgColor}}")) {
				separator = separator.replace(/{{svgBgColor}}/g, color);
			}
			if (placement == 'top') {
				var svg = '<div class="' + newClassList + ' svg-wrap-animate svg-wrap wrap-top"' + datatypeAttr + zIndexAttribute + '><div class="svg-w">' + separator + '</div></div>';
				row.before(svg);
			} else {
				var svg = '<div class="' + newClassList + ' svg-wrap-animate svg-wrap wrap-bottom"' + datatypeAttr + zIndexAttribute + '><div class="svg-w">' + separator + '</div></div>';
				row.after(svg);
			}

		} else {
			var file = SvgPath + fileName + '.svg';
			// console.log(fileName);
			jQuery.get(file, function(separator) {

				if (separator.includes("{{svgBgColor}}")) {
					separator = separator.replace(/{{svgBgColor}}/g, color);
				}
				if (placement == 'top') {
					var svg = '<div class="' + newClassList + ' svg-wrap-animate svg-wrap wrap-top"' + datatypeAttr + zIndexAttribute + '><div class="svg-w">' + separator + '</div></div>';
					// $(svg).css('z-index', zIndexSeparator);
					row.before(svg);
				} else {
					var svg = '<div class="' + newClassList + ' svg-wrap-animate svg-wrap wrap-bottom"' + datatypeAttr + zIndexAttribute + '><div class="svg-w">' + separator + '</div></div>';
					// $(svg).css('z-index', zIndexSeparator);
					row.after(svg);
				}
			},'text');
		}
	}


	function getSvgColor(color) {
		/* returns hex color value */
		if(color == 'bg-content-bg' || color == undefined) {
			// check the site bg color
			var siteContentBgAtt = $('body').attr("data-site-content-bg");
			if (typeof siteContentBgAtt !== typeof undefined && siteContentBgAtt !== false) {
			    color = siteContentBgAtt;
			} else {
				color = '#fff';
			}
		}
		if ( ! is_hexadecimal(color)) {
			if (color in orionColors) {
				color = orionColors[color];
			}
		}
		return color;
	}

	$( document ).ready(function() {
		var oSeparator = $('.orion-separator:not(.svg-wrap)');
		var oSeparatorLength = oSeparator.length;

		$('.orion-separator:not(.svg-wrap)').each(function(index, element){
			var fileName = '';
			var position = '';
			var color = '';
			
			var classList = this.className.split(' ');
			var classArray = $(this).prop("classList");

			// top SVGs
			if (classList.includes("top-svg-inside") || classList.includes("top-svg-outside")) {
				var startsWithTop = classList.filter(/./.test.bind(/^top-svg-[0-9]/));

				var htmlClass = startsWithTop[0];
				var fileName = htmlClass.replace('top-','');
				if (classList.includes("top-svg-inside")) {
					position = 'top-svg-inside';
				} else {
					position = 'top-svg-outside';
				}
				var color = $(this).data('svgTopColor');
				var hex = getSvgColor(color);
				$(this).createSvgFile(position, fileName, hex);
			}
			// bottom SVGs
			if (classList.includes("bottom-svg-inside") || classList.includes("bottom-svg-outside")) {
				var startsWithTop = classList.filter(/./.test.bind(/^bottom-svg-[0-9]/));
				var htmlClass = startsWithTop[0];
				var fileName = htmlClass.replace('bottom-','');
				if (classList.includes("bottom-svg-inside")) {
					position = 'bottom-svg-inside';
				} else {
					position = 'bottom-svg-outside';
				}			
				var color = $(this).data('svgBottomColor');
				var hex = getSvgColor(color);
				$(this).createSvgFile(position, fileName, hex);
				
			}
			if (index === (oSeparatorLength - 1)) { 
				// we need to trigger resize and wait for page builder to set their streched rows.
				setTimeout(function() {
				 	$('.svg-wrap-animate').removeClass('svg-wrap-animate');
				 	$(window).trigger('resize');			
		   	   	}, 100);
		   	   	setTimeout(function() {
				 	$('.svg-wrap-animate').removeClass('svg-wrap-animate');
				 	$(window).trigger('resize');			
		   	   	}, 600);
	        }
		})
	})
})