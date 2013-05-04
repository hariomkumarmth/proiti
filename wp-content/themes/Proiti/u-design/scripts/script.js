

// Adds a class 'js_on' to the <html> tag if JavaScript is enabled,
// also helps remove flickering...
document.documentElement.className += 'js_on';

// Cufon Related Script
jQuery(function($){
    if( $('body').hasClass('cufon-on') ) {
	// Add Cufon fonts
	Cufon.replace('#slogan');
	Cufon.replace('h1');
	Cufon.replace('h2:not(.slide-desc h2)');
	Cufon.replace('h3:not(.twtr-widget, .slide-desc h2, .accordion-toggle)');
	Cufon.replace('h4:not(.twtr-widget, #bottom .latest_posts h4)');
	Cufon.replace('h5');
	Cufon.replace('h6');
	Cufon.replace('#page-content #page-title h2');
	Cufon.replace('.single-post-categories');
    }
});

// Signup Button
jQuery(document).ready(function($){
  $('p.signup-button a')
    .css({ 'backgroundPosition': '0 0' })
    .hover(function(){
	$(this).stop()
	  .animate({
	    'opacity': 0
	  }, 650);
	  },
	  function(){
	    $(this).stop()
	      .animate({
		'opacity': 1
	      }, 650);
	  }
    );
});

// Scroll to Top script
jQuery(document).ready(function($){
    $('a[href=#top]').click(function(){
        $('html, body').animate({scrollTop:0}, 'slow');
        return false;
    });
});


// initialise Superfish Menu
jQuery(document).ready(function($){
    var showAutoArrows = parseInt( $("meta[name='show-menu-auto-arrows']").attr('content') );
    var showDropShadows = parseInt( $("meta[name='show-menu-drop-shadows']").attr('content') );
    $("ul.sf-menu").supersubs({
	minWidth:    12,   // minimum width of sub-menus in em units
	maxWidth:    15,   // maximum width of sub-menus in em units
	extraWidth:  1     // extra width can ensure lines don't sometimes turn over
			   // due to slight rounding differences and font-family
    }).superfish({	   // call supersubs first, then superfish, so that subs are not display:none when measuring. Call before initialising containing tabs for same reason.
	delay:       700,  // the delay in milliseconds that the mouse can remain outside a submenu without it closing
	animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
	speed:       'normal',
	autoArrows:  showAutoArrows,
	dropShadows: showDropShadows
    });
});

/**
 * CoolInput Plugin
 *
 * @version 1.5 (10/09/2009)
 * @requires jQuery v1.2.6+
 * @author Alex Weber <alexweber.com.br>
 * @author Evan Winslow <ewinslow@cs.stanford.edu> (v1.5)
 * @copyright Copyright (c) 2008-2009, Alex Weber
 * @see http://remysharp.com/2007/01/25/jquery-tutorial-text-box-hints/
 *
 * Distributed under the terms of the GNU General Public License
 * http://www.gnu.org/licenses/gpl-3.0.html
 */
jQuery(document).ready(function($){
    $.fn.coolinput=function(b){
	var c={
	    hint:null,
	    source:"value",
	    blurClass:"blur",
	    iconClass:false,
	    clearOnSubmit:true,
	    clearOnFocus:true,
	    persistent:true
	};if(b&&typeof b=="object")
	    $.extend(c,b);else
	    c.hint=b;return this.each(function(){
	    var d=$(this);var e=c.hint||d.attr(c.source);var f=c.blurClass;function g(){
		if(d.val()=="")
		    d.val(e).addClass(f)
		    }
	    function h(){
		if(d.val()==e&&d.hasClass(f))
		    d.val("").removeClass(f)
		    }
	    if(e){
		if(c.persistent)
		    d.blur(g);if(c.clearOnFocus)
		    d.focus(h);if(c.clearOnSubmit)
		    d.parents("form:first").submit(h);if(c.iconClass)
		    d.addClass(c.iconClass);g()
		}
	    })
	}
    });
