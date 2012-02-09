<?php

if (!defined('puush')) exit('Bonjour');

// The folder where uploads are stored in
define ('UPLOAD_DIR', '/var/www/uploads/');

// The formatted url to send to the client, where %s is the generated file name
define ('FORMATTED_URL', 'http://img.griefcraft.com/%s');

// The max file size, default 250 MB ( 250 * 1024 * 1024 )
define ('MAX_FILE_SIZE', 250 * 1024 * 1024);

// Mime types
$mime = array('image/gif' => 'gif',
    'image/jpeg' => 'jpeg',
    'image/jpeg' => 'jpg',
    'image/png' => 'png',
    'image/psd' => 'psd',
    'image/bmp' => 'bmp',
    'image/tiff' => 'tiff',
    'image/tiff' => 'tiff',
    'image/jp2' => 'jp2',
    'image/iff' => 'iff',
    'image/vnd.wap.wbmp' => 'bmp',
    'image/xbm' => 'xbm',
    'image/vnd.microsoft.icon' => 'ico');

// Extension whitelist
$image_whitelist = array('jpg', 'jpeg', 'png', 'gif','bmp');