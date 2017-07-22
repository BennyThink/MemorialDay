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


/** 第1步：定义添加菜单选项的函数 */
function my_plugin_menu() {
	add_options_page( 'My Plugin Options', 'My Plugin', 'manage_options', 'my-unique-identifier', 'my_plugin_options' );
}

/** 第2步：将函数注册到钩子中 */
add_action( 'admin_menu', 'my_plugin_menu' );

/** 第3步：定义选项被点击时打开的页面 */
function my_plugin_options() {
	if ( ! current_user_can( 'manage_options' ) ) {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}

echo 'settings page';

}