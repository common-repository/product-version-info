<?php
/*
Plugin Name: Product Version Info
Plugin URI: http://www.ymyitconsulting.com/
Description: A simple plugin that helps you to manage and publish your product version, when you are using wordpress as product website CMS. This is particularly useful if your product is still in active development phase. To retrieve the version simply visit to <a>http://&lt;your.wordpress.site&gt;/?versioninfo</a> and result will be returned as JSON
Version: 1.0
Author: Ming Teoh
Author URI: http://www.ymyitconsulting.com/
License: GPLv2

********************************************************************************

Copyright (C) 2013  Ming Teoh

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/
if ( is_admin() ){
    add_action('admin_menu', 'versioninfo_admin_action');
    add_action( 'admin_init', 'versioninfo_settings_init' );
} 
add_action('init','versioninfo_get_info');

function versioninfo_get_info()
{
    if(!isset($_GET['versioninfo'])) return;
    header('Content-type: application/json');
    die(json_encode(array("ver"=>get_option('versioninfo_value'),"wp_ver"=>get_bloginfo("version","raw"))));
}

function versioninfo_admin_action()
{
    add_options_page("Version Info Configuration", "Version Info", 1,"versioninfo", "versioninfo_setting_page");
}

function versioninfo_setting_page()
{
    echo '<div class="wrap">';
    screen_icon();
    echo '<h2>Version Info Configuration</h2>';
?>
<form action="options.php" method="post">
	<?php 
        //settings_fields($option_group)
        settings_fields('versioninfo_settings_group'); ?>
    <?php 
        //do_settings_fields($page, $section)
        do_settings_sections('versioninfo_settings_page', 'versioninfo_settings_section');?>
    <?php submit_button();?>
</form>
</div>
<?
}

function versioninfo_settings_init(){
    //register_setting($option_group, $option_name)
	register_setting('versioninfo_settings_group', 'versioninfo_value');
    //add_settings_section($id, $title, $callback, $page)
    add_settings_section('versioninfo_settings_section', 'Settings', 'versioninfo_print_section_info', 'versioninfo_settings_page');
    //add_settings_field($id, $title, $callback, $page, $section='default')
    add_settings_field('versioninfo_value', 'Version Number', 'versioninfo_print_field_info', 'versioninfo_settings_page', 'versioninfo_settings_section');
}

function versioninfo_print_section_info(){
    return;
}

function versioninfo_print_field_info(){
    ?><input type="text" class="small-text" id="versioninfo_value" name="versioninfo_value" value="<?=get_option('versioninfo_value');?>" /><?php
}

//==============================================================================
//==============================================================================
register_activation_hook( __FILE__, 'versioninfo_activate' );
register_deactivation_hook( __FILE__, 'versioninfo_deactivate' );
function versioninfo_activate(){
    add_option('versioninfo_value','0');
}
function versioninfo_deactivate(){
    delete_option('versioninfo_value');
}
function versioninfo_predump($array){
    echo '<pre>'.print_r($array,true).'</pre>';
}
