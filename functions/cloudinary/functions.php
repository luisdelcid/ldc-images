<?php

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

if(!function_exists('ldc_cl_add_image_size')){
	function ldc_cl_add_image_size(){
		if(!class_exists('Cloudinary')){
            $dir = ldc_upload_basedir() . '/github/cloudinary/cloudinary_php/2.0.3';
            $url = 'https://github.com/cloudinary/cloudinary_php/archive/2.0.3.zip';
            $result = ldc_download_and_unzip($dir, $url);
            if(is_wp_error($result)){
                return $result;
            }
            $file = $dir . '/cloudinary_php-2.0.3/src/Cloudinary.php';
            if(file_exists($file)){
                require_once($file);
            } else {
                return ldc_error('http_request_failed', __('The package could not be installed.'));
            }
        }
        $cloudinary = new Cloudinary();
        return $cloudinary;
	}
}

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
