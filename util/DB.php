<?php
namespace Util;

require __DIR__ . '/../rb.php';

class DB extends R
{
    private function __construct()
    {
        R::setup('mysql:host=127.0.0.1;dbname=breastca_main', 'root', '');
    }
}
