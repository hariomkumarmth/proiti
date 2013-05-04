/**
 *
 * Documentation: 
 * http://wiki.moxiecode.com/index.php/TinyMCE:Create_plugin/3.x#Creating_your_own_plugins
 * http://tinymce.moxiecode.com/wiki.php/Creating_a_plugin
 * 
 */

(function() {
	// Load plugin specific language pack
	tinymce.PluginManager.requireLangPack('udesignShortcodeInsert');
	
	tinymce.create('tinymce.plugins.udesignShortcodeInsert', {
		/**
		 * Initializes the plugin, this will be executed after the plugin has been created.
		 * This call is done before the editor instance has finished it's initialization so use the onInit event
		 * of the editor instance to intercept that event.
		 *
		 * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
		 * @param {string} url Absolute URL to where the plugin is located.
		 */
		init : function(ed, url) {
			// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('mceExample');

			ed.addCommand('mceudesignShortcodeInsert', function() {
				ed.windowManager.open({
					file : url + '/window.php',
					width : 480 + ed.getLang('udesignShortcodeInsert.delta_width', 0),
					height : 310 + ed.getLang('udesignShortcodeInsert.delta_height', 0),
					inline : 1
				}, {
					plugin_url : url // Plugin absolute URL
				});
			});

			// Register example button
			ed.addButton('udesignShortcodeInsert', {
				title : 'udesignShortcodeInsert.desc',
				cmd : 'mceudesignShortcodeInsert',
				image : url + '/udesignShortcodeInsert.png'
			});

			// Add a node change handler, selects the button in the UI when a image is selected
			ed.onNodeChange.add(function(ed, cm, n) {
				cm.setActive('udesignShortcodeInsert', n.nodeName == 'IMG');
			});
		},

		/**
		 * Returns information about the plugin as a name/value array.
		 * The current keys are longname, author, authorurl, infourl and version.
		 *
		 * @return {Object} Name/value array containing information about the plugin.
		 */
		getInfo : function() {
			return {
					longname  : 'udesignShortcodeInsert',
					author 	  : 'Andon',
					authorurl : 'http://themeforest.net/user/internq7/portfolio?ref=internq7',
					infourl   : 'http://themeforest.net/item/udesign-wordpress-theme/253220?ref=internq7',
					version   : "1.0.3"
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('udesignShortcodeInsert', tinymce.plugins.udesignShortcodeInsert);
})();


