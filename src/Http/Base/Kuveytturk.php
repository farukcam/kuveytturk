<?php
/**
 * Description of Kuveytturk.php
 *
 * @author Faruk Çam <mail@farukix.com>
 * Copyright (c) 2018 | farukix.com
 */
namespace Farukcam\Kuveytturk\Http\Base;

use Config;
use Exception;

class Kuveytturk extends BaseClass {


    protected function process()
    {
        $HashedPassword = base64_encode(sha1(Config::get("kuveytturk.Password"), "ISO-8859-9")); //md5($Password);
        $HashData = base64_encode(sha1(Config::get("kuveytturk.MerchantId") . $this->orderid . $this->amount . Config::get("kuveytturk.OkUrl") . Config::get("kuveytturk.FailUrl") . Config::get("kuveytturk.UserName") . $HashedPassword, "ISO-8859-9"));
        $xml= '<KuveytTurkVPosMessage xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">'
            . '<APIVersion>' . Config::get("kuveytturk.APIVersion") . '</APIVersion>'
            . '<OkUrl>' . Config::get("kuveytturk.OkUrl") . '</OkUrl>'
            . '<FailUrl>' . Config::get("kuveytturk.FailUrl") . '</FailUrl>'
            . '<HashData>' . $HashData . '</HashData>'
            . '<MerchantId>' . Config::get("kuveytturk.MerchantId") . '</MerchantId>'
            . '<CustomerId>' . Config::get("kuveytturk.CustomerId") . '</CustomerId>'
            . '<UserName>' . Config::get("kuveytturk.UserName") . '</UserName>'
            . '<CardNumber>' . $this->cardnumber . '</CardNumber>'
            . '<CardExpireDateYear>' . $this->cardexpiredateyear . '</CardExpireDateYear>'
            . '<CardExpireDateMonth>' . $this->cardexpiredatemonth . '</CardExpireDateMonth>'
            . '<CardCVV2>' . $this->cardcvv2 . '</CardCVV2>'
            . '<CardHolderName>' . $this->name . '</CardHolderName>'
            . '<CardType>' . $this->cardtype . '</CardType>'
            . '<BatchID>' . $this->batchid . '</BatchID>'
            . '<TransactionType>' . Config::get("kuveytturk.Type") . '</TransactionType>'
            . '<InstallmentCount>' . $this->InstallmentCount . '</InstallmentCount>'
            . '<Amount>' . $this->amount . '</Amount>'
            . '<DisplayAmount>' . $this->amount . '</DisplayAmount>'
            . '<CurrencyCode>' . Config::get("kuveytturk.CurrencyCode") . '</CurrencyCode>'
            . '<MerchantOrderId>' . $this->orderid . '</MerchantOrderId>'
            . '<TransactionSecurity>' . Config::get("kuveytturk.TransactionSecurity") . '</TransactionSecurity>'
            . '<TransactionSide>' . Config::get("kuveytturk.Type") . '</TransactionSide>'
            . '</KuveytTurkVPosMessage>';
        try
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/xml', 'Content-length: '. strlen($xml)) );
            curl_setopt($ch, CURLOPT_POST, true); //POST Metodu kullanarak verileri gönder
            curl_setopt($ch, CURLOPT_HEADER, false); //Serverdan gelen Header bilgilerini önemseme.
            curl_setopt($ch, CURLOPT_URL, Config::get("kuveytturk.ApiUrl")); //Baglanacagi URL
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //Transfer sonuçlarini al.
            $data = curl_exec($ch);
            curl_close($ch);
        } catch (Exception $e)
        {
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
        echo($data);
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    }


    public function pay()
    {
        $allvariables = get_object_vars($this);
        foreach ($allvariables as $variables => $key):
            $this->throwexception($variables, $key);
        endforeach;
        $this->process();
    }


    protected function throwexception($key, $property)
    {
        if (is_null($property))
        {
            throw new Exception("" . $key . " alanı boş olamaz gerekli.", 212);

        }
    }


}
