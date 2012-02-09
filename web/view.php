<?php

define('puush', '');
require_once 'config.php';
require_once 'func.php';

if (!isset($_GET['image']))
{
    exit ('ERR No image provided.');
}

// The image to find
$image = basename(urldecode($_GET['image']));

// Look for the image
$matched = glob (UPLOAD_DIR . $image . '.*');

// Did we find an image?
if (empty($matched))
{
    exit ('ERR No image found.');
}

// The matched image location (relative.)
$matched = $matched[0];

// Get the extension
$ext = strtolower(get_ext($matched));

// Look for an appropriate mime type
$mime = array_search($ext, $mime);

// Did we find one?
if ($mime !== FALSE)
{
    // Set our headers
    header('Content-type: ' . $mime);
    header('Expires: 0');
    header('Cache-Control: must-revalidate');

    // Prepare to send the image
    ob_clean();
    flush();

    // Send the image
    readfile($matched);
}