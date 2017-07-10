<?php
/**
 * Created by PhpStorm.
 * User: Auser
 * Date: 2017/7/10
 * Time: 22:27
 */

$data = '111111';

//使用 openssl_decrypt 解密，openssl_encrypt加密的方式 ,建议这种方式，两种方式差异是Padding的差异
//配合js-demo中的
$pkcs7EncodeDemoData = OpensslEncryptHelper::encryptWithOpenssl($data);
echo 'pkcs7DemoData====>';
echo $pkcs7EncodeDemoData;
echo "\n";
$pkcs7DecodeDemoData = OpensslEncryptHelper::encryptWithOpenssl($pkcs7EncodeDemoData);
echo 'pkcs7DecodeDemoData====>';
echo $pkcs7DecodeDemoData;
echo "\n";


//使用 mcrypt_decrypt 解密，mcrypt_encrypt加密的方式
$zeroPaddingDemoData = AesJs::encrypt($data);
echo 'zeroPaddingDemoData====>';
echo $zeroPaddingDemoData;
echo "\n";

//使用 mcrypt_decrypt 解密，mcrypt_encrypt加密的方式
$zeroPaddingDecodeDemoData = AesJs::encrypt($zeroPaddingDemoData);
echo 'zeroPaddingDecodeDemoData====>';
echo $zeroPaddingDecodeDemoData;
echo "\n";