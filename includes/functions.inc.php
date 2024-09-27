<?php

    // Fiverr Charges Calc
    function fiverrCharge($orderAmmount){
        $fiverrCharge = $orderAmmount * 0.2;
        return $fiverrCharge;
    }

    // Seller Earn Calc
    function sellerEarned($orderAmmount){
        $sellerEarned = $orderAmmount - fiverrCharge($orderAmmount);
        return $sellerEarned;
    }