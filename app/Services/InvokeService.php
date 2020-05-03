<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 2020/5/2
 * Time: 4:09 PM
 */

namespace App\Services;


use App\Entities\InvokerEntity;
use App\Traits\InvokeTrait;

/**
 * 调用服务
 * Class InvokeService
 * @package App\Services
 */
class InvokeService
{
    use InvokeTrait;

    /**
     * InvokeService constructor.
     * @param InvokerEntity $invoker
     */
    public function __construct(InvokerEntity $invoker)
    {
        $this->setInvoker($invoker);
    }

    /**
     * 获取后台门面
     * User: long
     * Date: 2020/5/2 5:38 PM
     * Describe:
     * @return \Laravel\Lumen\Application|mixed|\Modules\Admin\Facades\AdminFacade
     */
    public function getAdminFacade()
    {
        $adminFacade = app('app.admin');

        $adminFacade->setInvoker($this->getInvoker());

        return $adminFacade;
    }

    /**
     * @return \Laravel\Lumen\Application|mixed|\Modules\News\Facades\NewsFacade
     */
    public function getNewsFacade()
    {
        $newsFacade = app('app.news');

        $newsFacade->setInvoker($this->getInvoker());

        return $newsFacade;
    }

    public function demo()
    {
        $service = new InvokeService(new InvokerEntity());

        return $service->getAdminFacade()->test();
    }

}