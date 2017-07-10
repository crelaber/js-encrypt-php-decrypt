<?php
/*
+--------------------------------------------------------------------------
|   由于在php7.1之后mcrypt_encrypt会被废弃，因此使用openssl_encrypt方法来替换
|   ========================================
|   by Focus
|   ========================================
|
|
+---------------------------------------------------------------------------
*/
class OpensslEncryptHelper
{
    /**向量
     * @var string
     */
    const IV = "1234567890123412";//16位
    /**
     * 默认秘钥
     */
    const KEY = '201707eggplant99';//16位

    /**
     * 解密字符串
     * @param string $data 字符串
     * @param string $key 加密key
     * @return string
     */
    public static function decryptWithOpenssl($data,$key = self::KEY,$iv = self::IV){
        return openssl_decrypt(base64_decode($data),"AES-128-CBC",$key,OPENSSL_RAW_DATA,$iv);
    }

    /**
     * 加密字符串
     * 参考网站： https://segmentfault.com/q/1010000009624263
     * @param string $data 字符串
     * @param string $key 加密key
     * @return string
     */
    public static function encryptWithOpenssl($data,$key = self::KEY,$iv = self::IV){

//        echo base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, "1234567890123456", pkcs7_pad("123456"), MCRYPT_MODE_CBC, "1234567890123456"));
//        echo base64_encode(openssl_encrypt("123456","AES-128-CBC","1234567890123456",OPENSSL_RAW_DATA,"1234567890123456"));
//        $encrypted = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $data, MCRYPT_MODE_CBC, self::$iv);
//        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, "1234567890123456", pkcs7_pad("123456"), MCRYPT_MODE_CBC, "1234567890123456"));
        return base64_encode(openssl_encrypt($data,"AES-128-CBC",$key,OPENSSL_RAW_DATA,$iv));
    }


    function pkcs7_pad($str)
    {
        $len = mb_strlen($str, '8bit');
        $c = 16 - ($len % 16);
        $str .= str_repeat(chr($c), $c);
        return $str;
    }


}