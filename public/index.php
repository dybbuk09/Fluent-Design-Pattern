<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once dirname(__DIR__).'/vendor/autoload.php';

try {
    
    echo \FluentAPI\Math::add(10)
                        ->add(20.5)
                        ->divide(2)
                        ->add(.75)
                        ->subtract(10)
                        ->multiply(5)
                        ->get();

} catch(\Exception $e) {
    echo $e->getMessage();
}