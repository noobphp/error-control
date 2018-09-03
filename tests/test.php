<?php

use Noob\ErrorControl\ErrorControl;
use Noob\ErrorControl\Lib\ExceptionSubject;
use Noob\ErrorControl\Lib\ExceptionObserver;

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

class Test implements ExceptionObserver
{
    protected $error_subject;

    public function __construct(ExceptionSubject $subject)
    {
        $this->error_subject = $subject;
        $subject->addObserver($this);
    }

    public function catchException(Exception $e)
    {
        // TODO: Implement catchException() method.
        echo "this is test\n";
        if ($e instanceof MyException) {
            echo "this is my exception";
        }
        var_dump($e);
    }
}

class Test2 implements ExceptionObserver
{
    protected $error_subject;

    public function __construct(ExceptionSubject $subject)
    {
        $this->error_subject = $subject;
        $subject->addObserver($this);
    }

    public function catchException(Exception $e)
    {
        // TODO: Implement catchException() method.
        echo "this is test222\n";
        var_dump($e);
    }
}

class MyException extends Exception
{

}

$error_control = ErrorControl::getInstance()->register();
$test = new Test($error_control);
$test2 = new Test2($error_control);
//$error_control->removeObserver($test2);

//throw new MyException('hello');

$a = new MyTest();