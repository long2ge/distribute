<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 2020/5/2
 * Time: 4:59 PM
 */

namespace App\Traits;


use App\Entities\InvokerEntity;

/**
 * 调用trait
 * Trait InvokeTrait
 * @package App\Traits
 */
trait InvokeTrait
{
    /**
     * @var InvokerEntity 调用者
     */
    public $invoker;

    /*
     * 获取调用者
     */
    public function getInvoker() : InvokerEntity
    {
        return $this->invoker;
    }

    /**
     * 设置调用者
     * User: long
     * Date: 2020/5/2 4:37 PM
     * Describe:
     * @param $invoker
     * @return static
     */
    public function setInvoker($invoker)
    {
        $this->invoker = $invoker;

        return $this;
    }
}