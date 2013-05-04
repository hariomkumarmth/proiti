
// Cycle plugin config
jQuery(document).ready(function($){
    var baseURL = $('input.base-url').val();
    var c1TransitionType = "fade";
    var c1Speed = 1000;
    var c1Timeout = 5000;
    var c1Sync = 1;

    $.get(baseURL+"/wp-content/themes/u-design/sliders/cycle/cycle1/cycle1_params.php", function(theXML){
	$('settings',theXML).each(function(i){
	    c1TransitionType = $(this).find("fx").text();
	    c1Speed = parseInt($(this).find("speed").text());
	    c1Timeout = parseInt($(this).find("timeout").text());
	    c1Sync = parseInt($(this).find("sync").text());
	});

	/* homepage slider params */
	$('#c1-slider').cycle({
	    fx:			c1TransitionType,
	    speed:		c1Speed,
	    timeout:		c1Timeout,
	    sync:		c1Sync,
	    randomizeEffects:	0,
	    prev:		'#slider-prev',
	    next:		'#slider-next',
	    pager:		'#c1-nav'
	});

	$('#c1-pauseButton').click(function() {
	    $('#c1-slider').cycle('pause');
	    return false;
	});

	$('#c1-resumeButton').click(function() {
	    $('#c1-slider').cycle('resume', true);
	    return false;
	});

    });
});

