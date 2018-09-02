<?php
namespace Noob\ErrorControl;

use Exception;
use ErrorException;
use Noob\ErrorControl\Lib\ExceptionSubject;

/**
 * Created by PhpStorm.
 * User: pxb
 * Date: 2018/8/13
 * Time: 下午1:40
 */

class ErrorControl implements ExceptionSubject
{
    use ExceptionSubjectTrait;

    public function register()
    {
        set_exception_handler([$this, 'exception_handler']);
        set_error_handler([$this, 'error_handler']);
        register_shutdown_function([$this, 'register_shutdown_handler']);
        return $this;
    }

    public function exception_handler($e)
    {
        $this->notifyObservers($e);
    }

    public function error_handler($errno, $errstr, $errfile, $errline)
    {
        throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
    }

    public function register_shutdown_handler()
    {
        if ($error = error_get_last()) {
            $this->exception_handler(new ErrorException($error['message'], 0, $error['type'], $error['file'], $error['line']));
        }
    }

    public function notifyObservers(Exception $e)
    {
        // TODO: Implement notifyObservers() method.
        foreach ($this->observers as $observer) {
            call_user_func([$observer, 'catchException'], $e);
        }
    }
}
