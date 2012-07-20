<?php
/*
Plugin Name: Better File Editor
Plugin URI: http://wordpress.org/extend/plugins/better-file-editor/
Description: Adds line numbers, syntax highlighting, code folding, and lots more to the theme and plugin editors in the admin panel.
Version: 2.0
Author: Bryan Petty <bryan@ibaku.net>
Author URI: http://profiles.wordpress.org/bpetty/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

class BetterFileEditorPlugin {

	function BetterFileEditorPlugin() {
		add_action('admin_footer-theme-editor.php', array($this, 'print_scripts'));
		add_action('admin_footer-plugin-editor.php', array($this, 'print_scripts'));
	}

	function print_scripts() {
		// data-ace-base="js/lib/ace"
		?>
			<script src="<?php echo plugins_url( 'js/ace/ace.js' , __FILE__ ); ?>"
				type="text/javascript" charset="utf-8"></script>
			<script src="<?php echo plugins_url( 'js/wp-ace.js' , __FILE__ ); ?>"></script>
			<script type="text/javascript" charset="utf-8">
				jQuery(document).ready(function() {
					require("wp-ace");
				});
			</script>
			<style type="text/css">
				#template div {
					margin-right: 0px;
				}
				#template #editor {
					margin-right: 210px;
				}
				#wp-ace-editor {
					position: relative;
					height: 560px;
					font-size: 12px;
				}
				.ace_editor {
					font-family: Consolas, Menlo, "Liberation Mono", Courier, monospace !important;
				}
			</style>
		<?php
	}

}

$bfe_plugin = new BetterFileEditorPlugin();