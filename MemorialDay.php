<?php
/*
Plugin Name: Memorial Day
Plugin URI: https://github.com/BennyThink/MemorialDay
Description: 在指定日期将网站改成黑白色来缅怀逝去的生命
Version: 0.2.3
Author: Benny
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
//This plugin is designed for WordPress

date_default_timezone_set( 'Asia/Shanghai' );

add_action( 'wp_head', 'btmd_memorial_day' );
function btmd_memorial_day() {
	$options     = get_option( 'plugin_options' );
	$theme_color = $options['text_string'];
	$custom_date = $options['text_date'];


	if ( strstr( $custom_date, date( 'm-d', time() ) ) ):?>

        <meta name="theme-color" content="757575">
        <style type="text/css">
            <!--
            html {
                filter: progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);
                -webkit-filter: grayscale(100%);
            }

            -->
        </style>
		<?php btmd_change_meta() ?>

	<?php elseif ( ! empty( $theme_color ) ): ?>
        <meta name="theme-color" content="<?= $theme_color; ?>">
		<?php btmd_change_meta($theme_color) ?>
	<?php endif; ?>
<?php }

function btmd_change_meta($hex_color='757575') {
	?>
    <script>
        var meta = document.getElementsByTagName('meta');
        meta["theme-color"].setAttribute('content', '<?="#".$hex_color?>');
    </script>
	<?
}

add_filter( 'plugin_action_links', 'btmd_add_qzone_settings_link', 10, 2 );
function btmd_add_qzone_settings_link( $links, $file ) {
	static $this_plugin;
	if ( ! $this_plugin ) {
		$this_plugin = plugin_basename( __FILE__ );
	}

	if ( $file == $this_plugin ) {
		$settings_link = '<a href="' . wp_nonce_url( "admin.php?page=MemorialDay" ) . '">设置</a>';
		array_unshift( $links, $settings_link );
	}

	return $links;
}


add_action( 'admin_menu', 'btmd_admin_add_page' );
function btmd_admin_add_page() {
	add_options_page(
		'MemorialDay 设置页面',
		'MemorialDay 设置',
		'manage_options',
		'MemorialDay',
		'btmd_options_page' );
}

function btmd_options_page() {
	?>
    <div>
         <h2>以此来缅怀那些逝去的生命</h2>  
        请设置你需要的日期（形如07-13）与主题颜色（theme-color）  
        <form action="options.php" method="post">
			<?php settings_fields( 'plugin_options' ); ?>
			<?php do_settings_sections( 'plugin' ); ?>

            <input name="Submit" type="submit" value="<?php esc_attr_e( 'Save Changes' ); ?>"/>
        </form>
    </div>

	<?php
}


add_action( 'admin_init', 'btmd_admin_init' );
function btmd_admin_init() {
	register_setting(
		'plugin_options',
		'plugin_options',
		'plugin_options_validate' );

	add_settings_section(
		'plugin_main',
		'日期设置，一行一个',
		'btmd_date_text',
		'plugin'
	);


	add_settings_section(
		'plugin_main2',
		'theme-color，十六进制不需要带#',
		'btmd_color_text',
		'plugin'
	);


}

function btmd_date_text() {
	$options = get_option( 'plugin_options' );
	if(empty($options['text_date']))
		$options['text_date']=$options['text_date'].
        '06-04
07-13';
	echo "<textarea name='plugin_options[text_date]'>" . $options['text_date'] . "</textarea>";

}

function btmd_color_text() {
	$options = get_option( 'plugin_options' );
	echo "<input id='color_string' name='plugin_options[text_string]' size='40' 
type='text' value='{$options['text_string']}' />" . "<br>" . "<br>";


}

