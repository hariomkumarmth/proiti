
// Cycle plugin config
jQuery(document).ready(function($){
    var baseURL = $('input.base-url').val();
    var c2TransitionType = "fade";
    var c2Speed = 1500;
    var c2Timeout = 5000;
    var c2Sync = 1;
    var c2TextTransitionOn = 1;

    $.get(baseURL+"/wp-content/themes/u-design/sliders/cycle/cycle2/cycle2_params.php", function(theXML){
	$('settings',theXML).each(function(i){
	    c2TransitionType = $(this).find("fx").text();
	    c2Speed = parseInt($(this).find("speed").text());
	    c2Timeout = parseInt($(this).find("timeout").text());
	    c2Sync = parseInt($(this).find("sync").text());
	    c2TextTransitionOn = parseInt($(this).find("texttrans").text());
	});

	/* homepage slider params */
	$('#c2-slider').cycle({
	    fx:			c2TransitionType,
	    before:		onBefore,
	    after:		onAfter,
	    speed:		c2Speed,
	    timeout:		c2Timeout,
	    sync:		c2Sync,
	    randomizeEffects:	0,
	    prev:		'#slider-prev',
	    next:		'#slider-next',
	    pager:		'#c2-nav'
	});
	function onBefore(curr, next, opts) {
	    if (!c2TextTransitionOn){
		$(curr).find('.slide-desc').css({display:'none'});
		$(next).find('.slide-desc').css({display:'none'});
	    }
	}
	function onAfter(curr, next, opts) {
	    if (!c2TextTransitionOn){
		$(this).find('.slide-desc').css({display:'block'});
	    }
	}

	$('#c2-pauseButton').click(function() {
	    $('#c2-slider').cycle('pause');
	    return false;
	});

	$('#c2-resumeButton').click(function() {
	    $('#c2-slider').cycle('resume', true);
	    return false;
	});

    });
});




