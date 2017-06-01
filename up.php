<?php
$url         = 'http://a.kawaii.gg/';
$filedir     = '../a.kawaii.gg';
$maxsize     = 20000000; //in bytes
$allowedExts = array(
    'png',
    'jpg',
    'jpeg',
    'gif'
);
$allowedMime = array(
    'image/png',
    'image/jpeg',
    'image/pjpeg',
    'image/gif'
);

function generateRandomString($length = 5)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    if ((in_array($_FILES['file']['type'], $allowedMime)) && (in_array(strtolower($ext), $allowedExts)) && (@getimagesize($_FILES['file']['tmp_name']) !== false) && ($_FILES['file']['size'] <= $maxsize)) {
        $newname = generateRandomString() . '.' . $ext;
        move_uploaded_file($_FILES['file']['tmp_name'], $filedir . '/' . $newname);
        $imgurl = $url.$newname;
        print $imgurl;
    } else {
        print 'fuk';
    }
    
}
?>