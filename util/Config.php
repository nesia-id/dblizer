<?php

namespace Util;

class Config
{

    public static $default_export = 'excel';
    
    // TODO currently working with excel
    public static $export_option = [
        'excel', 'sql', 'csv', 'mysql', 'pgsql'
    ];

    // TODO next update
    public static $impor_option = [
        'excel', 'sql', 'csv', 'mysql', 'pgsql'
    ];
}
