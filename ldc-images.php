<?php
/*
Author: Luis del Cid
Author URI: https://github.com/luisdelcid
Description: LDC improvements and fixes for WordPress and Cloudinary images.
Domain Path:
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Network:
Plugin Name: LDC Images
Plugin URI: https://github.com/luisdelcid/ldc-images
Text Domain: ldc-images
Version: 0.2.19.1
*/

if(defined('ABSPATH')){
    if(did_action('ldc_functions_preloaded')){
        ldc_build_update_checker('https://github.com/luisdelcid/ldc-images', __FILE__, 'ldc-images');
        $ldc_dir = plugin_dir_path(__FILE__) . 'functions/';
        foreach(glob($ldc_dir . '*', GLOB_ONLYDIR) as $ldc_dir){
            if(file_exists($ldc_dir . '/functions.php')){
                require_once($ldc_dir . '/functions.php');
            }
        }
        unset($ldc_dir);
        ldc_add_image_size('HD', 1280, 1280);
        ldc_add_image_size('Full HD', 1920, 1920);
    } else {
        add_action('admin_notices', function(){
			echo '<div class="notice notice-error"><p>The LDC Functions plugin must be active in order to use LDC Images. Please <a href="' . admin_url('plugins.php') . '">activate it</a> before continuing.</p></div>';
		});
    }
}
