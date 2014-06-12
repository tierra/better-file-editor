<?php
/*
Plugin Name: Better File Editor
Plugin URI: http://wordpress.org/extend/plugins/better-file-editor/
Description: Adds line numbers, syntax highlighting, code folding, and lots more to the theme and plugin editors in the admin panel.
Version: 2.1.2
Author: Bryan Petty <bryan@ibaku.net>
Author URI: http://profiles.wordpress.org/bpetty/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: better-file-editor
*/

class BetterFileEditorPlugin {

	public static function setup() {

		add_action( 'admin_init', array( __CLASS__, 'admin_init' ) );
		add_action( 'admin_print_scripts-theme-editor.php', array( __CLASS__, 'admin_print_scripts' ) );
		add_action( 'admin_print_scripts-plugin-editor.php', array( __CLASS__, 'admin_print_scripts' ) );

	}

	public static function admin_init() {

		wp_register_style( 'better-file-editor', plugins_url( 'file-editor.css' , __FILE__ ) );

		wp_register_script( 'better-file-editor-requirejs', plugins_url( 'js/require.js' , __FILE__ ) );
		wp_register_script( 'better-file-editor-ace', plugins_url( 'js/ace/ace.js' , __FILE__ ), array( 'better-file-editor-requirejs' ) );
		wp_register_script( 'better-file-editor-ace-modelist', plugins_url( 'js/ace/ext-modelist.js' , __FILE__ ), array( 'better-file-editor-ace' ) );

		wp_register_script( 'better-file-editor',
			plugins_url( 'js/wp-ace.js' , __FILE__ ),
			array( 'better-file-editor-ace', 'better-file-editor-ace' ) );

		wp_localize_script( 'better-file-editor', 'bfe_l10n', array(
			'editor_theme_label'          => __( 'Theme:', 'better-file-editor' ),
			'editor_theme_bright_label'   => __( 'Bright', 'better-file-editor' ),
			'editor_theme_dark_label'     => __( 'Dark', 'better-file-editor' ),
		) );

	}

	public static function admin_print_scripts() {

		wp_enqueue_style( 'better-file-editor' );
		wp_enqueue_script( 'better-file-editor' );

	}

}

BetterFileEditorPlugin::setup();
