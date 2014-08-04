<?php

namespace YourFrog\RSA;

/**
 *  Interfejs służący do kodowania ciągu
 *
 * @package YourFrog\RSA
 */
interface IEncrypt
{
    /**
     *  Metoda kodująca ciąg znaków
     *
     * @param string $str
     * @return string
     */
    public function encrypt($str);

    /**
     *  Ustawia publiczny klucz
     *
     * @param string $rsaKey
     */
    public function setRSAPublicKey($rsaKey);
} 