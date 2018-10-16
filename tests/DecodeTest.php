<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class DecodeTest extends TestCase
{
    public function testWithPadding()
    {
        $encoded = 'V2hlbiBJIGdyb3cgdXAsIEkgd2FudCB0byBiZSBhIHdhdGVybWVsb24=';

        $this->assertEquals(
            'When I grow up, I want to be a watermelon',
            \Sopsy\Base64Url\Base64Url::decode($encoded)
        );
    }

    public function testWithoutPadding()
    {
        $encoded = 'V2hlbiBJIGdyb3cgdXAsIEkgd2FudCB0byBiZSBhIHdhdGVybWVsb24';

        $this->assertEquals(
            'When I grow up, I want to be a watermelon',
            \Sopsy\Base64Url\Base64Url::decode($encoded)
        );
    }
}