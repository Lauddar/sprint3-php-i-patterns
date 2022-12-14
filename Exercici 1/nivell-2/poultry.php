<?php
class Duck {
       public function quack() {
              echo "Quack <br>";
       }

       public function fly() {
              echo "I'm flying <br>";
       }
}

class Turkey {

       public function gobble() {
              echo "Gobble gobble <br>";
       }

       public function fly() {
       echo "I'm flying a short distance <br>";
       }
}

class TurkeyAdapter extends Duck{
    private $turkey;

    public function __construct(Turkey $turkey) {
        $this->turkey = $turkey;
    }

    public function quack() {
        echo $this->turkey->gobble();
    }

    public function fly() {
        for ($i = 0; $i < 5;$i++) echo $this->turkey->fly();
    }

}

?>