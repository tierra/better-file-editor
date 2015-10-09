<?php
/**
 * Plugin Name: Better File Editor
 * Plugin URI:  https://wordpress.org/plugins/better-file-editor/
 * Description: Adds line numbers, syntax highlighting, code folding, and lots more to the theme and plugin editors in the admin panel.
 * Version:     2.3.0
 * Author:      Bryan Petty <bryan@ibaku.net>
 * Author URI:  https://profiles.wordpress.org/bpetty/
 * License:     GPLv2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: bfe
 * Domain Path: /languages
 */

/**
 * Main Better File Editor class.
 *
 * Handles plugin initialization and primary actions and filters.
 */
class BetterFileEditorPlugin {

	function BetterFileEditorPlugin() {
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'admin_print_scripts-theme-editor.php', array( $this, 'admin_print_scripts' ) );
		add_action( 'admin_print_scripts-plugin-editor.php', array( $this, 'admin_print_scripts' ) );
	}

	function init() {
		load_plugin_textdomain( 'bfe', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

		wp_register_style( 'better-file-editor.min',
			plugins_url( 'assets/css/better-file-editor.min.css', __FILE__ ));

		wp_register_script( 'require',
			plugins_url( 'assets/js/require.js', __FILE__ ),
			array(), '2.1.20' );
		wp_register_script( 'ace',
			plugins_url( 'assets/js/ace/ace.js', __FILE__ ),
			array( 'require' ), '1.2.0' );
		wp_register_script( 'ace-ext-modelist',
			plugins_url( 'assets/js/ace/ext-modelist.js', __FILE__ ),
			array( 'ace' ), '1.2.0' );
		wp_register_script( 'better-file-editor',
			plugins_url( 'assets/js/better-file-editor.js', __FILE__ ),
			array( 'ace', 'ace-ext-modelist' ), '2.3.0' );
	}

	function admin_print_scripts( $page ) {
		wp_enqueue_style( 'better-file-editor.min' );
		wp_enqueue_script( 'better-file-editor' );
	}

}

$bfe_plugin = new BetterFileEditorPlugin();
