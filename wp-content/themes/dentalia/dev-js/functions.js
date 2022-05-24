"use strict";

function isGutenbergActive() {
    return typeof wp !== 'undefined' && typeof wp.blocks !== 'undefined';
}

jQuery(function($) { 

if (isGutenbergActive()) {
	window._wpLoadBlockEditor.then( setTimeout(orionOwl , 100) );
}

if ($('body').hasClass('one-page')) {
	var onepageLinks = $('.site-header .nav-container a[href*="#"]:not([href="#"]):not([href*="="])');
	
	if ((onepageLinks).length > 1 ) {
        $('.nav-container a[href*="#"]:not([href="#"]):not([href*="="])').parent().removeClass("current_page_item").removeClass("current-menu-item");
	}
}
var isMobile = false;
var	screenLarge = 1200,
	screenMedium = 992,
	screenSmall = 768;
/*js window.width calculates differently 750px is actually 768px, use matchMedia*/

/* Check if on mobile */
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;

/*--------------------------------------------------------------------------------*/
//Passepartout	
/*--------------------------------------------------------------------------------*/

// Create passepartout if needed
function dentalia_passepartout_desktop() {
	if (!$('body').hasClass('passepartout-propagated')) {

		$('body').addClass('passepartout-propagated');

		var passepartoutHeight = $('body').data('passepartoutheight');
		var passepartoutWidth = $('body').data('passepartoutwidth');
		var passepartoutHex = $('body').data('passepartoutcolor');

		$('body').css ({ 
			'margin-left' : passepartoutWidth,
			'margin-right' : passepartoutWidth,
			'margin-bottom' : passepartoutHeight
		});		

		/* create top and bottom passepartout */
		if (!$('.passepartout-top').length ) {
			$('body').prepend('<div class="passepartout passepartout-top visible-md visible-lg"></div>');
			$('body').append('<div class="passepartout passepartout-bottom visible-md visible-lg"></div>');
			$('body').append('<div class="passepartout passepartout-left visible-md visible-lg"></div>');
			$('body').append('<div class="passepartout passepartout-right visible-md visible-lg"></div>');

			$('body > .passepartout-top').css({
				'background-color' : passepartoutHex,
				'height' : passepartoutHeight
			})			
			$('body > .passepartout-bottom').css({
				'background-color' : passepartoutHex,
				'height' : passepartoutHeight
			})	
			$('body > .passepartout-left').css({
				'background-color' : passepartoutHex,
				'width' : passepartoutWidth
			})
			$('body > .passepartout-right').css({
				'background-color' : passepartoutHex,
				'width' : passepartoutWidth
			})									
		}
	}
}

function dentalia_passepartout_mobile() {

	$('body').css({
		'margin-left': '0',
		'margin-right': '0',
	})

	$('body').removeClass('passepartout-propagated');
}

function  dentalia_create_passepartout() {
	if ($('body').attr('data-passepartoutcolor')) {
		
		if (window.matchMedia('(min-width: '+screenMedium+'px)').matches) {
			dentalia_passepartout_desktop();
		} else {
			dentalia_passepartout_mobile();
		}
	}
}

dentalia_create_passepartout();

// passepartout resize function
if ( $('body').attr('data-passepartoutcolor') != 'undefined' ) {
	$(window).on('resize', dentalia_create_passepartout);	
}

/*-----------------------------------------------------------------------------------*/
// main navigation:
/*-----------------------------------------------------------------------------------*/

/*Toogle parrent (mobile navigation) */
$.fn.toggleparent = function(){
	 	var element = $(this).parent('li');

	 	if (element.hasClass('open')) {	
	 		element.find('.togglecontainer').stop().slideUp('100');
			element.find('ul').stop().slideUp('300');
			element.removeClass('open');
			element.find('li').removeClass('open');
		}
		else {
			element.stop();
			element.parent('ul').stop().css('height', 'auto');
			element.children('ul').stop().css('height', 'auto');
			element.children('.togglecontainer').css('display', 'none');
			element.children('.togglecontainer').removeClass('hidden');

			element.children('ul, .togglecontainer').stop().slideDown('300');
			$(window).trigger('resize'); 
			element.addClass('open');
		}
}
/*prepare the main navigation*/
$('.main-nav-wrap .menu-item-has-children').each(function(){
	$('li > a',this).prepend('<span class="coll_btn desktoponly"><i class="orionicon orionicon-arrow_right"></i></span>');
	$('> a, li > span',this).after('<span class="coll_btn notdesktop"><i class="orionicon orionicon-arrow_carrot-down"></i></span>');
	$('> a, li > span',this).addClass('needs_coll_btn');
})

function removeSlowFade() {
	$('.main-nav-wrap .menu-item-has-children.slow-fade:not(:hover)').stop().removeClass('slow-fade');
}
$('.main-nav-wrap .menu-item-has-children').on('mouseenter', function() {
	$(this).stop();
	$(this).addClass('slow-fade');
})

$('.main-nav-wrap .menu-item-has-children').on('mouseleave', function() {
	$(this).stop();
	setTimeout(removeSlowFade, 100);
})

/* in case of mega menus delete those */
$('.orion-mega-menu span.coll_btn, .orion-megamenu .megamenu-sidebar .widget-area span.coll_btn').remove();
$('.orion-mega-menu .menu-item-has-children').each(function(){
	$('> a',this).removeClass('needs_coll_btn');
})
$('.megamenu-sidebar .needs_coll_btn').removeClass('needs_coll_btn');

/* add sub-mega-menu class to each sub-menu inside megamenu */
$('.orion-mega-menu .menu-item-has-children .sub-menu').each(function(){
	$(this).addClass('sub-mega-menu');
	$(this).removeClass('sub-menu');
})
$('.orion-mega-menu .menu-item-has-children').each(function(){
	$(this).addClass('menu-item-has-children-mega');
	$(this).removeClass('menu-item-has-children');
})
$('.nav-menu > .orion-megamenu').append('<span class="mega-indicator-wrap"></span>');
/*icon buttons action*/
$('.coll_btn').on('click', function(){
	if (window.matchMedia('(max-width: '+(screenMedium - 1) +'px)').matches) {
		$(this).toggleparent();
	}
})

/*Toggle mobile navigation*/
$('.hamburger-box').on('click', toggleMobileNav);

/* menu widget */
$('.widget_nav_menu .menu-item-has-children, .product-categories .cat-parent').each( function(){
	$('> a',this).after('<span class="coll_btn"><i class="orionicon orionicon-arrow_carrot-down"></i></span>');
})
$('.widget_nav_menu .coll_btn').on('click', function(){
	$(this).toggleparent();
})
$('.widget_product_categories .coll_btn').on('click', function(){
	$(this).toggleparent();
})
/**
 * toggles mobile menu and renders it
 */
function toggleMobileNav() {

	var button = $('.hamburger-box'); 
	var nav_menu = $('header:not(.stickymenu) .nav-container');

	if ($('header .mobile-cart.open').length) {
		toggleMobileCart();
	}

	if (nav_menu.hasClass('open') ) {
		
		/* close the navigation */
		nav_menu.removeClass('open');
		button.removeClass('open');
		
		/*scroll to the top */
		var body = $("html, body");

		if (!$('header.site-header').hasClass('mobile-header-sticky')) {
			body.stop().animate({scrollTop:0}, '400', 'swing', function() { 
			});
		}



	} else {
		/* open the navigation */
		moveHeaderWidgets();
		nav_menu.addClass('open');
		button.addClass('open');
		
		/*scroll to the menu content */
		var $scrollValue = $('.hamburger-box').offset();
		var body = $("html, body");
		if (!$('header.site-header').hasClass('mobile-header-sticky')) {
			body.stop().animate({scrollTop:($scrollValue.top - 12)}, '700', 'swing', function() { 
			});
		}		
	}	
}

function moveHeaderWidgets() {
	if ($('.site-header .widget-section:not(.visible-md):not(.mobile-below-header) .header-widgets').length 
		&& $('.header-widgets').children().length > 0 && !$('.site-header .mobile-widgets').length ) {
		$('.main-nav-wrap').append('<div class="mobile-widgets hidden-md hidden-lg"></div>');
		$('.header-widgets').clone().appendTo( ".main-nav-wrap .mobile-widgets" );
	}
}
function moveHeaderWidgetsBelow() {
	if (!$('.site-header .mobile-widgets').length && $('.site-header .widget-section.mobile-below-header .header-widgets').length && $('.header-widgets').children().length > 0 ) {
		$('.site-header').append('<div class="mobile-widgets hidden-md hidden-lg widgets-below-header"></div>');
		$('.header-widgets').clone().appendTo( ".site-header .mobile-widgets" );
	}
}

if ($('.site-header .widget-section.mobile-below-header .header-widgets').length) {
	$(window).on('ready resize', moveHeaderWidgetsBelow );
}


/*ensure that drop down menu does not go out of the screen (desktop)*/
function stay_on_screen() {

	$('.site-navigation .sub-menu .sub-menu').parent().on('mouseenter', function() {
		if ($(this).hasClass('orion-megamenu-subitem')) {
			return;
		} else {
		    var menu = $(this).find("ul");  
		    var menupos = $(menu).offset();
		    var siteWidth = $('body').innerWidth();
		    if ($('body').hasClass('boxed')) {
		    	siteWidth = $('.boxed-container').width() + $('.boxed-container').offset().left;

		    }		    
		    if (menupos.left + menu.width() > siteWidth) {
		        var newpos = -$(menu).width();
		        menu.css({ left: newpos });    
		    }

			if ($('body').hasClass('rtl')) {
				if (menupos.left < 0) {
					var newpos = -$(menu).width();
					menu.css({ right: newpos }); 
				}
			}
	    }
	});
}
if (window.matchMedia('(min-width: ' + screenMedium + 'px)').matches) {
	stay_on_screen();
}

/*-----------------------------------------------------------------------------------*/
// TOP BAR
/*-----------------------------------------------------------------------------------*/

if ($('.top-bar.collapsable').length) {
	$('.top-bar.collapsable').find('.top-bar-wrap.right').after('<div class="top-bar-toggle"> <span class="orionicon-icon_plus orionicon"></span> </div>');
	$('.top-bar-toggle').on('click', function(){
		$(this).parents('.top-bar').toggleClass('on-screen');
	})
}

/*-----------------------------------------------------------------------------------*/
// Site search
/*-----------------------------------------------------------------------------------*/

$('.search-toggle .search-box, .site-search .search-toggle').on('click', function() {
    if (!$('search-opened').length) {
        $(window).scrollTop(0);
        $('.site-search-input').focus();
    }
    $('.search-box').toggleClass('open');
    $('body').toggleClass('search-opened');
});

/*-----------------------------------------------------------------------------------*/
/* Toggle megabar function */
/*-----------------------------------------------------------------------------------*/
$.fn.getSize = function() {    
    var $wrap = $("<div />").appendTo($("body"));
    $wrap.css({
        "position":   "absolute !important",
        "visibility": "hidden !important",
        "display":    "block !important",
        "max-height": "none",
    });

    var $clone = $(this).clone().appendTo($wrap);
    $(window).trigger('resize');
    var sizes = {
        "width": this.width(),
        "height": this.height()
    };

    $wrap.remove();
    return sizes;
};

$.fn.toggleWidgetContainer = function() {

	var el = $(this);
	var elWidget = $(this);
	var elBars = el.parents('.top-bar');
	var elTitle = el.find('> .widget-title');
	var elContainer = el.find('.togglecontainer');
	var elWrap = elContainer.find('div .panel-grid > div');
	
	// add distinguisable class, which we remove, when we are done
	elWidget.addClass('changeclass');

	/*  SIBLINGS  */
	// if any other widget title is active, hide it
	elBars.find('.so-widget-orion_mega_widget_topbar:not(".changeclass") > .widget-title').removeClass('active'); 

	// if any other container is active, hide it
	var siblingsContainer = $('.so-widget-orion_mega_widget_topbar:not(".changeclass")> .togglecontainer.visible', elBars);

	if (siblingsContainer.length) {
		siblingsContainer.addClass('fadeout');
		setTimeout(function() {
			siblingsContainer.removeClass('visible');
			siblingsContainer.removeClass('fadeout');
	    }, 500); 		
	}

// WIDGET
	//is it active?
	if (elTitle.hasClass('active')) {	

		/*hide it*/
		$('.closebar').addClass('evaporate');

		elTitle.removeClass('active');
	    elWrap.css("max-height", "0");

		/* timed visual effect:*/
		elContainer.addClass('remove-padding');
		setTimeout(function() {
			elContainer.removeClass('visible');
			elContainer.css("max-height", "0");
	    	elWrap.css("max-height", "0");
			$('.closebar').remove();
			elContainer.removeClass('remove-padding');

        }, 300); 

	} else {
		/*show*/
	    elTitle.addClass('active');
	    elContainer.addClass('visible'); 

	    /* this calculation works */
	    elWrap.css("max-height", "none");
       	var size = $('> div', elContainer).getSize();
		/* End calculation*/

       	siblingsContainer.find($('.closebar')).addClass('evaporate');
       
       	/* make it "visible" to calculate height */
		var height = size.height;

		/*prepare for transition*/
	    elContainer.css("max-height", "0");
	    elWrap.css("max-height", "0");

	    /*transition*/
		setTimeout(function() {
			elWrap.css("visibility", "visible");
	    	elWrap.css("max-height", height);
			elContainer.css('max-height', height);	

			/*force resize*/
			$(window).trigger('resize');				
        }, 100);   

		var closebtn ='<div class="closebar x-box xtoarrows no-opacy"><div class="relative-wrap"><span class="first triangle"></span><span class="triangle last"></span></div></div>';
		elContainer.append(closebtn);	
		setTimeout(function() {
			elContainer.children($('.closebar')).removeClass('no-opacy');
			$('.closebar.evaporate').remove();
		}, 100); 		
	}
	elWidget.removeClass('changeclass');
}

$('.orion-mega-menu.togglecontainer').parent('.menu-item').addClass('mega-menu-item');

function enableMegaMenu(el) {

	$(el).parent('.menu-item').on('mouseenter', function(){
		if($('.togglecontainer', this).hasClass('hidden') && window.matchMedia('(min-width: ' + screenMedium + 'px)').matches) {
			$('.togglecontainer', this).removeClass('hidden');
			$(this).addClass('mega-active');
			$(window).trigger('resize');
		}
	})

	$(el).parent('.menu-item').on('mouseleave', function(){

		if(!$('.togglecontainer', this).hasClass('hidden') && window.matchMedia('(min-width: ' + screenMedium + 'px)').matches) {
			$('.togglecontainer', this).addClass('hidden');
		}
		$(this).removeClass('mega-active');
	})	
}
enableMegaMenu('.orion-mega-menu.togglecontainer');

/*attach closebar click event to the document*/
$(document).on('click', '.closebar' , function() {
	var elwidget = $('.closebar').parents('.so-widget-orion_mega_widget_topbar');
		elwidget.toggleWidgetContainer();
		$(this).addClass('evaporate');	
});


$('.so-widget-orion_mega_widget_topbar > .widget-title').on('click', function() {
	var element = $(this);
	var elwidget = element.parents('.so-widget-orion_mega_widget_topbar');
	elwidget.toggleWidgetContainer();	
})

/*-----------------------------------------------------------------------------------*/
/* BG colors */
/*-----------------------------------------------------------------------------------*/
// If we want to display a diferent color on mobile, we can use this two classes. 

function orionBgColors() {

	$('.section').each(function(){
	    $(this).css('background-color', $(this).attr('data-bgcolor'));
	});	

	if (window.matchMedia('(max-width: ' + (screenMedium - 1) + 'px)').matches) {
		$('.section[data-mobile-bgcolor]').each(function(){
			$(this).css('background-color', $(this).attr('data-mobile-bgcolor'));
		})
	}
}

orionBgColors();

/*-----------------------------------------------------------------------------------*/
/* sticky navigation */ 
/*-----------------------------------------------------------------------------------*/

// check if passpartout is set, so we can adjust the position:
if ($('body').data('passepartoutwidth')) {
	var passpartoutWidth = ($('body').data('passepartoutwidth'));
} else {
	var passpartoutWidth = '0';
}

//let's not forget about the logged in users:
if ($('body').hasClass('admin-bar')) {
	var AdminBarHeight = 32;
} else {
	var	AdminBarHeight = 0;
}
$('.stickymenu').css('top', AdminBarHeight );



/* handle mobile sticky header */
/* should run on resize */
function mobileStickyHeaderHandling() {
	if (window.matchMedia('(max-width: ' + (screenMedium - 1) + 'px)').matches) {
		var calculatedTopBarHeight = 0;
		if($('.top-bar:not(.collapsable)').length) {
			calculatedTopBarHeight = $('.top-bar').height();
		}
		var stickyHeaderHeight = $('.site-header.mobile-header-sticky').height();	
		if (stickyHeaderHeight > 102 ) {
			/* if is open, the height can be more then screen*/
			stickyHeaderHeight = 102;
		}
		var windowScroll = $(window).scrollTop();

		var wpadminbar = 0;
		if ($('#wpadminbar').length) {
			wpadminbar = $('#wpadminbar').height();
		}
		var stickyReadyOffset = calculatedTopBarHeight + stickyHeaderHeight + wpadminbar;
		var stickyOffset = calculatedTopBarHeight + 2*stickyHeaderHeight + wpadminbar;

		if($('.site-header .nav-container:not(.open)').length) {
			/*stuck_ready*/
			if (windowScroll > stickyReadyOffset) {
				$('.site-header.mobile-header-sticky').addClass('stuck_ready');
			} else {
				$('.site-header.mobile-header-sticky').removeClass('stuck_ready');
			}

			/* actual stickyness*/
			if (windowScroll > stickyOffset) {
				$('.site-header.mobile-header-sticky').addClass('stuck');
				$('body > .site').css('padding-top', stickyHeaderHeight );
				$('.site-header.mobile-header-sticky').removeClass('stuck_ready');
			}
			else {
				$('.site-header.mobile-header-sticky').removeClass('stuck');
				$('body > .site').css('padding-top', '' );
			}
		}
	} else {
		$('body > .site').css('padding-top', '' );
	}
}
if ($('.site-header').hasClass('mobile-header-sticky')) {
	$(window).on('ready resize scroll', mobileStickyHeaderHandling );
}
/* End handle mobile sticky header */

function stickyAdjustWidth() {
	if ($('.stickymenu').length) {
			
		if (window.matchMedia('(max-width: ' + (screenMedium - 1) + 'px)').matches) {

		} else {
			$('.stickymenu').css('width', '100%' );
			if ($('body').data('passepartoutwidth')) {
				var adjustWidth = '-=' + (2 * passpartoutWidth) + 'px';
				$('.stickymenu').css({
					'width' : adjustWidth 
				})		
			}			
		}
	}
}

/* if sticky menu is set, set sticky behaviour */
$(function() {
	if ($('.stickynav').length && typeof Waypoint == 'function') {
		var orionSticky = $('.stickynav');
		var stickyOffset = orionSticky.offset();
		var stickyHeight = orionSticky.height();

		// sticky menu Waypoints:
		var navWaypoint = new Waypoint({
		  	element: $('body'),
		  	handler: function(direction) {

		  		if (window.matchMedia('(max-width: ' + ( screenMedium - 1) + 'px)').matches) {
		  					    	
				    $('.stickymenu').addClass('hidesticky');
			    	$('.stickymenu').removeClass('stuck');		
			    	return; //don't run on mobile.    	
				}
			    if (direction == 'down') { 	
						$('.stickymenu').addClass('stuck');
						$('.stickymenu').removeClass('hidesticky');
						stickyAdjustWidth();
			    }
			},
		  	offset: -(stickyOffset.top  - (2*AdminBarHeight) + stickyHeight)
		})
		//remove sticky menu:
		var navWaypoint = new Waypoint({
		  	element: $('body'),
		  	handler: function(direction) {

				if (window.matchMedia('(max-width: ' + (screenMedium - 1) + 'px)').matches) {
			    	return; //don't run on mobile.		    	
				}
			    if (direction == 'up') { 
			    	$('.stickymenu').addClass('hidesticky');
			    	$('.stickymenu').removeClass('stuck');
			    	$('.stickymenu .togglecontainer').addClass('hidden');
				}
			},
			/*sticky menu is 60px */
		  	offset: -(stickyOffset.top  - 2*AdminBarHeight - 60/2 + stickyHeight/2 )
		})
	}



})
/*-----------------------------------------------------------------------------------*/
/* END sticky navigation */ 
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* next and previous post */ 
/*-----------------------------------------------------------------------------------*/
 /**
  * Set equal height of the previous and next post navigaton
  */
function setPostLinkHeight() {
	if ($('body').hasClass('single-post')) {
		var navheight = 0;
		$('.post-navigation > .wrapper a').each(function(){
			$('.post-navigation > .wrapper a').removeAttr( 'style' );
			if ($(this).height() > navheight) {
				navheight = $(this).height(); 			
			}
		});
		$('.post-navigation > .wrapper a').css('min-height', navheight + 64);
	}	
}

$(setPostLinkHeight);
/*-----------------------------------------------------------------------------------*/
/* END next and previous post */ 
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* Full screen */ 
/*-----------------------------------------------------------------------------------*/
function setFullScreen() {

	/* modifications for first panel grid row on the page */
	var headerNotTransparentHeight = 0;
	var topBarheight = 0;
	var adminBarHeight = 0;

	if ($('.full-screen-row').parent('.panel-grid').is(':first-child')) {
		$('.full-screen-row').parent('.panel-grid').addClass('panel-grid-first-child');

		if($('.site-header:not(.header-transparent)').height) {
			headerNotTransparentHeight = $('.site-header:not(.header-transparent)').height();
		}
		if ($('.top-bar').height ){
			topBarheight = $('.top-bar').height();
		}
		if ( $('#wpadminbar').height) {
			adminBarHeight = $('#wpadminbar').height();
		}		
	}

	var fullScreenRow = $('.panel-grid:not(.panel-grid-first-child) .full-screen-row');
	var fullScreenFirstRow = $('.panel-grid.panel-grid-first-child .full-screen-row');

	if (window.matchMedia('(min-width: ' + screenMedium + 'px)').matches) {
		var windowHeight = $(window).height();
		var firstchildHeight = windowHeight - headerNotTransparentHeight - topBarheight - adminBarHeight;
		$(fullScreenFirstRow).stop().animate({
			'min-height': firstchildHeight,
		})
		$(fullScreenRow).stop().animate({
			'min-height': windowHeight,
		})
	} else {
		$(fullScreenRow).stop().css('min-height', '');
		$(fullScreenFirstRow).stop().css('min-height', '');
	}
}
$(window).on('ready resize', setFullScreen );
/*-----------------------------------------------------------------------------------*/
/* End Full screen */ 
/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
/* Orion Features widget */ 
/*-----------------------------------------------------------------------------------*/

$('.widget_orion_features_w .feature-item-wrap:not(.no-toggle)').on('mouseenter', function(){

 $('.footer', this).stop().slideDown({
        duration: 100 ,
        easing: 'swing',
  }).addClass('visible');
})

$('.widget_orion_features_w .feature-item-wrap:not(.no-toggle)').on('mouseleave', function(){
if( $('body').width() > 997) {
	  $('.footer', this).stop().slideUp({
	        duration: 200 ,
	        easing: 'swing',
	  }).removeClass('visible');
  }
})
/*-----------------------------------------------------------------------------------*/
/* END Orion Features widget */ 
/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
/* OWL carusel 
/*-----------------------------------------------------------------------------------*/

$( orionOwl )

function orionOwl() {	
	jQuery.each($('.owl-carousel'), function() {
		var owl = $(this);
		var childCount = $('.item', owl).length;
		
		var number_items = 1;
		var number_items_desktop = 4;

		var owlAutoplay = true;
		var number_items_tablet = 1;
		var dots = false;
		var margin = 0;
		var owlAutoheight = false;

		var rtl = ($('html').attr('dir')=='rtl');

		//dots
		if ( owl.attr('data-dots') == '1') {
			dots = true;
		}
		//autoplay
		if ( owl.attr('data-autoplay')) {
			var owlAutoplayAtt = (owl.attr('data-autoplay') == 'true' || owl.attr('data-autoplay') == '1');
			if (owlAutoplayAtt != true) {
				owlAutoplay = false;	
			}
		}
		//autoheight
		if ( owl.attr('data-autoheight')) {
			var owlAutoheight = (owl.attr('data-autoheight') == 'true' || owl.attr('data-autoheight') == '1');
		}
		//margin
		if ( owl.attr('data-margin')) {
			margin = parseInt(owl.attr("data-margin"));
		}
		// number of items in a row
		if ( owl.attr('data-col')) {
			number_items_desktop = parseInt(owl.attr("data-col"));
		} 
		if (number_items_desktop == 12) {
			number_items_tablet = 3;
			number_items = 6;
		} else if (number_items_desktop == 6) {
			number_items = 3;
			number_items_tablet = 3;		
		} else if (number_items_desktop > 4) {
			number_items = 4;
		} else {
			number_items = number_items_desktop;
		}
		if (6 > number_items_desktop && number_items_desktop > 1 ) {
			number_items_tablet = 2;
		}
		if (owl.attr('data-tablet')) {
			number_items_tablet = owl.attr("data-tablet");
		}

		// loop
		var owlLoop = 'true';
		if (owl.attr('data-owlloop')) {
			owlLoop = owl.attr('data-owlloop');
		}		

		// navigation behaviour
		var data_slideby = 0;
		var slideByDesktop = 1;
		var slideByItems = 1;
		var slideByTablet = 1;
		var autoplayTimeout = 5000;
		if ( owl.attr('data-autoplaytimeout') ) {
			autoplayTimeout = parseInt(owl.attr("data-autoplaytimeout"));
		} 		
		if ( owl.attr('data-slideby')) {
			data_slideby = parseInt(owl.attr("data-slideby"));
		} 
		if (number_items_desktop > (childCount / 2)) {
			slideByDesktop = 1;
		} else if (data_slideby != 0 && data_slideby <= number_items_desktop) {
			slideByDesktop = data_slideby;
		} else {
			slideByDesktop = number_items_desktop;
		}
		if (number_items > (childCount / 2)) {
			slideByItems = 1;
		} else if (data_slideby != 0 && data_slideby <= number_items) {
			slideByItems = data_slideby;
		} else {
			slideByItems = number_items;
		}
		if(number_items_tablet > (childCount / 2)) {
			slideByTablet = 1;
		} else if (data_slideby != 0 && data_slideby <= number_items_tablet) {
			slideByTablet = data_slideby;
		} else {
			slideByTablet = number_items_tablet;
		}
		var owlTimeout;

		var hashListner = false;
		if (owl.attr('data-hashlisten')) {
			var hashListner = owl.attr('data-hashlisten');
		}
		var isloop = (owlLoop == 'true');

		owl.owlCarousel({ 
			rtl: rtl,
		    loop: isloop,
		   	URLhashListener: hashListner,
		    startPosition: 'URLHash',
		    animateOut: 'fadeOut',
		    autoplay: owlAutoplay,
		    autoplayHoverPause: true,
		    autoplaySpeed: 500,
		    autoplayTimeout: autoplayTimeout,
		    responsiveClass:true,
		    autoHeight: owlAutoheight,		    
		    dots: dots,
		    margin: margin,
		    responsive:{
		        0:{
		            items:1,
		            nav:false,
		            slideBy: 1,
		        },
		        600:{
		            items:number_items_tablet,
		            nav:false,
		            slideBy: slideByTablet
		        },
		        992:{
		            items: number_items,
		            nav:false,
		            slideBy: slideByItems
		        },
		        1200:{
		            items: number_items_desktop,
		            nav:false,
		            slideBy: slideByDesktop,
		        }		        
		    }
		})
		if (owl.hasClass('owl-equal-height')) {
			//set images as bg image
			owlSetBgImage(owl);
			owlUpdateSize(owl);
		}	
		if (owl.hasClass('owl-correct-height')) {
				// page builder is not fully propagated yet, so we correct the size after 1s
				owlCorrectHeight(owl);
		}				
		owl.on('changed.owl.carousel', function(event) {

    		var urlHash = window.location.hash;
    		if (urlHash != '') {
    			var dataSearchQuery = urlHash.replace("#", "");
    			var navTab = $('.carousel-navigation a[data-navid='+ dataSearchQuery +']').parent('li');
    			navTab.addClass('active');
    			navTab.siblings().removeClass('active');
    			history.replaceState(null, null, ' ');
    		}

		})	

		if (owlAutoplay == true) {
			/* stop autoplay */     
	        $(owl).on('mouseleave', function(){ 
				owl.trigger('play.owl.autoplay');
	   		});
	   		$(owl).on('mouseenter', function(){
	   			owl.trigger('stop.owl.autoplay');
	   		});

	   		/* stop autoplay */
	   		var navlinks = $(owl).closest('.so-panel.widget').find(
	   		('.owl-nav-link'));
	   		if (navlinks.length) {
	   			navlinks.on('mouseenter',function(){
					owl.trigger('stop.owl.autoplay');
	   			});
	   				navlinks.on('mouseleave',function(){
					owl.trigger('play.owl.autoplay');
	   			});
	   		}
        }
		// If there is navigation, use it.
	    owl.siblings().find('.owlnext').on('click', function(){
	      	owl.trigger('next.owl.carousel');
	    });
	    owl.siblings().find('.owlprev').on('click', function(){
	      	owl.trigger('prev.owl.carousel');
	    });   
	})
}
/* equal height carousel */
function owlUpdateSize($carousel) {
	var minratio = $carousel.data('minratio');
	var owlWidth = $carousel.innerWidth();
	var owlHeight = parseInt(owlWidth * minratio);
	// set size
	$carousel.height(owlHeight);
	$('.owl-item', $carousel).height(owlHeight);
}
function owlCorrectHeight($carousel) {
	setTimeout(function() {
		var slideHeight = $('> .owl-stage-outer > .owl-stage > .owl-item.active', $carousel).outerHeight();
		$('> .owl-stage-outer', $carousel).height(slideHeight);
	}, 1000);	
}

function owlSetBgImage($carousel) {
	$('.owl-item', $carousel).each(function () {
		// set image
		var $this = $(this);
		var $image = $this.find('img');
		var imageSource = $image.attr('src');
	    $this.css('backgroundImage', 'url(' + imageSource + ')');
	});
}
/* fix for accordion within owl carousel  */
$('.so-widget-orion_advanced_carousel_w .widget_orion_accordion_w .panel-heading').on('click', function(){
		$('.so-widget-orion_advanced_carousel_w .owl-stage-outer').css('height', '');
	})

/*-----------------------------------------------------------------------------------*/
/* END OWL carusel
/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
/* Parallax
/*-----------------------------------------------------------------------------------*/

var updatePosition = function() {
	$('.orion-parallax').each(function(){
		var para_position = $(this).offset().top;
		var el_height = $(this).outerHeight();
		var screen_height = $(window).height();
		var para_bg_percent = ( 100 / (el_height + screen_height)) * (window.pageYOffset + screen_height - para_position);
		if ($(this).hasClass('vertical_down')) {
			$(this).css('background-position', '50% ' + para_bg_percent + '%');	
		} else if($(this).hasClass('vertical_up')) {
			$(this).css('background-position', '50% ' + (100 - para_bg_percent)	+ '%' );
		} else if($(this).hasClass('horizontal_left')) {
			$(this).css('background-position', para_bg_percent	+ '%' ) + '50% ';
		} else if($(this).hasClass('horizontal_right')) {
			$(this).css('background-position', (100 - para_bg_percent) + '%' ) + '50% ';
		}				
	})
}

updatePosition();

$(window).on('load', function(){
	if($('.orion-parallax').length > 0 ){
		var parallax_inview = new Waypoint.Inview({
			element: $('.orion-parallax')[0],
			enter: function(direction) {
				if (direction == 'down') {
					window.addEventListener('scroll', updatePosition, false);
				}
			},
			entered: function(direction) {
			},
			exit: function(direction) {
			},
			exited: function(direction) {
			}
		})
	}
})
/*-----------------------------------------------------------------------------------*/
/* END Parallax
/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
/* Comment form */ 
/*-----------------------------------------------------------------------------------*/
$( ".orioninner" ).wrapAll( "<div class='row' />");
/*-----------------------------------------------------------------------------------*/
/* END comment form */ 
/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
/* Rounded images */ 
/*-----------------------------------------------------------------------------------*/
/* Depreciated 4/6/2020 */
// function roundedImages() {
// 	$('.orion_circle').each(function(){
// 		var el = $(this);
// 		var parentWidth = $(this).parent().width();
// 		parentWidth = Math.round(parentWidth);
// 		el.css('width', parentWidth);
// 		el.css('height', parentWidth);		
// 	})	
// }
// $(window).on('load', function() {
// 	roundedImages()
// })
		
/*-----------------------------------------------------------------------------------*/
/* Resize functions*/
/*-----------------------------------------------------------------------------------*/

$(window).on('resize', function() {
	stickyAdjustWidth();
	setPostLinkHeight(); //previous, next post

	/* screen size dependant: */
	if (window.matchMedia('(min-width: ' + screenMedium + 'px)').matches) {
		stay_on_screen();
	} 
})

// Siteorigin fix: Resize google maps add function only if it is on the page.
if ($('.so-widget-sow-google-map').length) { 
	$(window).on('resize', function() {
		if (typeof soGoogleMapInitialize == 'function') {
			soGoogleMapInitialize();
		}
	});
}

/*-----------------------------------------------------------------------------------*/
/* End Resize function*/
/*-----------------------------------------------------------------------------------*/

$(window).on('load', function() {	
	//needed due to siteorigin full width layout bug
	$(window).trigger('resize');
})

/*-----------------------------------------------------------------------------------*/
/* Collapse tabs to accordion */ 
/*-----------------------------------------------------------------------------------*/
$('.tabs-wrap > ul').tabCollapse();

/*-----------------------------------------------------------------------------------*/
/* END Collapse tabs to accordion */ 
/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
/* swipebox */ 
/*-----------------------------------------------------------------------------------*/

$(function() {
	// Add class .swipebox to all links to images
	$('a[href]').filter(function() {
	return /(\.jpg|\.jpeg|\.gif|\.png)/i.test( $(this).attr('href'));
	}).addClass("fancybox");

	// If link has not title, add img title/alt as title to links
	$('a.fancybox').filter(function(){

		// Check if image has title - else alt
		if ($(this).find('img').attr('title')){
			var title_img = $(this).find('img').attr('title');
		} else {
			var title_img = $(this).find('img').attr('alt');
		}
		if (!$(this).attr('title')){
			$(this).attr('title', title_img);
		}
	});

	// Add SwipeBox Script
	$( '.fancybox' ).fancybox({});

});
/*-----------------------------------------------------------------------------------*/
/*       	  						 image size (logos)						 		 */
/*-----------------------------------------------------------------------------------*/
$(function() {
	$('[data-imgsize]').each(function(){
		var el = $(this);
		var imgSize = el.attr('data-imgsize') + '%';
		
		var imgHoverSize = el.attr('data-imghoversize');
		if (typeof imgHoverSize !== typeof undefined && imgHoverSize !== false) {
	    	imgHoverSize = imgHoverSize + '%';
		} else {
			imgHoverSize = imgSize;
		}
		var imgHoverSize = el.attr('data-imghoversize') + '%';
		$('> img', el).css({
			"max-width": imgSize,
			"max-height": imgSize
		})
		el.on('mouseenter', function(){
			$('> img', el).css({
				"max-width": imgHoverSize,
				"max-height": imgHoverSize
			})
		})
		el.on('mouseleave', function(){
			$('> img', el).css({
				"max-width": imgSize,
				"max-height": imgSize
			})
		})	
	})
})

/*-----------------------------------------------------------------------------------*/
/* 									back to top 									 */
/*-----------------------------------------------------------------------------------*/
function backToTopBtn() {
    var button = $('.back-to-top');
    var scrollTop = $(window).scrollTop();
    if (scrollTop > 800) {
        button.removeClass('hideit');
    } else {
        button.addClass('hideit');
    }
}

$('.back-to-top').on('click', function(){
	$('html,body').animate({
        scrollTop: 0
    }, 600);
	return false;
})
$(window).on('load scroll resize' , backToTopBtn);

/*-----------------------------------------------------------------------------------*/
/* 									sticky footer 									 */
/*-----------------------------------------------------------------------------------*/

window.onload = function() {
	if ($('.fixed-footer').length && window.matchMedia('(min-width: ' + screenMedium + 'px)').matches ) {
		var footerSize = $('.site-footer').height();
		if (footerSize > 0) {
			$('.site-footer').addClass('fixed');
			$('body').css('margin-bottom', footerSize);
		}
	}
}
/*-----------------------------------------------------------------------------------*/
/* 									Download button									 */
/*-----------------------------------------------------------------------------------*/

$('.btn-download').on('click', function(){
	$(this).addClass('visited');
})

/*-----------------------------------------------------------------------------------*/
/* 									overlays	 									 */
/*-----------------------------------------------------------------------------------*/

$('.overlay-dark').prepend('<div class="overlay-dark-wrapper"></div>');
$('.overlay-light').prepend('<div class="overlay-light-wrapper"></div>');
$('.overlay-c1').prepend('<div class="overlay-c1-wrapper"></div>');
$('.overlay-c2').prepend('<div class="overlay-c2-wrapper"></div>');
$('.overlay-c3').prepend('<div class="overlay-c3-wrapper"></div>');
$('.overlay-c1-c2').prepend('<div class="overlay-c1-c2-wrapper"></div>');
$('.overlay-c2-c1').prepend('<div class="overlay-c2-c1-wrapper"></div>');
$('.overlay-c1-t').prepend('<div class="overlay-c1-t-wrapper"></div>');
$('.overlay-c2-t').prepend('<div class="overlay-c2-t-wrapper"></div>');
$('.overlay-c3-t').prepend('<div class="overlay-c3-t-wrapper"></div>');
$('.overlay-black2trans').prepend('<div class="overlay-black2trans-wrapper"></div>');
$('.overlay-fade-black').prepend('<div class="overlay-fade-black-wrapper"></div>');
$('.overlay-white-t').prepend('<div class="overlay-white-t-wrapper"></div>');
$('.overlay-fade-light').prepend('<div class="overlay-fade-light-wrapper"></div>');
// $('.overlay-dark-h').prepend('<div class="overlay-dark-h-wrapper"></div>');
// $('.overlay-light-h').prepend('<div class="overlay-light-h-wrapper"></div>');

/*-----------------------------------------------------------------------------------*/
/* 									shadows		 									 */
/*-----------------------------------------------------------------------------------*/
$('.shadow-2').parent().addClass('relative no-bottom-margins');
$('.shadow-2').parent().prepend('<div class="shadow-2-left-wrap"></div>');
$('.shadow-2').parent().prepend('<div class="shadow-2-right-wrap"></div>');
$('.shadow-3').parent().addClass('relative no-bottom-margins');
$('.shadow-3').parent().prepend('<div class="shadow-3-left-wrap"></div>');
$('.shadow-3').parent().prepend('<div class="shadow-3-right-wrap"></div>');

/*-----------------------------------------------------------------------------------*/
/* 								absolute widgets		 							 */
/*-----------------------------------------------------------------------------------*/

$('.orion.absolute-bottom').each(function(){
	var parentRow = $(this).parents('.panel-row-style:not([data-z-index])');
	parentRow.css('z-index', '2');

	setTimeout(function() {
		parentRow.siblings('.svg-wrap').css('z-index', '3');
	}, 100);	
	setTimeout(function() {
		/*just in case it needs more time to load*/
		parentRow.siblings('.svg-wrap').css('z-index', '3');
	}, 600);
})


/*-----------------------------------------------------------------------------------*/
/* 								CF7 improvements		 							 */
/*-----------------------------------------------------------------------------------*/
$(document).on('focus', '.wpcf7-not-valid', function(){
	$(this).siblings('.wpcf7-not-valid-tip').css('opacity', 0);
});

/*-----------------------------------------------------------------------------------*/
/*					Smooth scroll one page functionality  							 */
/*-----------------------------------------------------------------------------------*/
$('.woocommerce-review-link').on('click', function() {
	if ( window.matchMedia('(min-width: ' + screenSmall + 'px)').matches ) {
		$('.nav-tabs a[area-controls="tab-reviews"]').tab('show');
	} else {
		$('.panel-group #tab-reviews-collapse').collapse('show');
	}
})

$(function() {

    var scrollnow = function(e) {
    	
        // if scrollnow function was triggered by an event
        if (e) {
        	/*event based - like click event */
        	if (! $(this).hasClass('owl-nav-link') && !$(this).hasClass('comment-reply-link')) {
				var target = this.hash;
				var noHashTarget = target.replace("#", "");

				if ( $(' div[data-hash="'+noHashTarget+'"').length ) {
					/* Owl slider */
					/* do not prevent events on owl slider */
				} else if ($(this).parent().hasClass('menu-item')) {
					/* Menu items */
					e.preventDefault();
					/*change the hash, but don't scroll*/
					history.replaceState(undefined, undefined, target) 
				} else if ($('#'+noHashTarget).length) {
					/* activate bootstrap tab */
					$('.nav-tabs a[href="'+target+'"]').tab('show');
					e.preventDefault();
				} else {
					e.preventDefault();
				}
            }
            var target = this.hash; 
        }
        // else it was called when page with a #hash was loaded
        else {
            var target = location.hash;
        }

        // same page scroll
		var offset = 0; /* Desired spacing */

		if( $('#wpadminbar').length ) {
			offset -= $('#wpadminbar').height();
		}
		if( $('.stickymenu').length ) {
			offset -= $('.stickymenu').height();
		}

		if($(target).hasClass('tab-pane') || $(target).hasClass('panel-collapse') || $(this).hasClass('owl-nav-link') || $(this).hasClass('comment-reply-link')) {  
			// prevent actions on tabs and accordions
		} else {
			$.smoothScroll({
	            offset: offset,
	            scrollTarget: target,
	            easing: 'swing',
	            speed: 800,
        	});
		}
    };

    // if page has a #hash
    if (location.hash) {
        $('html, body').scrollTop(0).show();
        // smooth-scroll to hash
        scrollnow();
    }

    // for each <a>-element that contains a "/" and a "#"
    $('a[href*="/"][href*="#"]').each(function(){
        // if the pathname of the href references the same page
        if (this.pathname.replace(/^\//,'') == location.pathname.replace(/^\//,'') && this.hostname == location.hostname) {
            // only keep the hash, i.e. do not keep the pathname
            $(this).attr("href", this.hash);
        }
    });

    // select all href-elements that start with #
    // including the ones that were stripped by their pathname just above
    $('a[href^="#"]:not([href="#"])').on('click', scrollnow);  	

	/* in case of elements that enlarge with js (like full screen row functionality), we need to fire the scrollnow function again to find the right position of the element */
	if (location.hash) {
		setTimeout( scrollnow, 800);
	}
});

/*-----------------------------------------------------------------------------------*/
/* 									OnePage Navigation 								 */
/*-----------------------------------------------------------------------------------*/
/* Waypoints */
if ($('body').hasClass('one-page')) {
    var navLinkIDs = "";
    $('.nav-container a[href*="#"]:not([href="#"]):not([href*="="])').each(function(index) {
        if (navLinkIDs != "") {
            navLinkIDs += ", ";
        }
        var temp = $('.nav-container a[href*="#"]:not([href="#"]):not([href*="="])').eq(index).attr("href").split('#');
        navLinkIDs += '#' + temp[1];
    });
    
    if (navLinkIDs) {

    	var offset = $('.stickymenu').height() + 40;
    	if ($('.wpadminbar').length) {
			offset += ('.wpadminbar').height();
    	}
    	
        $(navLinkIDs).waypoint(function(direction) {
        	var link_id = ".nav-container .menu-item a[href*='#" + $(this.element).attr('id') + "']";
            if (direction == 'down') {
                $('.nav-container .menu-item a').parent().removeClass("one-page-current-item");
                $( link_id ).parent().addClass("one-page-current-item");

                // anchesters
                $('.one-page-current-anchester').removeClass('one-page-current-anchester');
                $( link_id ).parents('.menu-item').parents('.menu-item').addClass('one-page-current-anchester');
            }
        }, {
            offset: offset
        });

        $(navLinkIDs).waypoint(function(direction) {
        	var link_id = ".nav-container a[href*='#" + $(this.element).attr('id') + "']";
            if (direction == 'up') {
                $('.nav-container a').parent().removeClass("one-page-current-item");
                $(link_id).parent().addClass("one-page-current-item");
                
                // anchesters
                $('.one-page-current-anchester').removeClass('one-page-current-anchester');
                $( link_id ).parents('.menu-item').parents('.menu-item').addClass('one-page-current-anchester');
                                
            }
        }, {
            offset: function() {
                return -$(this.element).closest('.panel-grid').height() + offset;
                
            }
        });
    }
}

/*-----------------------------------------------------------------------------------*/
/*									Simple MegaMenu 							 	 */
/*-----------------------------------------------------------------------------------*/

/* add row class to sub-menu */
$('.orion-megamenu > .sub-menu').addClass('row');

// /* set widget text-color */
$('.orion-megamenu > .mega-light').addClass('nav-light').addClass('text-light');
$('.orion-megamenu > .mega-dark').addClass('nav-dark').addClass('text-dark');

/*-----------------------------------------------------------------------------------*/
/*    								Transparent Header 							 	 */
/*-----------------------------------------------------------------------------------*/

function headerSpaceAdjust() {
	var headerHeight = $('.header-transparent').height();
	$('.header-space').css('height', headerHeight);
}
if ($('.header-transparent').length && $('.page-heading').length) {

	$(function() {
		var headerHeight = $('.header-transparent').height();
		$('.page-heading').prepend('<div class="visible-md visible-lg header-space" style="height:' + headerHeight + 'px"></div>')
	})
	
	$(window).on('resize', headerSpaceAdjust);
}
/*-----------------------------------------------------------------------------------*/
/*    								Orion Custom Menu widget					 	 */
/*-----------------------------------------------------------------------------------*/

function openMenus() {
	$('.so-widget-orion_custom_menu_w .current-menu-ancestor').addClass('open');
	$('.so-widget-orion_custom_menu_w .current-menu-ancestor > .sub-menu').css('display', 'block');

	$('.so-widget-orion_custom_menu_w .current-menu-item.menu-item-has-children').addClass('open');
	$('.so-widget-orion_custom_menu_w .current-menu-item.menu-item-has-children').children('.sub-menu').css('display', 'block');

	/* woo categories*/
	$('.widget_product_categories .current-cat-parent ').addClass('open');
	$('.widget_product_categories .current-cat ').addClass('open');
	$('.widget_product_categories .current-cat-parent').children('.children').css('display', 'block');	
	$('.widget_product_categories .current-cat').children('.children').css('display', 'block');	
}

$(window).on('load', openMenus );

/*-----------------------------------------------------------------------------------*/
/*    									Tablets   								 	 */
/*-----------------------------------------------------------------------------------*/

if (isMobile == true && window.matchMedia('(min-width: ' + screenMedium + 'px)').matches) {
	$('.menu-item-has-children > a').on('click', function(){
		if(!$(this).hasClass('tablet-mode')){
			$(this).addClass('tablet-mode');
			return false;
		} else {
			$(this).removeClass('tablet-mode');
			window.location = this.href;
		}
	})
}

/*-----------------------------------------------------------------------------------*/
	//						JQuery UI datepicker 							 	 
/*-----------------------------------------------------------------------------------*/

if (typeof datepicker == 'function') { 
	$('input[type="date"]').datepicker( {
		dateFormat: 'yy-mm-dd',
		minDate: new Date( $( this ).attr( 'min' ) ),
		maxDate: new Date( $( this ).attr( 'max' ) )
	} ).attr('type','text');
}

/*-----------------------------------------------------------------------------------*/
/* row-divide class */ 
/*-----------------------------------------------------------------------------------*/

$(window).on('ready resize' , pushupRows);
function pushupRows(){	
    $('.row-divide').each(function(){
    	if (window.matchMedia('(min-width: '+screenSmall+'px)').matches) {
    		if ($(this).hasClass("svg-wrap")) {
				var rowDivideHeight = $(this).next('.row-divide').outerHeight();
				var setMarginTop = -rowDivideHeight/2;
				$(this).stop().animate({
					marginTop: setMarginTop,
					marginBottom: -setMarginTop,
					zIndex: 2,
				}, 50);	
    		} else {
	    		var rowDivideHeight = $(this).outerHeight();
	    		var setMarginTop = -rowDivideHeight/2;
		    	$(this).stop().animate({
					marginTop: setMarginTop,
				}, 50);	    		
	    	};
		} else {
    		$('.row-divide').css('marginTop', '');
    	}	
    });
    $('.push-up-row').each(function(){
    	if ( window.matchMedia('(min-width: ' + screenMedium + 'px)').matches ) {

    		if ($(this).hasClass("svg-wrap")) {   			
					var rowDivideHeight = $(this).next('.push-up-row').outerHeight();
					var setMarginTop = -rowDivideHeight;
					$(this).stop().animate({
						marginTop: setMarginTop,
						marginBottom: -setMarginTop,
						zIndex: 2,
					}, 1);	
    		} else { 
    			$(this).addClass('set-height');
		    	$(this).css('display', 'flex');
				$(this).css('opacity', '1');    		   		
		    	var rowDivideHeight = $(this).outerHeight();
		    	var setMarginTop = - rowDivideHeight;

		    	$(this).stop().animate({
					marginTop: setMarginTop,
				}, 1);
			}
    	} else {
    		$('.push-up-row').css('marginTop', '');
    	}
    });
}

/**
 * toggles mobile menu and renders it
 */

/*Toggle mobile cart*/
function toggleMobileCart() {

	var button = $('.to-x .woocart'); 
	moveCartContent();
	var mobile_cart = $('.mainheader .mobile-cart');

	if ($('header .nav-container.open').length) {
		toggleMobileNav();
	}

	if (mobile_cart.hasClass('open') ) {
		/* close the navigation */
		mobile_cart.removeClass('open');
		button.removeClass('open');
		
		/*scroll to the top */
		var body = $("html, body");
		body.stop().animate({scrollTop:0}, '400', 'swing', function() { 
		});

	} else {
		/* open the navigation */
		mobile_cart.addClass('open');
		button.addClass('open');
		
		/*scroll to the menu content */
		var $scrollValue = $('.hamburger-box').offset();
		var body = $("html, body");
		body.stop().animate({scrollTop:($scrollValue.top - 12)}, '700', 'swing', function() { 
		});
	}	
}

$('.burger-container .woocart').on('click',function() {
	toggleMobileCart();
})

function moveCartContent() {
	if ($('.to-x .woocart').length &&  $('.to-x .woocart .product_list_widget').children().length > 0 && !$('.site-header .mobile-cart').length) {
		$('.mainheader .nav-container').after('<div class="mobile-cart hidden-md hidden-lg"></div>');
		$('.to-x .woocart .orion-cart-wrapper').clone().appendTo( ".mainheader .mobile-cart" );
	}
} 

$('.widget_layered_nav > select').wrap('<div class="selectwrapper"></div>');
$('select.pwb-dropdown-widget').wrap('<div class="selectwrapper"></div>');


/* google maps overflows cells bug */
// $('.widget_sow-google-map').parent('.panel-grid-cell').css('overflow', 'hidden'); /*issues if stretch on mobile is turened on on the widget*/
$('.widget_sow-google-map .panel-widget-style').css('overflow', 'hidden');

/* move to tab on click */
$(function() {
  if(window.location.hash != "") {
  	/*tabs*/
    $('.nav-tabs a[href="' + window.location.hash + '"]').tab('show');

    /* orion carousel*/
 	$('.owl-nav-link[href="' + window.location.hash + '"]').parent('li').siblings('li.active').removeClass('active');
	$('.owl-nav-link[href="' + window.location.hash + '"]').parent('li').addClass('active'); 
  }
});

}) //END jQuery(function($){}) 
