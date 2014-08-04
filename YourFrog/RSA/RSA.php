<?php

namespace YourFrog\RSA;

/**
 *  W pełni działająca klasa obsługująca kodowanie i rozkodowywanie RSA
 *
 * @package YourFrog\RSA
 */
class RSA implements IEncrypt, IDecrypt
{
    /**
     *  Klasa szyfrująca
     *
     * @var IEncrypt
     */
    private $encrypt;

    /**
     *  Klasa rozszyfrująca
     *
     * @var IDecrypt
     */
    private $decrypt;

    /**
     *  Konsturktor
     *
     * @param IEncrypt $encrypt Klasa szyfrująca
     * @param IDecrypt $decrypt Klasa roszyfrująca
     */
    public function __construct(IEncrypt $encrypt = null, IDecrypt $decrypt = null)
    {
        $this->encrypt = ($encrypt === null ? new Encrypt() : $encrypt);
        $this->decrypt = ($decrypt === null ? new Decrypt() : $decrypt);;
    }

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
        return $this->decrypt->decrypt($str);
    }

    /**
     *  Ustawia prywatny klucz
     *
     * @param string $rsaKey
     */
    public function setRSAPrivateKey($rsaKey)
    {
        $this->decrypt->setRSAPrivateKey($rsaKey);
    }

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
        return $this->encrypt->encrypt($str);
    }

    /**
     *  Ustawia publiczny klucz
     *
     * @param string $rsaKey
     */
    public function setRSAPublicKey($rsaKey)
    {
        $this->encrypt->setRSAPublicKey($rsaKey);
    }
} 