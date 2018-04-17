# Laravel 5 Kuveyt Turk Sanal Pos

Komut satırından bu kodu çalıştırınız:
```
composer require farukcam/kuveytturk
```

```config/app.php``` dosyasına aşağıda bulunan satırları ekliyoruz.
```php
return [
    // ...

    'providers' => [
        // ...

        Farukcam\Kuveytturk\KuveytturkServiceProvider::class
    ],

    // ...

    'aliases' => [
        // ...

        'Kuveytturk'    => Farukcam\Kuveytturk\Facades\Kuveytturk::class
    ],
);
```
# Ayarlar

```code
php artisan vendor:publish
```
komutunu kullanarak ``` config/kuveytturk.php``` dosyasını yayınlıyoruz.

### kuveytturk.php

```php
return [
    "Type"                => "Sale",
    "APIVersion"          => "1.0.0",
    "ApiUrl"              => "https://boa.kuveytturk.com.tr/sanalposservice/Home/ThreeDModelPayGate", // Test API url : https://boatest.kuveytturk.com.tr/boa.virtualpos.services/Home/ThreeDModelPayGate
    "CustomerId"          => "Müşteri Numarası", // Test Müşteri Numarası : 400235
    "CurrencyCode"        => "0949", // Para birimi TL 0949
    "MerchantId"          => "Mağaza Kodu", // Test Magaza Kodu : 496
    "OkUrl"               => "Basarili sonuç alinirsa, yönledirelecek sayfa",
    "FailUrl"             => "Basarisiz sonuç alinirsa, yönledirelecek sayfa",
    "UserName"            => "Web Yönetim ekranlarindan olusturulan api rollü kullanici", // Test API Kullanıcısı : apiuser1
    "Password"            => "Web Yönetim ekranlarindan olusturulan api rollü kullanici sifresi",  // Test API Kullanıcı Şifresi : Api123
    "TransactionSecurity" => "3" // 3d Secure = 3 , 3d'siz = 1
];

```

Kullanıma hazır!

#Kullanımı
```php
use Kuveytturk;

public function index()
{
    $kuveytturk = Kuveytturk::setName('Faruk Çam')
        ->setCardNumber(1234567891234567)
        ->setCardExpireDateMonth(02)
        ->setCardExpireDateYear(18)
        ->setCardCvv2(123)
        ->setOrderId(12345)
        ->setAmount(100)
        ->pay();
}
```
