<?php
/**
 * @package MSD Tools
 * @version 0.1
 */
/*
Plugin Name: MSD Tools
Description: Tools for MSD
Author: Catherine Sandrick
Version: 0.1
Author URI: http://madsciencedept.com
*/
add_shortcode('clear','msd_add_clear');

function msd_add_clear(){
	return '<div style="clear:both;float: none;"></div>';
	}