<?php
/////////////////////////////////////
//  WORDPRESS RESET FUNCTIONALITY  //
/////////////////////////////////////
//////////////////////////////////////
//  STRIP AWAY UNNEEDED POST STUFF  //
//////////////////////////////////////

function clean_WP_Head () {
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// index link
	remove_action( 'wp_head', 'index_rel_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );
	//  FEED LINKS 
	remove_action('wp_head', 'feed_links_extra', 3 );
	remove_action('wp_head', 'feed_links', 2 );
	// remove WP version from css
	//add_filter( 'style_loader_src', 'bones_remove_wp_ver_css_js', 9999 );
	// remove Wp version from scripts
	//add_filter( 'script_loader_src', 'bones_remove_wp_ver_css_js', 9999 );
	// remove admin bar
	add_filter( 'show_admin_bar', '__return_false');
}
//
clean_WP_Head();
//
//////////////////////////
//  LOGIN FOR ONE YEAR  //
//////////////////////////
function keep_me_logged_in_for_1_year( $expirein ) {
    return 31556926; // 1 year in seconds
}
add_filter( 'auth_cookie_expiration', 'keep_me_logged_in_for_1_year' );
//
/////////////////////////////
//  ADD CSS TO ADMIN PAGE  //
/////////////////////////////
/*
function safely_add_stylesheet_to_admin( $page ) {
	//
	if( $page == 'post.php' || $page == 'post-new.php') 
	{
    	wp_enqueue_style( 'admin_page_style', get_template_directory_uri(). '/css/admin-page.css' );	
		wp_enqueue_script( 'admin_page_script', get_template_directory_uri(). '/js/admin/admin-page.js' );	
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
    		
    }
	if ( $page == 'edit.php' ) {
		wp_enqueue_style( 'admin_page_style', get_template_directory_uri(). '/css/admin-main.css' );	
	}
    //
	//wp_enqueue_style( 'admin_page_style', get_template_directory_uri(). '/css/admin-edit-php.css' );	
    wp_enqueue_script( 'admin_page_script', get_template_directory_uri(). '/js/admin/admin-main.js' );	
    //
}
add_action( 'admin_enqueue_scripts', 'safely_add_stylesheet_to_admin' );
*/

function add_menu_icons_styles(){
?>
 
<style>
	#adminmenu .menu-icon-post div.wp-menu-image:before {
		content: "\f130";
	}
	#adminmenu .menu-icon-page div.wp-menu-image:before {
		content: "\f123";
	}
	#adminmenu .menu-icon-events div.wp-menu-image:before {
		content: '\f145';
	}
	#adminmenu .menu-icon-gallery div.wp-menu-image:before {
		content: "\f161";
	}
</style>
 
<?php
}
add_action( 'admin_head', 'add_menu_icons_styles' );

function new_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter('excerpt_more', 'new_excerpt_more');


//
//  FIX TIMEZONE
function loadTimeZone(){
	date_default_timezone_set('America/Chicago');
}
add_filter('init','loadTimeZone');

?>