jQuery(document).ready(function($){
	// first input box is a search box, notice passing of a custom class and an icon to the coolInput function
	$('#search_field').coolinput({
		blurClass: 'blur'
	});
});


// ThumbCaption script
jQuery(document).ready(function($){
    $(".portfolio-img-thumb-1-col, .portfolio-img-thumb-2-col, .portfolio-img-thumb-3-col, .portfolio-img-thumb-4-col").hover(function(){
	    var info=$(this).find(".hover-opacity");
	    info.stop().animate({opacity:0.4},400);
    },
    function(){
	    var info=$(this).find(".hover-opacity");
	    info.stop().animate({opacity:1},400);
    });

    $(".post-image").hover(function(){
	    var info=$(this).find(".hover-opacity");
	    info.stop().animate({opacity:0.6},400);
    },
    function(){
	    var info=$(this).find(".hover-opacity");
	    info.stop().animate({opacity:1},400);
    });
});

// jQuery Validate
jQuery(document).ready(function($){
    if( $('body').hasClass('page-template-page-Contact-php') ) {
	// load js translated strings only when Contact page template is loaded
	$("#contactForm").validate({
	    rules: {
		    contact_name: {
			    required: true,
			    minlength: 2
		    },
		    contact_email: {
			    required: true,
			    email: true
		    },
		    contact_message: $('input#rules_contact_message').val()
	    },
	    messages: {
		    contact_name: {
			    required: $('input#contact_name_required').val(),
			    minlength: $('input#contact_name_min_length').val()
		    },
		    contact_email: $('input#messages_contact_email').val(),
		    contact_message: $('input#messages_contact_message').val()
	    }
	});
	// phone number + extension format validator
	$("#contact_phone_NA_format").mask("(999) 999-9999");
	$("#contact_ext_NA_format").mask("? 99999");
    }
});


// Content Toggle
jQuery(function($){
    // Initial state of toggle (hide)
    $(".slide_toggle_content").hide();
    // Process Toggle click (http://api.jquery.com/toggle/)
    $("h4.slide_toggle").toggle(function(){
	    $(this).addClass("clicked");
	}, function () {
	    $(this).removeClass("clicked");
    });
    // Toggle animation (http://api.jquery.com/slideToggle/)
    $("h4.slide_toggle").click(function(){
	$(this).next(".slide_toggle_content").slideToggle();
    });
});

// Content Accordion
jQuery(document).ready(function($){
    $('.accordion-container').hide();
    $('.accordion-toggle:first').addClass('active').next().show();
    $('.accordion-toggle').click(function(){
        if( $(this).next().is(':hidden') ) {
            $('.accordion-toggle').removeClass('active').next().slideUp();
            $(this).toggleClass('active').next().slideDown();
        }
        return false; // Prevent the browser jump to the link anchor
    });
});

//Page Peel
jQuery(document).ready(function($){
    $("#page-peel").hover(function() {
	$("#page-peel img, .msg_block").stop()
	.animate({ width: '307px', height: '319px' }, 500);
    }, function() {
	$("#page-peel img").stop()
	.animate({ width: '50px', height: '52px' }, 220);
	$(".msg_block").stop()
	.animate({ width: '50px', height: '50px' }, 200);
    });
});

// remove the title attributes from the main menu and Subpages Widget
jQuery(document).ready(function($) {
        // remove 'title' attribute from menu items
        $("#navigation-menu a, .widget_subpages a").removeAttr("title");
        // Add the 'default' cursor when hover to menu link that have no links
        $('#navigation-menu a').each(function() {
            if ( !$(this).attr("href") ) {
                $(this).addClass("default-cursor");
            }
        });
});

// Tabs
jQuery(document).ready(function($){
	$('.tabs a').click(function(){
		switch_tabs($(this));
	});
	switch_tabs($('.defaulttab'));
	function switch_tabs(obj) {
		$('.tab-content').hide();
		$('.tabs a').removeClass("selected");
		var id = obj.attr("rel");
		$('#'+id).show();
		obj.addClass("selected");
	}
});
