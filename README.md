# Base64Url-PHP
Base64Url encoder and decoder implementation for PHP 7.0+


# Usage

To encode:
```
// With stripped padding
echo Base64Url::encode('When I grow up, I want to be a watermelon', true);
// Expected output: V2hlbiBJIGdyb3cgdXAsIEkgd2FudCB0byBiZSBhIHdhdGVybWVsb24

// Stripping the padding is default, so we can just do it like this
echo Base64Url::encode('When I grow up, I want to be a watermelon');
// Expected output: V2hlbiBJIGdyb3cgdXAsIEkgd2FudCB0byBiZSBhIHdhdGVybWVsb24

// Without stripping the padding
echo Base64Url::encode('When I grow up, I want to be a watermelon', false);
// Expected output: V2hlbiBJIGdyb3cgdXAsIEkgd2FudCB0byBiZSBhIHdhdGVybWVsb24=
```

To decode:
```
// A string without padding
echo Base64Url::decode('V2hlbiBJIGdyb3cgdXAsIEkgd2FudCB0byBiZSBhIHdhdGVybWVsb24');
// Expected output: When I grow up, I want to be a watermelon

// A string with padding
echo Base64Url::decode('V2hlbiBJIGdyb3cgdXAsIEkgd2FudCB0byBiZSBhIHdhdGVybWVsb24=');
// Expected output: When I grow up, I want to be a watermelon
```
