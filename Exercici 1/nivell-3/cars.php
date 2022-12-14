<?php
class Coupon {
    private $coupon;

    public function __construct($coupon)
    {
        $this->coupon = $coupon;
    }

    public function setCoupon($coupon) {
        $this->coupon = $coupon;
    }

    public function discount($isHighSeason, $bigStock) {
        $discount = $this->coupon->couponGenerator($isHighSeason, $bigStock);
        echo "Get {$discount}% off the price of your new car.";
    }

}

interface CouponGenerator {
    public function  couponGenerator($isHighSeason, $bigStock);
    public function addSeasonDiscount(&$coupon, $isHighSeason);
    public function addStockDiscount(&$coupon, $bigStock);
}

class BmwCouponGenerator implements CouponGenerator {
    public function couponGenerator($isHighSeason, $bigStock) {
        $coupon = 0;
        $this->addSeasonDiscount($coupon, $isHighSeason);
        $this->addStockDiscount($coupon, $bigStock);
        return $coupon;
    }

    public function addSeasonDiscount(&$coupon, $isHighSeason) {
        if(!$isHighSeason) {$coupon += 5;}
    }

    public function addStockDiscount(&$coupon, $bigStock) {
        if($bigStock) {$coupon += 7;}
    }
}


class MercedesCouponGenerator implements CouponGenerator {
    public function couponGenerator($isHighSeason, $bigStock) {
        $coupon = 0;
        $this->addSeasonDiscount($coupon, $isHighSeason);
        $this->addStockDiscount($coupon, $bigStock);
        return $coupon;
    }

    public function addSeasonDiscount(&$coupon, $isHighSeason) {
        if(!$isHighSeason) {$coupon += 4;}
    }

    public function addStockDiscount(&$coupon, $bigStock) {
        if($bigStock) {$coupon += 10;}
    }
}

?>