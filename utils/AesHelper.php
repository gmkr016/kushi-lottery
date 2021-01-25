<?php

namespace utils\Helper;

use Exception;

/**
 * Aes encryption
 */
class AesHelper
{
    protected static $key;

    protected static $data;

    protected static $method;

    /**
     * Available OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING
     *
     * @var type
     */
    protected static $options = 0;

    /**
     * @param  type  $data
     * @param  type  $key
     * @param  type  $blockSize
     * @param  type  $mode
     */
    public function __construct($data = null, $key = null, $blockSize = null, $mode = 'CBC')
    {
        self::setData($data);
        self::setKey($key);
        self::setMethode($blockSize, $mode);
    }

    public static function check()
    {
        return 'hell';
    }

    /**
     * @param  type  $data
     */
    public static function setData($data)
    {
        self::$data = $data;
    }

    /**
     * @param  type  $key
     */
    public static function setKey($key): void
    {
        self::$key = $key;
    }

    /**
     * CBC 128 192 256
     * CBC-HMAC-SHA1 128 256
     * CBC-HMAC-SHA256 128 256
     * CFB 128 192 256
     * CFB1 128 192 256
     * CFB8 128 192 256
     * CTR 128 192 256
     * ECB 128 192 256
     * OFB 128 192 256
     * XTS 128 256
     *
     * @param  type  $blockSize
     * @param  type  $mode
     *
     * @throws Exception
     */
    public static function setMethode($blockSize, $mode = 'CBC')
    {
        if ($blockSize == 192 && in_array('', ['CBC-HMAC-SHA1', 'CBC-HMAC-SHA256', 'XTS'])) {
            self::$method = null;
            throw new Exception('Invlid block size and mode combination!');
        }
        self::$method = 'AES-'.$blockSize.'-'.$mode;
    }

    /**
     * @return bool
     */
    public static function validateParams()
    {
        if (
            self::$data != null &&
            self::$method != null
        ) {
            return true;
        } else {
            return false;
        }
    }

    //it must be the same when you encrypt and decrypt
    protected static function getIV()
    {
        return '1234567890123456';

        //return mcrypt_create_iv(mcrypt_get_iv_size(self::cipher, self::mode), MCRYPT_RAND);
        return openssl_random_pseudo_bytes(openssl_cipher_iv_length(self::method));
    }

    /**
     * @throws Exception
     */
    public static function encrypt(): string
    {
        if (self::validateParams()) {
            return trim(openssl_encrypt(self::$data, self::$method, self::$key, self::$options, self::getIV()));
        } else {
            throw new Exception('Invlid params!');
        }
    }

    /**
     * @throws Exception
     */
    public static function decrypt(): string
    {
        if (self::validateParams()) {
            $ret = openssl_decrypt(self::$data, self::$method, self::$key, self::$options, self::getIV());

            return trim($ret);
        } else {
            throw new Exception('Invlid params!');
        }
    }
}
