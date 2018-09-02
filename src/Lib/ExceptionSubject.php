<?php
namespace Noob\ErrorControl\Lib;

use Exception;
/**
 * Created by PhpStorm.
 * User: pxb
 * Date: 2018/9/2
 * Time: 下午9:01
 */

interface ExceptionSubject
{
    public function notifyObservers(Exception $e);

    public function removeObserver(ExceptionObserver $observer);

    public function addObserver(ExceptionObserver $observer);
}