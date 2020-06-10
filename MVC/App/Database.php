<?php
use Illuminate\Databse\Capsule\Manager as Capsule;
$Capsule= new Capsule();
$Capsule->addConnection([
    'driver' =>'mysql',
    'host' =>'127.0.0.1',
    'username' =>'root',
    'password'=>'',
    'database'=>'saad',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);
$Capsule->bootEloquent();