<?php

use Noob\ErrorControl\ErrorControl;

require ("../vendor/autoload.php");
/**
 * Created by PhpStorm.
 * User: pxb
 * Date: 2018/8/13
 * Time: 下午1:44
 */
ini_set('display_errors', true);
ini_set('error_reporting', E_ALL);
var_dump(PHP_VERSION);

(new ErrorControl())->setCallFunc([new Test(), 'gg'])->register();

class Test
{
    public function gg($e)
    {
        echo 'hh';
    }
}