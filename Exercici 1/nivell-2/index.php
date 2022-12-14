<?php
include 'poultry.php';
function duck_interaction($duck) {
       $duck->quack();
       $duck->fly();
}

$duck = new Duck;
$turkey = new Turkey;
$turkey_adapter = new TurkeyAdapter($turkey);
echo "The Turkey says...<br>";
$turkey->gobble();
$turkey->fly();
echo "The Duck says...<br>";
duck_interaction($duck);
echo "The TurkeyAdapter says...<br>";
duck_interaction($turkey_adapter);

?>