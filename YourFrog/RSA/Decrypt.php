<?php

namespace YourFrog\RSA;

/**
 *  Klasa kodująca
 *
 * @package YourFrog\RSA
 */
class Decrypt implements IDecrypt
{
    /**
     *  Prywatny klucz RSA
     *
     * @var string|null
     */
    private $privateKey;

    /**
     *  Metoda służąca do rozkodowywania ciągu
     *
     * @param string $str
     * @throws RSAException
     *
     * @return string
     */
    public function decrypt($str)
    {
        if( $this->privateKey === null )
            throw new RSAException('Private key is not define');

        if( openssl_private_decrypt(base64_decode($str), $decrypted, $this->privateKey) )
            return $decrypted;

        throw new RSAException('Invalid decrypt');
    }

    /**
     *  Ustawia prywatny klucz
     *
     * @param string $rsaKey
     */
    public function setRSAPrivateKey($rsaKey)
    {
        $this->privateKey = $rsaKey;
    }
}