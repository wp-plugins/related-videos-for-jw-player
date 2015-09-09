<?php

//HOOKS
add_action( 'admin_menu', 'rvjwp_add_menu' );
add_action( 'admin_init', 'rvjwp_register_style' );
add_action( 'init', 'rvjwp_script_enqueuer' );


//SCRIPT
function rvjwp_script_enqueuer() {
   wp_register_script( "rvjwp-script", WP_PLUGIN_URL.'/related-videos-for-jw-player/js/rvjwp-script.js', array('jquery') );
   wp_localize_script( 'rvjwp-script', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        

   wp_enqueue_script( 'jquery' );
   wp_enqueue_script( 'rvjwp-script' );

}

//STYLE
function rvjwp_register_style() {
	wp_register_style( 'rvjwp-style', plugins_url('css/rvjwp-style.css', 'related-videos-for-jw-player/css'));
}

function rvjwp_add_style() {
	wp_enqueue_style( 'rvjwp-style');
}


//SUB-MENU PAGE 
function rvjwp_add_menu() {
	
	$rvjwp_page = add_submenu_page( 'options-general.php', 'Related Videos for JW Player', 'Related Videos for JW Player', 'manage_options', 'related-videos-for-jw-player', 'rvjwp_options');
	//GET STYLE
	add_action( 'admin_print_styles-' . $rvjwp_page, 'rvjwp_add_style' );

	return $rvjwp_page;

}


//ADMIN OPTIONS 
function rvjwp_options() {
	
	echo '<div class="wrap">'; 
	echo '<div class="wrap-left">';
	echo '<h1>' . __('Related Videos for JW Player', 'rvjwp-lang') . '</h1>';
	echo '<p>' . __('If you\'re using <strong>JW Player</strong> on your site, you probably know <strong><a href="http://support.JW Player.com/customer/portal/articles/1409745-display-related-videos" target="_blank">Related Videos</a></strong>, a free plugin that allows you to show more contents to the users in a beautifull and simple layout.', 'rvjwp-lang') . '<br>';
	echo __('<strong>Related Videos for JW Player</strong> will creates the correct xml for each category, so you\'ll be able to show related contents dynamically.', 'rvjwp-lang') . '</p>';
	echo '<p>' . __('Select how to get the video thumbnail from your posts.', 'rvjwp-lang') . '</p>';

	include(plugin_dir_path( __FILE__ ) . '/rvjwp-form.php');

	echo '<p>' . __('In your JW Player code, you\'ll have something like that.', 'rvjwp-lang') . '<br>';
	echo __('Please, check out your <a href="' . home_url() . '/wp-admin/options-permalink.php">permalink structure</a> for a correct category link.', 'rvjwp-lang');	

	echo '<pre>\'related\': {
   \'file\': \'<span>http://YOUR-SITE/archives/category/THE-CATEGORY-SLUG/?feed=related-feed</span>\',
   \'heading\': \'More videos!\',
   \'onclick\': \'link\',
   \'dimensions\': \'210x161\'
}</pre>';

	echo '<p>' . __('And that\'s the result:', 'rvjwp-lang') . '</p>';

	echo '<img class="rvjwp-image" src="' . plugins_url('images/rvjwp-image.jpg', 'related-videos-for-jw-player/images')  . '" />';
	echo '</div>';

	echo '<div class="wrap-right">';
	echo '<div id="premium-banner">';
	echo '<a href="http://www.ilghera.com/product/jw-player-wordpress-plugin-premium/" target="_blank"><img src="' . plugins_url('images/logo-premium.jpg', 'related-videos-for-jw-player/images') . '" /></a>';
	echo '<h3><a href="http://www.ilghera.com/product/jw-player-wordpress-plugin-premium/" target="_blank">JW Player Wordpress Plugin - Premium</a></h3>';
	echo '<p>' . __('JW Player Wordpress Plugin – Premium is the complete solution for using JW Player into Wordpress.', 'rvjwp-lang') . '<br>';
	echo __('It works with the latest version of the famous video player, JWP 7, and it gives you full control of all the options available.', 'rvjwp-lang') . '</p>';
	echo __('Some examples?', 'rvjwp-lang');
	echo '<ul>';
	echo '<li>' . __('Post type support', 'rvjwp-lang') . '</li>';
	echo '<li>' . __('Embed player position', 'rvjwp-lang') . '</li>';
	echo '<li>' . __('Default and single Poster Image', 'rvjwp-lang') . '</li>';
	echo '<li>' . __('Fixed dimensions player or responsive', 'rvjwp-lang') . '</li>';
	echo '<li>' . __('Aspect ratio', 'rvjwp-lang') . '</li>';
	echo '<li>' . __('Nine player skins available', 'rvjwp-lang') . '</li>';
	echo '<li>' . __('Custom player logo with link', 'rvjwp-lang') . '</li>';
	echo '<li>' . __('Advanced Related Videos with specific video taxonomy', 'rvjwp-lang') . '</li>';
	echo '<li>' . __('Sharing with custom heading and embed option ', 'rvjwp-lang') . '</li>';
	echo '<li>' . __('Basic Preroll Video Ads with Time Skipping', 'rvjwp-lang') . '</li>';
	echo '</ul>';
	echo '<a class="premium-button" href="http://www.ilghera.com/product/jw-player-wordpress-plugin-premium/" target="_blank">' . __('Read more', 'rvjwp-lang') . '</a>';
	echo '</div>';
	echo '</div>';
	echo '<div class="clear"></div>';
	echo '</div>';

}