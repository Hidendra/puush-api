<?php

define('puush', '');
require_once 'config.php';
require_once 'func.php';

// API key
$k = get_post_var('k');

// MD5 hash of file
$c = get_post_var('c');

// Check for the file
if (!isset($_FILES['f']))
{
    exit ('ERR No file provided.');
}

// The file they are uploading
$file = $_FILES['f'];

// Check the size, max 250 MB
if ($file['size'] > MAX_FILE_SIZE)
{
    exit ('ERR File is too big.');
}

// Ensure the image is actually a file and not a friendly virus
// todo: validate MD5 hash either in this function or here
if (validate_image($file) === FALSE)
{
    exit ('ERR Invalid image.');
}

// Generate a new file name
$ext = get_ext($file['name']);
$generated_name = generate_upload_name($ext);

// Move the file
move_uploaded_file($file['tmp_name'], UPLOAD_DIR . $generated_name . '.' . $ext);

// ahem
echo '0,' . sprintf(FORMATTED_URL, $generated_name) . ',-1,-1';