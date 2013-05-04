<?php 

// look up for the path
require_once( dirname( dirname(__FILE__) ) .'/udesignShortcodeInsert-config.php');

// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) 
	wp_die(__("You are not allowed to be here"));


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>U-Design Shortcodes by Category:</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript">
        // <![CDATA[
	function init() {
		tinyMCEPopup.resizeToInnerSize();
	}

	function insertudesignSILink() {

		var shortcodetext;
		var ibMiscellaneous = document.getElementById('ib-miscellaneous-panel');
		var ibColumnLayouts = document.getElementById('ib-column-layouts-panel');
		var ibImages = document.getElementById('ib-images-panel');
		var ibButtons = document.getElementById('ib-buttons-panel');
		var ibMessageBoxeStyle = document.getElementById('ib-message-box-style');

		// which tab is active ?
                if (ibMiscellaneous.className.indexOf('current') != -1) {

                        var selectedMiscellaneousShortcode = document.getElementById("ib-miscellaneous-shortcode").value;
                        
                        // Pullquote (left)
                        if(selectedMiscellaneousShortcode == 'pullquote_left')
                            shortcodetext = '[pullquote style="left" quote="dark"]Your quote text goes here...[/pullquote]';
                        // Pullquote (right)
                        else if(selectedMiscellaneousShortcode == 'pullquote_right')
                            shortcodetext = '[pullquote style="right" quote="dark"]Your quote text goes here...[/pullquote]';
                        // Content Toggle
                        else if(selectedMiscellaneousShortcode == 'toggle_content')
                            shortcodetext = '[toggle_content title="Toggle Content Title..."]Your content goes here...[/toggle_content]';
                        // Tabs
                        else if(selectedMiscellaneousShortcode == 'content_tabs') {
                            shortcodetext = '[tabs]<br />' +
                                                '&nbsp;&nbsp;&nbsp;&nbsp;[tab title="Title 1"]Content for Tab 1 goes here...[/tab]<br />' +
                                                '&nbsp;&nbsp;&nbsp;&nbsp;[tab title="Title 2"]Content for Tab 2 goes here...[/tab]<br />' +
                                                '&nbsp;&nbsp;&nbsp;&nbsp;[tab title="Title 3"]Content for Tab 3 goes here...[/tab]<br />' +
                                            '[/tabs]';
                        }
                        // Accordion
                        else if(selectedMiscellaneousShortcode == 'content_accordion') {
                            shortcodetext = '[accordion]<br />' +
                                                '&nbsp;&nbsp;&nbsp;&nbsp;[accordion_toggle title="Title 1"]Content for Accordion Toggle 1 goes here...[/accordion_toggle]<br />' +
                                                '&nbsp;&nbsp;&nbsp;&nbsp;[accordion_toggle title="Title 2"]Content for Accordion Toggle 2 goes here...[/accordion_toggle]<br />' +
                                                '&nbsp;&nbsp;&nbsp;&nbsp;[accordion_toggle title="Title 3"]Content for Accordion Toggle 3 goes here...[/accordion_toggle]<br />' +
                                            '[/accordion]';
                        }
                        // List styles
                        else if( (selectedMiscellaneousShortcode == 'list-1') || (selectedMiscellaneousShortcode == 'list-2') ||
                                    (selectedMiscellaneousShortcode == 'list-3') || (selectedMiscellaneousShortcode == 'list-4') || (selectedMiscellaneousShortcode == 'list-5') ||
                                    (selectedMiscellaneousShortcode == 'list-6') || (selectedMiscellaneousShortcode == 'list-7') || (selectedMiscellaneousShortcode == 'list-8') ||
                                    (selectedMiscellaneousShortcode == 'list-9') || (selectedMiscellaneousShortcode == 'list-10') || (selectedMiscellaneousShortcode == 'list-11') ) {
                            shortcodetext = '[custom_list style="'+selectedMiscellaneousShortcode+'"]' + 
                                                '<ul>' +
                                                    '<li>your list item</li>' +
                                                    '<li>your list item</li>' +
                                                    '<li>your list item</li>' +
                                                '</ul>' +
                                            '[/custom_list]';
                        }
                        // Dropcap
                        if(selectedMiscellaneousShortcode == 'dropcap')
                            shortcodetext = '[dropcap]A[/dropcap]';
                        // Tabs
                        else if(selectedMiscellaneousShortcode == 'custom_table') {
                            shortcodetext = '[custom_table]' +
                                            '<table class="custom-table" summary="Sample Table">' +
                                                '<thead>' +
                                                    '<tr>' +
                                                        '<th scope="col">Header 1</th>' +
                                                        '<th scope="col">Header 2</th>' +
                                                        '<th scope="col">Header 3</th>' +
                                                        '<th scope="col">Header 4</th>' +
                                                    '</tr>' +
                                                '</thead>' +
                                                '<tbody>' +
                                                    '<tr>' +
                                                        '<td>Item 1</td>' +
                                                        '<td>Description</td>' +
                                                        '<td>Subtotal:</td>' +
                                                        '<td>$0.00</td>' +
                                                    '</tr>' +
                                                    '<tr>' +
                                                        '<td>Item 2</td>' +
                                                        '<td>Description</td>' +
                                                        '<td>Discount:</td>' +
                                                        '<td>$0.00</td>' +
                                                    '</tr>' +
                                                    '<tr>' +
                                                        '<td>Item 3</td>' +
                                                        '<td>Description</td>' +
                                                        '<td>Shipping:</td>' +
                                                        '<td>$0.00</td>' +
                                                   '</tr>' +
                                                   '<tr>' +
                                                        '<td>Item 4</td>' +
                                                        '<td>Description</td>' +
                                                        '<td>Tax:</td>' +
                                                        '<td>$0.00</td>' +
                                                    '</tr>' +
                                                    '<tr>' +
                                                        '<td>Item 1:</td>' +
                                                        '<td>Description</td>' +
                                                        '<td><strong>TOTAL:</strong></td>' +
                                                        '<td><strong>$0.00</strong></td>' +
                                                    '</tr>' +
                                                '</tbody>' +
                                                '<tfoot>' +
                                                    '<tr>' +
                                                        '<td colspan="4">' +
                                                            '*Table Footer here...' +
                                                        '</td>' +
                                                    '</tr>' +
                                                '</tfoot>' +
                                            '</table>' +
                                            '[/custom_table]';
                        }
                        else if(selectedMiscellaneousShortcode == 'recent_posts_default')
                            shortcodetext = '[udesign_recent_posts]';
                        else if(selectedMiscellaneousShortcode == 'recent_posts_custom')
                            shortcodetext = '[udesign_recent_posts title="Recent Posts" category_id="1" num_posts="3" post_offset="0" num_words_limit="23" show_date_author="0" show_more_link="0" show_thumbs="1" thumb_frame_shadow="1" post_thumb_width="100" post_thumb_height="80"]';
                        else if(selectedMiscellaneousShortcode == 'divider')
                            shortcodetext = '[divider]';
                        else if(selectedMiscellaneousShortcode == 'divider_top')
                            shortcodetext = '[divider_top]';
                        else if(selectedMiscellaneousShortcode == 'clear')
                            shortcodetext = '[clear]';

		} else if (ibColumnLayouts.className.indexOf('current') != -1) {

                        var selectedColumnLayoutsShortcode = document.getElementById("ib-column-layouts-shortcode").value;

                        // Grouped Sets Full-width:
                        if(selectedColumnLayoutsShortcode == '1_4|1_4|1_4|1_4_last')
                            shortcodetext = '[one_fourth]Your content here...[/one_fourth] [one_fourth]Your content here...[/one_fourth] [one_fourth]Your content here...[/one_fourth] [one_fourth_last]Your content here...[/one_fourth_last]';
                        if(selectedColumnLayoutsShortcode == '1_4|3_4_last')
                            shortcodetext = '[one_fourth]Your content here...[/one_fourth] [three_fourth_last]Your content here...[/three_fourth_last]';
                        if(selectedColumnLayoutsShortcode == '3_4|1_4_last')
                            shortcodetext = '[three_fourth]Your content here...[/three_fourth] [one_fourth_last]Your content here...[/one_fourth_last]';
                        if(selectedColumnLayoutsShortcode == '1_4|1_4|1_2_last')
                            shortcodetext = '[one_fourth]Your content here...[/one_fourth] [one_fourth]Your content here...[/one_fourth] [one_half_last]Your content here...[/one_half_last]';
                        if(selectedColumnLayoutsShortcode == '1_2|1_4|1_4_last')
                            shortcodetext = '[one_half]Your content here...[/one_half] [one_fourth]Your content here...[/one_fourth] [one_fourth_last]Your content here...[/one_fourth_last]';
                        if(selectedColumnLayoutsShortcode == '1_3|1_3|1_3_last')
                            shortcodetext = '[one_third]Your content here...[/one_third] [one_third]Your content here...[/one_third] [one_third_last]Your content here...[/one_third_last]';
                        if(selectedColumnLayoutsShortcode == '1_3|2_3_last')
                            shortcodetext = '[one_third]Your content here...[/one_third] [two_third_last]Your content here...[/two_third_last]';
                        if(selectedColumnLayoutsShortcode == '2_3|1_3_last')
                            shortcodetext = '[two_third]Your content here...[/two_third] [one_third_last]Your content here...[/one_third_last]';
                        if(selectedColumnLayoutsShortcode == '1_2|1_2_last')
                            shortcodetext = '[one_half]Your content here...[/one_half] [one_half_last]Your content here...[/one_half_last]';

                        // Grouped Sets regular Page with sidebar:
                        if(selectedColumnLayoutsShortcode == '1_3|1_3_last')
                            shortcodetext = '[one_third]Your content here...[/one_third] [one_third_last]Your content here...[/one_third_last]';
                        
                        // One Fourth
                        if(selectedColumnLayoutsShortcode == 'one_fourth')
                            shortcodetext = '[one_fourth]Your content here...[/one_fourth]';
                        else if(selectedColumnLayoutsShortcode == 'one_fourth_last')
                            shortcodetext = '[one_fourth_last]Your content here...[/one_fourth_last]';
                        // One Third
                        else if(selectedColumnLayoutsShortcode == 'one_third')
                            shortcodetext = '[one_third]Your content here...[/one_third]';
                        else if(selectedColumnLayoutsShortcode == 'one_third_last')
                            shortcodetext = '[one_third_last]Your content here...[/one_third_last]';
                        // One Half
                        else if(selectedColumnLayoutsShortcode == 'one_half')
                            shortcodetext = '[one_half]Your content here...[/one_half]';
                        else if(selectedColumnLayoutsShortcode == 'one_half_last')
                            shortcodetext = '[one_half_last]Your content here...[/one_half_last]';
                        // Two Third
                        else if(selectedColumnLayoutsShortcode == 'two_third')
                            shortcodetext = '[two_third]Your content here...[/two_third]';
                        else if(selectedColumnLayoutsShortcode == 'two_third_last')
                            shortcodetext = '[two_third_last]Your content here...[/two_third_last]';
                        // Three Fourth
                        else if(selectedColumnLayoutsShortcode == 'three_fourth')
                            shortcodetext = '[three_fourth]Your content here...[/three_fourth]';
                        else if(selectedColumnLayoutsShortcode == 'three_fourth_last')
                            shortcodetext = '[three_fourth_last]Your content here...[/three_fourth_last]';

		} else if (ibImages.className.indexOf('current') != -1) {
                    
                        var selectedImageFrameAlignment = document.getElementById("ib-images-shortcode-alignment").value;
                        var ibImagesRemoveShadow = document.getElementById('ib-images-add-shadow').checked;
                        ibImagesRemoveShadow = ( ibImagesRemoveShadow == true ) ? ' shadow="on"' : '';

                        if(selectedImageFrameAlignment == 'left')
                            shortcodetext = '[custom_frame_left'+ibImagesRemoveShadow+']##[/custom_frame_left]';
                        else if(selectedImageFrameAlignment == 'right')
                            shortcodetext = '[custom_frame_right'+ibImagesRemoveShadow+']##[/custom_frame_right]';
                        else
                            shortcodetext = '[custom_frame_center'+ibImagesRemoveShadow+']##[/custom_frame_center]';
                        
		} else if ( ibButtons.className.indexOf('current') != -1 ) {
                    
                        var selectedButton = document.getElementById("ib-selected-button").value;
			var ibButtonTarget = document.getElementById('ib-button-target-blank').checked;
                        var ibButtonTargetHTML;
                        ibButtonTargetHTML = ( ibButtonTarget == true ) ? ' target="_blank"' : ' target="_self"';
                        var ibButtonAlignmen = document.getElementById("ib-button-alignmen").value;
                        var ibButtonSize = document.getElementById("ib-button-size").value;

                        if(selectedButton == '1')
                            shortcodetext = '[small_button text="Cool Button..." title="Cool Button" url="http://www.your-link-goes-here.com/" align="'+ibButtonAlignmen+'" '+ibButtonTargetHTML+' style="light"]';
                        else if(selectedButton == '2')
                            shortcodetext = '[small_button text="Cool Button..." title="Cool Button" url="http://www.your-link-goes-here.com/" align="'+ibButtonAlignmen+'" '+ibButtonTargetHTML+']';
                        else if(selectedButton == '3')
                            shortcodetext = '[button text="Cool Button..." title="Cool Button..." url="http://www.your-link-goes-here.com/" align="'+ibButtonAlignmen+'" '+ibButtonTargetHTML+' style="light"]';
                        else if(selectedButton == '4')
                            shortcodetext = '[button text="Cool Button..." title="Cool Button..." url="http://www.your-link-goes-here.com/" align="'+ibButtonAlignmen+'" '+ibButtonTargetHTML+']';
                        else if(selectedButton == '5')
                            shortcodetext = '[button_with_arrow text="Cool Button..." title="Cool Button" url="http://www.your-link-goes-here.com/" align="'+ibButtonAlignmen+'" '+ibButtonTargetHTML+' style="light"]';
                        else if(selectedButton == '6')
                            shortcodetext = '[button_with_arrow text="Cool Button..." title="Cool Button" url="http://www.your-link-goes-here.com/" align="'+ibButtonAlignmen+'" '+ibButtonTargetHTML+']';
                        else if(selectedButton == '7')
                            shortcodetext = '[custom_button text="Custom Button" title="Custom Button" url="http://www.your-link-goes-here.com/" size="'+ibButtonSize+'" bg_color="#FF5C00" text_color="#FFFFFF" align="'+ibButtonAlignmen+'" '+ibButtonTargetHTML+']';
                        else if(selectedButton == '8')
                            shortcodetext = '[read_more text="Read more" title="Read More..." url="" align="'+ibButtonAlignmen+'" '+ibButtonTargetHTML+']';
                        
                        
                        
                } else if (ibMessageBoxeStyle.className.indexOf('current') != -1) {
                    
                        var selectedMessageBoxStyleShortcode = document.getElementById("ib-message-box-style-shortcode").value;
                        
                        if(selectedMessageBoxStyleShortcode == 'info')
                            shortcodetext = '[message type="info"]Replace this text with your message...[/message]';
                        else if(selectedMessageBoxStyleShortcode == 'success')
                            shortcodetext = '[message type="success"]Replace this text with your message...[/message]';
                        else if(selectedMessageBoxStyleShortcode == 'warning')
                            shortcodetext = '[message type="warning"]Replace this text with your message...[/message]';
                        else if(selectedMessageBoxStyleShortcode == 'erroneous')
                            shortcodetext = '[message type="erroneous"]Replace this text with your message...[/message]';
                        if(selectedMessageBoxStyleShortcode == 'simple')
                            shortcodetext = '[message type="simple"]Replace this text with your message...[/message]';
                        else if(selectedMessageBoxStyleShortcode == 'custom')
                            shortcodetext = '[message type="custom" width="100%" start_color="#FFFCB5" end_color="#F4CBCB" border="#BBBBBB" color="#333333"]Replace this text with your message...[/message]';
                        
		}

                // Insert a space right after the shortcode, to prevent the problem of having two shortcodes back-to-back with no space b/n them, which causes problems
                shortcodetext = shortcodetext + ' ';

		if(window.tinyMCE) {
			window.tinyMCE.execInstanceCommand(window.tinyMCE.activeEditor.id, 'mceInsertContent', false, shortcodetext);
			//Peforms a clean up of the current editor HTML. 
			//tinyMCEPopup.editor.execCommand('mceCleanup');
			//Repaints the editor. Sometimes the browser has graphic glitches. 
			tinyMCEPopup.editor.execCommand('mceRepaint');
			tinyMCEPopup.close();
		}
		
		return;
	}
        // ]]>
	</script>
	<base target="_self" />
