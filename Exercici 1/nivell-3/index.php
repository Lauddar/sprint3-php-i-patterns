<?php

include 'cars.php';
function cupounGenerator($car) {

    $discount = 0;
    $isHighSeason = false;
    $bigStock = true;

    if($car == "bmw"){
        if(!$isHighSeason) {$discount += 5;}
       if($bigStock) {$discount += 7;}
    } else if($car == "mercedes") {
       if(!$isHighSeason) {$discount += 4;}
       if($bigStock) {$discount += 10;}
    
    }
    return $cupoun = "Get {$discount}% off the price of your new car.";
}

echo "RESULT WITH cupounGenerator() FUNCTION IMPLEMENTATION: <br>";
echo "Car is BMW: ";
echo cupounGenerator("bmw")."<br>";
echo "Car is MERCEDES: ";
echo cupounGenerator("mercedes")."<br>";

echo "<br><br>";

echo "RESULT WITH STRATEGY PATTERN IMPLEMENTATION: <br>";
$isHighSeason = false;
$bigStock = true;

echo "Car is BMW: ";
$couponGenerator = new Coupon(new BmwCouponGenerator);
$couponGenerator->discount($isHighSeason, $bigStock);
echo "<br>";
echo "Car is MERCEDES: ";
$couponGenerator->setCoupon(new MercedesCouponGenerator);
$couponGenerator->discount($isHighSeason, $bigStock);

echo "<br><br>";

echo "RESULT WITH STRATEGY PATTERN IMPLEMENTATION: <br>";
$isHighSeason = false;
$bigStock = false;

echo "Car is BMW: ";
$couponGenerator = new Coupon(new BmwCouponGenerator);
$couponGenerator->discount($isHighSeason, $bigStock);
echo "<br>";
echo "Car is MERCEDES: ";
$couponGenerator->setCoupon(new MercedesCouponGenerator);
$couponGenerator->discount($isHighSeason, $bigStock);

?>