<?php

namespace App\Utilities;

use Illuminate\Support\Str;

class Generator
{
    /**
     * Generate uuid with 20 characters
     *
     * @return string
     */
    public static function shortUUID(): string
    {
        $uuid = Str::uuid()->getHex();
        $start = random_int(1, 12);
        return substr($uuid, $start, 20);
    }

    /**
     * Encrypt and decrypt string  by passing action
     *
     * @param string $string
     * @param string $action
     * @return void
     */
    public static function crypt($string, $action = 'encrypt')
    {
        $secret_key = 'WkoH3wmUz1';
        $secret_iv = 'IS8gsHJ4';
        $encrypt_method = "AES-256-CBC";
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        $output = false;

        if ($action === 'encrypt') $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
        elseif ($action === 'decrypt') $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);

        return $output;
    }

    /**
     * Get uri segment from url
     *
     * @param integer $index
     * @return void
     */
    public static function uriSegment($index)
    {
        $segmentPath = explode('/', request()->path());
        if (!is_integer($index)) return '';
        if ($index > (count($segmentPath) - 1)) return '';
        else return $segmentPath[$index];
    }

    /**
     * Get uri segment from url
     *
     * @param integer $index
     * @return void
     */
    public static function urlSegment($index)
    {
        $segmentPath = explode('/', request()->path());
        $host =  request()->getHttpHost();
        if (!is_integer($index)) return '';
        if ($index > (count($segmentPath) - 1)) {
            return '';
        } else {
            unset($segmentPath[$index + 1]);
            return  $host . '/' . implode('/', $segmentPath);
        }
    }
}