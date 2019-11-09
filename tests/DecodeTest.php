<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Sopsy\Base64Url\Base64Url;

final class DecodeTest extends TestCase
{
    public function testWithPadding(): void
    {
        // No padding characters
        $this->assertEquals(
            'When I grow up, I want to be something!',
            Base64Url::decode('V2hlbiBJIGdyb3cgdXAsIEkgd2FudCB0byBiZSBzb21ldGhpbmch')
        );

        // One padding character
        $this->assertEquals(
            'When I grow up, I want to be a watermelon',
            Base64Url::decode('V2hlbiBJIGdyb3cgdXAsIEkgd2FudCB0byBiZSBhIHdhdGVybWVsb24=')
        );

        // Two padding characters
        $this->assertEquals(
            'When I grow up, I want to be anything',
            Base64Url::decode('V2hlbiBJIGdyb3cgdXAsIEkgd2FudCB0byBiZSBhbnl0aGluZw==')
        );
    }

    public function testWithoutPadding(): void
    {
        // One padding character stripped
        $this->assertEquals(
            'When I grow up, I want to be a watermelon',
            Base64Url::decode('V2hlbiBJIGdyb3cgdXAsIEkgd2FudCB0byBiZSBhIHdhdGVybWVsb24')
        );

        // Two padding characters stripped
        $this->assertEquals(
            'When I grow up, I want to be anything',
            Base64Url::decode('V2hlbiBJIGdyb3cgdXAsIEkgd2FudCB0byBiZSBhbnl0aGluZw')
        );
    }

    public function testInvalidData(): void
    {
        $this->expectException(InvalidArgumentException::class);
        /** @noinspection UnusedFunctionResultInspection We expect it to throw an exception */
        Base64Url::decode(' V2hlbiBJIGdyb3cgdXAsIEkgd2FudCB0byBiZSBhIHdhdGVybWVsb24=');
    }

    public function testEmptyData(): void
    {
        $this->assertEquals(
            '',
            Base64Url::decode('')
        );

        $this->assertEquals(
            '',
            Base64Url::encode('')
        );
    }
}