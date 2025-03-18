<?php

/* *---------------------------------------------------------------------------
 * Studiare - Child Theme Functions and Definitions
 * ----------------------------------------------------------------------------
 * Contents:
 * 00 - Global Variables
 * 01 - Theme Constants
 * 02 - Basic Definitions
 * 03 - Includes
 */

/* add_action( 'wp_enqueue_scripts', 'sc_studi_enqueue_parent_styles' );

function sc_studi_enqueue_parent_styles() {
   // wp_enqueue_style( 'parent-style', get_template_directory_uri().'/assets/css/studiare.css' );
   wp_enqueue_style( 'rtl_studiare', get_template_directory_uri().'/rtl.css' );
} */

function child_theme_load_parent_translations() {
    load_theme_textdomain( 'studiare', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'child_theme_load_parent_translations' );