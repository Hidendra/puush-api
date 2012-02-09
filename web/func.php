<?php

if (!defined('puush')) exit('Bonjour');

/**
 * Generate an uploaded file's name to use
 * @return string
 */
function generate_upload_name($ext)
{
    $name = NULL;

    do {
        $name = random_filename();
    } while (file_exists(UPLOAD_DIR . $name . '.' . $ext));

    return $name;
}

/**
 * Generates a random file name
 */
function random_filename()
{
    $random_string = md5(uniqid(rand(), true));

    // chop it down to random length
    return substr($random_string, 0, rand(4, 8));
}

/**
 * Get a post variable and exit if it was not given
 * @param $name
 */
function get_post_var($name)
{
    if (!isset($_POST[$name]))
    {
        exit ('ERR Missing post arguments.');
    }

    return $_POST[$name];
}

/**
 * Get the extension for a given image
 * @param $image
 * @return string
 */
function get_ext($image)
{
    return end(explode('.', $image));
}

/**
 * Validate an image
 * @param $image
 * @return TRUE if the image is valid
 */
function validate_image($image)
{
    global $mime , $image_whitelist;

    // Get the info for the image
    $info = getimagesize($image['tmp_name']);

    // Is it invalid?
    if (empty($info))
    {
        return FALSE;
    }

    // Verify the mimetype
    $mime_type = $info['mime'];

    if (!isset($mime[$mime_type]))
    {
        return FALSE;
    }

    // Get the file extension
    $ext = get_ext($image['name']);

    // Compare it to the whitelist
    if (!in_array($ext, $image_whitelist))
    {
        return FALSE;
    }

    // It is good
    return TRUE;
}