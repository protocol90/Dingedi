<?php
session_start();
function nombre($n)
{
    return substr(strtoupper(sha1(time())), 1, 7);
}

function image($mot)
{
    $largeur = strlen($mot) * 10;
    $hauteur = 18;
    $img = imagecreate($largeur, $hauteur);
    $blanc = imagecolorallocate($img, 234, 102, 129);
    $noir = imagecolorallocate($img, 234, 102, 129);
    $milieuHauteur = ($hauteur / 2) - 4;
    imagestring($img, 8, strlen($mot) / 1, $milieuHauteur, $mot, $noir);
    imagecolortransparent($img, $blanc);
    imagepng($img);
    imagedestroy($img);
}

function captcha()
{
    $mot = nombre(5);
    $_SESSION['captcha'] = $mot;
    image($mot);
}

header("Content-type: image/png");
captcha();
?>