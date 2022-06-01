<?php

require_once __DIR__ .'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

use Cart\{Book, Music, Bike, Cart, StorageArray,StorageFile,StorageSession};

$products = [
    new Book(name : 'Moby Dick', price : 30),
    new Music(name :'AC/DC', price : 17.5),
    new Bike(price: 1430, name :'Brompton'),
];

$cart = new Cart(storage: new StorageArray(), tva : $_ENV['TVA']);

$cart2 = new Cart(storage: new StorageFile(), tva : $_ENV['TVA']);

$cart3 = new Cart(storage: new StorageSession(), tva : $_ENV['TVA']);

foreach($products as $product)
    $cart->buy($product, 5);

echo  $cart->total()  . "\n";

foreach($products as $product)
    $cart2->buy($product, 5);

echo  $cart2->total()  . "\n";

foreach($products as $product)
    $cart3->buy($product, 5);

echo  $cart3->total()  . "\n";