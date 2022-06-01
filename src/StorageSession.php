<?php

namespace Cart;
session_start();
class StorageSession implements Storable{

    public function setValue(string $name, float $total):void{
        $_SESSION['product'][$name] = $total;
    }
    public function total():float{
        return round(  array_sum($_SESSION['product']), $_ENV['PRECISION']) ;
    }

}