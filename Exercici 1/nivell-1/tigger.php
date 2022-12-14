<?php

class Tigger {

        private static $instance;
        private $roarCount;

        protected function __construct() {
                echo "Building character..." . PHP_EOL;
                $this->roarCount = 0;
        }

        protected function __clone() { }

        public function __wakeup() {
                throw new \Exception("Cannot unserialize a singleton.");
        }

        public static function getInstance() {
                if (!isset(self::$instance)) {
                        self::$instance = new Tigger();
                }

                return self::$instance;

        }

        public function roar() {
                $this->roarCount++;
                echo "Grrr!" . PHP_EOL;
        }

        public function getCounter(){
                return $this->roarCount;
        }

}

echo "Creating instance 'tigger1': \r\n";
$tigger1 = Tigger::getInstance();

echo "<br>";

echo "'tigger1' roaring:" . PHP_EOL;
for ($i = 0; $i < 5;$i++){
        echo $tigger1->roar();
}

echo "<br>";
echo "Creating instance 'tigger2':";
$tigger2 = Tigger::getInstance();
echo "<br>";
echo "'tigger1' roar count: ";
echo $tigger1->getCounter();
echo "<br>";
echo "\n 'tigger2' roar count: ";
echo $tigger2->getCounter();
echo "<br>";
echo "'tigger1': ";
var_dump($tigger1);
echo "<br>";
echo "'tigger2': ";
var_dump($tigger2);

?>