<?php
namespace Noob\ErrorControl;

use ErrorException;

/**
 * Created by PhpStorm.
 * User: pxb
 * Date: 2018/8/13
 * Time: 下午1:40
 */

class ErrorControl
{
    protected $call_func;

    public function register()
    {
        set_exception_handler([$this, 'exception_handler']);
        set_error_handler([$this, 'error_handler']);
        register_shutdown_function([$this, 'register_shutdown_handler']);
    }

    public function setCallFunc($call_func)
    {
        $this->call_func = $call_func;
        return $this;
    }

    public function exception_handler($e)
    {
        if ($this->call_func) {
            call_user_func($this->call_func, $e);
        }
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
}
