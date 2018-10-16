<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class EncodeTest extends TestCase
{
    public function testWithPadding()
    {
        $input = 'When I grow up, I want to be a watermelon';

        $this->assertEquals(
            'V2hlbiBJIGdyb3cgdXAsIEkgd2FudCB0byBiZSBhIHdhdGVybWVsb24=',
            \Sopsy\Base64Url\Base64Url::encode($input, false)
        );
    }

    public function testWithoutPadding()
    {
        $input = 'When I grow up, I want to be a watermelon';

        $this->assertEquals(
            'V2hlbiBJIGdyb3cgdXAsIEkgd2FudCB0byBiZSBhIHdhdGVybWVsb24',
            \Sopsy\Base64Url\Base64Url::encode($input)
        );
    }
}