<?php

namespace YourFrog\RSA;

/**
 *  Klasa służąca do kodowania
 *
 * @package YourFrog\RSA
 */
class Encrypt implements IEncrypt
{
    /**
     *  Publiczny klucz RSA
     *
     * @var string|null
     */
    private $publicKey;

    /**
     *  Metoda kodująca ciąg znaków
     *
     * @param string $str
     * @throws RSAException
     *
     * @return string
     */
    public function encrypt($str)
    {
        if( $this->publicKey === null )
            throw new RSAException('Public key is not define');

        if( openssl_public_encrypt($str, $encrypted, $this->publicKey) )
            return base64_encode($encrypted);

        throw new RSAException('Unable to encrypt data. Perhaps it is bigger than the key size?');
    }

    /**
     *  Ustawia publiczny klucz
     *
     * @param string $rsaKey
     */
    public function setRSAPublicKey($rsaKey)
    {
        $this->publicKey = $rsaKey;
    }
} 