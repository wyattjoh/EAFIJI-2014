<?php
/**
 * EAFIJI-2014 functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package EAFIJI-2014
 * @since 0.1.0
 */
 
 // Useful global constants
define( 'EAFIJI__VERSION', '0.1.0' );
 
 /**
  * Set up theme defaults and register supported WordPress features.
  *
  * @uses load_theme_textdomain() For translation/localization support.
  *
  * @since 0.1.0
  */
 function eafiji__setup() {
	/**
	 * Makes EAFIJI-2014 available for translation.
	 *
	 * Translations can be added to the /lang directory.
	 * If you're building a theme based on EAFIJI-2014, use a find and replace
	 * to change 'eafiji_' to the name of your theme in all template files.
	 */
	load_theme_textdomain( 'eafiji_', get_template_directory() . '/languages' );
 }
 add_action( 'after_setup_theme', 'eafiji__setup' );
 
 /**
  * Enqueue scripts and styles for front-end.
  *
  * @since 0.1.0
  */
 function eafiji__scripts_styles() {
	$postfix = ( defined( 'SCRIPT_DEBUG' ) && true === SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script( 'eafiji_', get_template_directory_uri() . "/assets/js/eafiji_2014{$postfix}.js", array(), EAFIJI__VERSION, true );
		
	wp_enqueue_style( 'eafiji_', get_template_directory_uri() . "/assets/css/eafiji_2014{$postfix}.css", array(), EAFIJI__VERSION );
 }
 add_action( 'wp_enqueue_scripts', 'eafiji__scripts_styles' );
 
 /**
  * Add humans.txt to the <head> element.
  */
 function eafiji__header_meta() {
	$humans = '<link type="text/plain" rel="author" href="' . get_template_directory_uri() . '/humans.txt" />';
	
	echo apply_filters( 'eafiji__humans', $humans );
 }
 add_action( 'wp_head', 'eafiji__header_meta' );