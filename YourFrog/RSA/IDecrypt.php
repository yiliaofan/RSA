<?php

namespace YourFrog\RSA;

/**
 *  Interfejs kodujący tekst
 *
 * @package YourFrog\RSA
 */
interface IDecrypt
{
    /**
     *  Metoda służąca do rozkodowywania ciągu
     *
     * @param string $str
     * @return string
     */
    public function decrypt($str);

    /**
     *  Ustawia prywatny klucz
     *
     * @param string $rsaKey
     */
    public function setRSAPrivateKey($rsaKey);
} 