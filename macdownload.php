<?php
/*
  Name: Mac Doc Photogallery.
  Plugin URI: http://www.apptha.com/category/extension/Wordpress/Mac-Photo-Gallery
  Description: Wordpress Mac Doc Photogallery download file
  Version: 1.0
  Author: Apptha
  Author URI: http://www.apptha.com
  License: GPL2
 */
$folder      = dirname(plugin_basename(__FILE__));
$filepart    = explode(".",$_GET['albid']);
$file        = dirname(dirname(dirname(__FILE__)))."/uploads/mac-dock-gallery/".$_GET['albid'];

$fileExt = '';
$allowedExtensions = array("jpg", "jpeg", "png", "gif");
 if(preg_grep( "/$filepart[1]/i" , $allowedExtensions )){
 	$fileExt = true;
 }

if(file_exists($file) && (count($filepart) === 2) && (is_int( (int)$filepart[0]) ) && ((int)$filepart[0] > 0) && $fileExt == '1'){

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
}
else{
    die("No direct access");
}
?>