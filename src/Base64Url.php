<?php
declare(strict_types=1);

namespace Sopsy\Base64Url;

/**
 * URL-safe Base64 encoding and decoding functions (Base64Url)
 * https://github.com/sopsy/base64url-php
 *
 * @license LGPLv3
 * @author Aleksi "Sopsy" Kinnunen
 */
class Base64Url
{
    /**
     * Encodes a string with the Base64Url standard.
     *
     * @param string $string
     * @param bool $stripPadding Whether to strip the padding or not (='s at the end)
     * @return string encoded string
     */
    static public function encode(string $string, bool $stripPadding = true): string
    {
        // Start with regular base64 string
        $b64 = base64_encode($string);

        // Base64Url uses - and _ in place of + and /
        $b64u = strtr($b64, '+/', '-_');

        // Padding is optional, so we might as well remove it
        if ($stripPadding) {
            $b64u = rtrim($b64u, '=');
        }

        return $b64u;
    }

    /**
     * Decodes a string encoded with the Base64Url standard.
     *
     * @param string $string encoded string
     * @return string decoded string
     */
    static public function decode(string $string): string
    {
        // First, Base64 needs padding to the end
        // "In Base64 encoding, the length of output encoded String must be a multiple of 3.
        $b64 = $string . str_repeat('=', 3 - (3 + mb_strlen($string, '8bit')) % 4);

        // Base64 uses + and / in place of - and _
        $b64 = strtr($b64, '-_', '+/');

        // Return the decoded string
        return base64_decode($b64);
    }
}
