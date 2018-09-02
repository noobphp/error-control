<?php
namespace Noob\ErrorControl\Lib;

use Exception;
/**
 * Created by PhpStorm.
 * User: pxb
 * Date: 2018/9/2
 * Time: 下午9:03
 */

interface ExceptionObserver
{
    public function catchException(Exception $e);
}