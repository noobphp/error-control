<?php
namespace Noob\ErrorControl;
use Noob\ErrorControl\Lib\ExceptionObserver;

/**
 * Created by PhpStorm.
 * User: pxb
 * Date: 2018/9/2
 * Time: 下午9:07
 */

trait ExceptionSubjectTrait
{
    protected $observers = [];

    public final function addObserver(ExceptionObserver $observer)
    {
        if (! in_array($observer, $this->observers)) {
            $this->observers[] = $observer;
            return true;
        }
        return false;
    }

    public final function removeObserver(ExceptionObserver $observer)
    {
        if (($index = array_search($observer, $this->observers)) !== false) {
            unset($this->observers[$index]);
            return true;
        }
        return false;
    }
}