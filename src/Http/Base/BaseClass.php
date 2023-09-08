<?php

/**
 * Description of BaseClass.php
 *
 * @author Faruk Çam <mail@farukix.com>
 * Copyright (c) 2018 | farukix.com
 */

namespace farukcam\Kuveytturk\Http\Base;


class BaseClass {


    protected $name;
    protected $cardnumber;
    protected $cardexpiredatemonth;
    protected $cardcvv2;
    protected $orderid;
    protected $amount;
    protected $cardexpiredateyear;
    protected $successurl = "";
    protected $errorurl = "";
    protected $cardtype = "";
    protected $InstallmentCount = 0;
    protected $batchid = 0;
    protected $bag = [];


    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }


    public function setCardNumber($cardnumber)
    {
        $this->cardnumber = $cardnumber;

        return $this;
    }

    public function getCardNumber()
    {
        return $this->cardnumber;
    }


    public function setCardExpireDateMonth($cardexpiredatemonth)
    {
        $this->cardexpiredatemonth = $cardexpiredatemonth;

        return $this;
    }

    public function getCardExpireDateMonth()
    {
        return $this->cardexpiredatemonth;
    }

    public function setCardExpireDateYear($cardexpiredateyear)
    {
        $this->cardexpiredateyear = $cardexpiredateyear;

        return $this;
    }

    public function getCardExpireDateYear()
    {
        return $this->cardexpiredateyear;
    }

    public function setCardCvv2($cardcvv2)
    {
        $this->cardcvv2 = $cardcvv2;

        return $this;
    }

    public function getCardCvv2()
    {
        return $this->cardcvv2;
    }

    public function setOrderId($orderid)
    {
        $this->orderid = $orderid;

        return $this;
    }

    public function getOrderId()
    {
        return $this->orderid;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount * 100;

        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function setCardtype($cardtype)
    {
        $this->cardtype = $cardtype;

        return $this;
    }

    public function getCardtype()
    {
        // If the card type is already set, return it directly
        if ($this->cardtype) {
            return $this->cardtype;
        }

        $cardNumber = $this->getCardNumber();
        if (!$cardNumber) {
            return null;
        }

        $detectedType = null;

         // Visa
        if (preg_match("/^4/", $cardNumber)) {
            $detectedType = "Visa";
        } 
        // MasterCard
        elseif (preg_match("/^5[1-5]/", $cardNumber)) {
            $detectedType = "MasterCard";
        } 
        // American Express
        elseif (preg_match("/^3[47]/", $cardNumber)) {
            $detectedType = "American Express";
        } 
        // Troy
        elseif (in_array(substr($cardNumber, 0, 4), [9792, 6500, 6501, 6504, 6509, 6573, 6579, 6549])) {
            $detectedType = "Troy";
        }

        // If a card type was detected, set it
        if ($detectedType) {
            $this->setCardtype($detectedType);
        }

        return $this->cardtype;
    }

    public function setInstallmentCount($InstallmentCount)
    {
        $this->InstallmentCount = $InstallmentCount;

        return $this;
    }

    public function getInstallmentCount()
    {
        return $this->InstallmentCount;
    }

    public function setBatchId($batchid)
    {
        $this->batchid = $batchid;

        return $this;
    }

    public function getBatchId()
    {
        return $this->batchid;
    }

    public function setErrorUrl($url)
    {
        $this->errorurl = $url;

        return $this;
    }

    public function getErrorUrl()
    {
        return $this->errorurl;
    }

    public function setSuccessUrl($url)
    {
        $this->successurl = $url;

        return $this;
    }

    public function getSuccessUrl()
    {
        return $this->successurl;
    }
}