</head>
<body id="link" onload="tinyMCEPopup.executeOnLoad('init();');" style="display: none">
    
    <div style="margin: 5px auto 12px;"><h4>To preview examples of the shortcodes click <a href="http://idesignmywebsite.com/u-design/?page_id=59" target="_blank">HERE</a></h4></div>
    
    <!-- <form onsubmit="insertLink();return false;" action="#"> -->
    <form name="udesignShortcodeInsert" action="#">
        <div class="tabs">
            <ul>
                <li id="ib-miscellaneous-tab" class="current"><span><a href="javascript:mcTabs.displayTab('ib-miscellaneous-tab','ib-miscellaneous-panel');" onmousedown="return false;"><?php _e("Miscellaneous", 'udesignSI'); ?></a></span></li>
                <li id="ib-column-layouts-tab"><span><a href="javascript:mcTabs.displayTab('ib-column-layouts-tab','ib-column-layouts-panel');" onmousedown="return false;"><?php _e("Column Layouts", 'udesignSI'); ?></a></span></li>
                <li id="ib-images-tab"><span><a href="javascript:mcTabs.displayTab('ib-images-tab','ib-images-panel');" onmousedown="return false;"><?php _e("Images", 'udesignSI'); ?></a></span></li>
                <li id="ib-buttons-tab"><span><a href="javascript:mcTabs.displayTab('ib-buttons-tab','ib-buttons-panel');" onmousedown="return false;"><?php _e("Buttons", 'udesignSI'); ?></a></span></li>
                <li id="ib-message-box-style-tab"><span><a href="javascript:mcTabs.displayTab('ib-message-box-style-tab','ib-message-box-style');" onmousedown="return false;"><?php _e("Message Boxes", 'udesignSI'); ?></a></span></li>
            </ul>
	</div>

	<div class="panel_wrapper"  style="height:180px;">
            
		<!-- Miscellaneous panel -->
		<div id="ib-miscellaneous-panel" class="panel current">
                    <br />
                    <label for="ib-miscellaneous-shortcode"><?php _e("<strong>Please select an option that you wish to get the shortcode for then hit the 'Insert' button. Keep in mind that some shortcodes would require you to provide additional information specific to your site (e.g. 'category id', or 'color', etc.) after you insert them</strong>:", 'udesignSI'); ?></label><br /><br />
                    <select name="ib-miscellaneous-shortcode" id="ib-miscellaneous-shortcode">
                            <option value="pullquote_left">Pullquote (left)</option>
                            <option value="pullquote_right">Pullquote (right)</option>
                            <option value="toggle_content">Content Toggle</option>
                            <option value="content_tabs">Tabs</option>
                            <option value="content_accordion">Accordion</option>
                            <option value="list-1">List Style 1</option>
                            <option value="list-2">List Style 2</option>
                            <option value="list-3">List Style 3</option>
                            <option value="list-4">List Style 4</option>
                            <option value="list-5">List Style 5</option>
                            <option value="list-6">List Style 6</option>
                            <option value="list-7">List Style 7</option>
                            <option value="list-8">List Style 8</option>
                            <option value="list-9">List Style 9</option>
                            <option value="list-10">List Style 10</option>
                            <option value="list-11">List Style 11</option>
                            <option value="dropcap">Dropcap</option>
                            <option value="custom_table">Custom Table style</option>
                            <option value="recent_posts_default">Recent Posts (default)</option>
                            <option value="recent_posts_custom">Recent Posts (custom)</option>
                            <option value="divider">Divider (horizontal line)</option>
                            <option value="divider_top">Divider (horizontal line with "Back to Top" link)</option>
                            <option value="clear">Clear</option>
                    </select>
		</div>
		<!-- end Miscellaneous panel -->
            
		<!-- Column Layouts panel -->
		<div id="ib-column-layouts-panel" class="panel">
                    <br />
                    <label for="ib-column-layouts-shortcode"><?php _e("<strong>Please select a column layout that you wish to use then hit the 'Insert' button</strong>:", 'udesignSI'); ?></label><br /><br />
                    <select name="ib-column-layouts-shortcode" id="ib-column-layouts-shortcode">
                            <optgroup style="padding: 0 7px;" label="Grouped Columns Usages for Full-width Page layout">
                                <option value="1_4|1_4|1_4|1_4_last">One Fourth | One Fourth | One Fourth | One Fourth Last</option>
                                <option value="1_4|3_4_last">One Fourth | Three Fourth Last</option>
                                <option value="3_4|1_4_last">Three Fourth | One Fourth Last</option>
                                <option value="1_4|1_4|1_2_last">One Fourth | One Fourth | One Half Last</option>
                                <option value="1_2|1_4|1_4_last">One Half | One Fourth | One Fourth Last</option>
                                <option value="1_3|1_3|1_3_last">One Third | One Third | One Third Last</option>
                                <option value="1_3|2_3_last">One Third | Two Third Last</option>
                                <option value="2_3|1_3_last">Two Third | One Third Last</option>
                                <option value="1_2|1_2_last">One Half | One Half Last</option>
                            </optgroup>
                            <optgroup style="padding: 0 7px;" label="Grouped Columns Usages for regular Page with sidebar layout">
                                <option value="1_3|1_3_last">One Third | One Third Last</option>
                            </optgroup>
                            <optgroup style="padding: 0 7px;" label="Single Column Usages">
                                <option value="one_fourth">One Fourth</option>
                                <option value="one_fourth_last">One Fourth Last</option>
                                <option value="one_third">One Third</option>
                                <option value="one_third_last">One Third Last</option>
                                <option value="one_half">One Half</option>
                                <option value="one_half_last">One Half Last</option>
                                <option value="two_third">Two Third</option>
                                <option value="two_third_last">Two Third Last</option>
                                <option value="three_fourth">Three Fourth</option>
                                <option value="three_fourth_last">Three Fourth Last</option>
                            </optgroup>
                    </select>
		</div>
		<!-- end Column Layouts panel -->
            
		<!-- Images panel -->
		<div id="ib-images-panel" class="panel">
                    <br />
                    <label for="ib-images-shortcode-alignment"><?php _e("<strong>Please select a shortcode that you wish to use then hit the 'Insert' button. Then insert your image in the place of the '##'</strong>:", 'udesignSI'); ?></label><br /><br />
                    <select name="ib-images-shortcode-alignment" id="ib-images-shortcode-alignment">
                            <option value="left">Custom Image Frame with Left Alignment</option>
                            <option value="right">Custom Image Frame with Right Alignment</option>
                            <option value="center">Custom Image Frame with Center Alignment</option>
                    </select>
                    <br /><br />
                    <label for="ib-images-add-shadow">
                        <input type="checkbox" name="ib-images-add-shadow" id="ib-images-add-shadow" value="yes" />
                        <?php esc_html_e('Add image frame shadow', 'udesignSI'); ?>
                    </label>
		</div>
		<!-- end Images panel -->

		<!-- Buttons panel -->
		<div id="ib-buttons-panel" class="panel">
                    <br />
                    <label for="ib-selected-button"><?php _e("<strong>Please select the type of button and respective options. Then hit the 'Insert' button</strong>:", 'udesignSI'); ?></label><br /><br />
                    <select name="ib-selected-button" id="ib-selected-button">
                            <option value="1">Small Button (Light)</option>
                            <option value="2">Small Button (Dark)</option>
                            <option value="3">Large Button (Light)</option>
                            <option value="4">Large Button (Dark)</option>
                            <option value="5">Round Button(Light)</option>
                            <option value="6">Round Button(Dark)</option>
                            <option value="7">Custom Button</option>
                            <option value="8">Read more (link)</option>
                    </select>
                    <br /><br />
                    <label for="ib-button-alignmen"><?php _e("Button alignment:", 'udesignSI'); ?></label>&nbsp;
                    <select name="ib-button-alignmen" id="ib-button-alignmen">
                            <option value="left">Left</option>
                            <option value="right">Right</option>
                    </select> &nbsp;&nbsp;&nbsp;&nbsp;
                    <label for="ib-button-target-blank">
                        <input type="checkbox" name="ib-button-target-blank" id="ib-button-target-blank" value="yes" />
                        <?php esc_html_e('Open the link in a new window?', 'udesignSI'); ?>
                    </label>
                    <br /><br />
                    <label for="ib-button-size"><?php _e("Custom Button size:", 'udesignSI'); ?></label>&nbsp;
                    <select name="ib-button-size" id="ib-button-size">
                            <option value="small">Small</option>
                            <option value="medium" selected="selected">Medium</option>
                            <option value="large">Large</option>
                            <option value="x-large">X-Large</option>
                    </select> 
                    Only applies to the "Custom Button" option
		</div>
		<!-- end Buttons panel -->
                
		<!-- Message Boxes panel -->
		<div id="ib-message-box-style" class="panel">
                    <br />
                    <label for="ib-message-box-style-shortcode"><?php _e("<strong>Please select a message box from the dropdown below. The 'custom' box type has additional attributes that you can modify like colors, width, etc. You'll be able to do that in the actual shortcode after you insert it</strong>:", 'udesignSI'); ?></label><br /><br />
                    <select name="ib-message-box-style-shortcode" id="ib-message-box-style-shortcode">
                            <option value="info">"info" Box Type</option>
                            <option value="success">"success" Box Type</option>
                            <option value="warning">"warning" Box Type</option>
                            <option value="erroneous">"erroneous" Box Type</option>
                            <option value="simple">"simple" Box Type</option>
                            <option value="custom">"custom" Box Type</option>
                    </select>
		</div>
		<!-- end Message Boxes panel -->
	</div>

	<div class="mceActionPanel">
		<div style="float: left">
			<input type="button" id="cancel" name="cancel" value="<?php _e("Cancel", 'udesignSI'); ?>" onclick="tinyMCEPopup.close();" />
		</div>

		<div style="float: right">
			<input type="submit" id="insert" name="insert" value="<?php _e("Insert", 'udesignSI'); ?>" onclick="insertudesignSILink();" />
		</div>
	</div>
    </form>
</body>
</html>