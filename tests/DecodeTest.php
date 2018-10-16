<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class DecodeTest extends TestCase
{
    public function testWithPadding()
    {
        // No padding characters
        $this->assertEquals(
            'When I grow up, I want to be something!',
            \Sopsy\Base64Url\Base64Url::decode('V2hlbiBJIGdyb3cgdXAsIEkgd2FudCB0byBiZSBzb21ldGhpbmch')
        );

        // One padding character
        $this->assertEquals(
            'When I grow up, I want to be a watermelon',
            \Sopsy\Base64Url\Base64Url::decode('V2hlbiBJIGdyb3cgdXAsIEkgd2FudCB0byBiZSBhIHdhdGVybWVsb24=')
        );

        // Two padding characters
        $this->assertEquals(
            'When I grow up, I want to be anything',
            \Sopsy\Base64Url\Base64Url::decode('V2hlbiBJIGdyb3cgdXAsIEkgd2FudCB0byBiZSBhbnl0aGluZw==')
        );
    }

    public function testWithoutPadding()
    {
        // One padding character stripped
        $this->assertEquals(
            'When I grow up, I want to be a watermelon',
            \Sopsy\Base64Url\Base64Url::decode('V2hlbiBJIGdyb3cgdXAsIEkgd2FudCB0byBiZSBhIHdhdGVybWVsb24')
        );

        // Two padding characters stripped
        $this->assertEquals(
            'When I grow up, I want to be anything',
            \Sopsy\Base64Url\Base64Url::decode('V2hlbiBJIGdyb3cgdXAsIEkgd2FudCB0byBiZSBhbnl0aGluZw')
        );
    }
}