# Laravel Kuveyt Turk Sanal Pos

<a class="bmc-button" target="_blank" href="https://www.buymeacoffee.com/farukcam"><img src="https://cdn.buymeacoffee.com/buttons/bmc-new-btn-logo.svg" alt="Buy me a coffee 😇"><span style="margin-left:5px;font-size:19px !important;">Buy me a coffee 😇</span></a>

Komut satırından bu kodu çalıştırınız:
Laravel 7'den küçük sürümler için : 
```
composer require farukcam/kuveytturk
```

Laravel 7 için : 
```composer.json``` içerisinde ```require``` tagının içerisine 

```json
"farukcam/kuveytturk": "^1.2",
```
yazıp, ardından
``` composer update ```
yapıyoruz.

sonrasında ;

```config/app.php``` dosyasına aşağıda bulunan satırları ekliyoruz.
```php
return [
    // ...

    'providers' => [
        // ...

        farukcam\Kuveytturk\KuveytturkServiceProvider::class
    ],

    // ...

    'aliases' => [
        // ...

        'Kuveytturk'    => farukcam\Kuveytturk\Facades\Kuveytturk::class
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
    "Password"            => "Web Yönetim ekranlarindan olusturulan api rollü kullanici sifresi",  // Test API Kullanıcı Şifresi : api123
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
        ->setCardExpireDateYear(20)
        ->setCardCvv2(123)
        ->setOrderId(12345)
        ->setAmount(100)
        ->pay();
}
```
