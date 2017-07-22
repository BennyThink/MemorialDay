<?php
/*
Plugin Name: 纪念日
Plugin URI:
Description: 在指定日期将网站改成黑白色来纪念逝去的生命
Version: 0.01
Author: Benny小土豆
Author URI: http://www.bennythink.com
*/

/*  Copyright 2017  Benny (benny.think@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

date_default_timezone_set('Asia/Shanghai');


function memorial_day(){?>
	<style type="text/css">
			<!--
	html {
		filter: progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);
		-webkit-filter: grayscale(100%);
			}

			-->
		</style>
<?php }
//code...
add_action ( 'wp_head', 'memorial_day' );

function test(){

echo 'start testing';
	echo get_option('bt_group');

}
//add_action('wp_loaded','test');




function add_qzone_settings_link($links, $file) {
	static $this_plugin;
	if (!$this_plugin) $this_plugin = plugin_basename(__FILE__);

	if ($file == $this_plugin){
		$settings_link = '<a href="'.wp_nonce_url("admin.php?page=my-unique-identifier").'">设置</a>';
		array_unshift($links, $settings_link);
	}
	return $links;
}
add_filter('plugin_action_links', 'add_qzone_settings_link', 10, 2 );





add_action( 'admin_menu', 'bt_create_menu' );

function bt_create_menu() {

	//创建顶级菜单
	add_menu_page(
		'纪念日插件设置',
		'纪念日',
		'manage_options',
		'bt_MemorialDay' ,
		'bt_settings_page',
		plugins_url( '/icon.png', __FILE__ )
	);
}




function bt_settings_page(){


	echo 'settings go here';



}