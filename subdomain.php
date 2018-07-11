<?php
//This script is only good for subdomain
$domain = $_SERVER["SERVER_NAME"];
$url    = 'http://' . $domain . '/';
$key    = '*Snip*';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    if ($domain == '*snip*') {
        if ($_POST['key'] == $key) {
            if ((in_array($_FILES['file']['type'], array(
                'image/png',
                'image/jpeg',
                'image/gif'
            ))) && (in_array(strtolower($ext), array(
                'png',
                'jpg',
                'jpeg',
                'gif'
            ))) && (@getimagesize($_FILES['file']['tmp_name']) !== false) && ($_FILES['file']['size'] <= 20000000)) {
                $newname = generateRandomString() . '.' . $ext;
                move_uploaded_file($_FILES['file']['tmp_name'], $newname);
                $imgurl = $url . $newname;
                print $imgurl;
            } else {
                print 'We only accept images if you think this is an error or you want to add this filetype plz contact me on discord: Ryu#1337';
            }
        } else {
            echo 'Incorrect Key';
        }
    } else {
        if ((in_array($_FILES['file']['type'], array(
            'image/png',
            'image/jpeg',
            'image/gif'
        ))) && (in_array(strtolower($ext), array(
            'png',
            'jpg',
            'jpeg',
            'gif'
        ))) && (@getimagesize($_FILES['file']['tmp_name']) !== false) && ($_FILES['file']['size'] <= 20000000)) {
            $newname = generateRandomString() . '.' . $ext;
            move_uploaded_file($_FILES['file']['tmp_name'], $newname);
            $imgurl = $url . $newname;
            print $imgurl;
        } else {
            print 'We only accept images if you think this is an error or you want to add this filetype plz contact me on discord: Ryu#1337';
        }
    }
} else {
    echo '<style>';
    echo 'body{';
    echo 'background-image: url("https://i.imgur.com/4cepYZn.gif");';
    echo 'background-size: cover;';
    echo '}';
    echo '</style>';
    echo '<body>';
    echo '';
    echo '</body>';
}
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
?>
