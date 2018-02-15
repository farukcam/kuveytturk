<?php

/**
 * Description of kuveytturk.php
 *
 * @author Faruk Çam <mail@farukix.com>
 * Copyright (c) 2018 | farukix.com
 */

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
