<?php

header('Content-Type: text/html; charset=utf-8');

//Autoloader
require_once('vendor/YourFrog/Autoloader/Loader.php');

$loader = \YourFrog\Autoloader\Loader::getInstance();
$loader->insertPath(dirname(__FILE__). '/../');
$loader->register();

// Zaszyfrowanie tekstu
try {
    $encrypt = new \YourFrog\RSA\Encrypt();
    $encrypt->setRSAPublicKey(file_get_contents('keys/rsa.public'));

    $encryptText = $encrypt->encrypt("Czesc");
    echo 'Zakodowany ciąg: <br>' . $encryptText;
} catch ( YourFrog\RSA\RSAException $e ) {
    echo 'Nie można zakodować ciągu znaków';
    die;
}


echo '<br><br>';


// Rozszyfrowanie tekstu
try {
    $decrypt = new \YourFrog\RSA\Decrypt();
    $decrypt->setRSAPrivateKey(file_get_contents('keys/rsa.private'));

    echo 'Rozkodowany ciąg: <br>' . $decrypt->decrypt($encryptText);
} catch ( \YourFrog\RSA\RSAException $e ) {
    echo 'Nie można rozkodować ciągu znaków';
}