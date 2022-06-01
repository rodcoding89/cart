<?php

namespace Cart;

class StorageFile implements Storable{

    private array $storage = [];
    private $filename = 'storage.txt';

    public function setValue(string $name, float $total):void{
        static $content = '';
        /*if(array_key_exists($name, $this->storage)){
            $content = $name . ' => ' . $total;
            file_put_contents($this->filename, $content, LOCK_EX);
            $this->storage[$name] += $total;
            return;
        }*/
        $content .= $total .',';
        file_put_contents($this->filename, $content, LOCK_EX);
    }
    public function total():float{
        $ressource = fopen('storage.txt', 'rb');
        $data = fread($ressource, filesize('storage.txt'));
        $tmp = explode(',',$data);
        return round(  array_sum($tmp), $_ENV['PRECISION']) ;
    }

}