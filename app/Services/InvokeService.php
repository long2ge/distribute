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
     * 获取资讯门面
     * User: long
     * Date: 2020/5/3 10:36 PM
     * Describe:
     * @return \Laravel\Lumen\Application|mixed|\Modules\News\Facades\NewsFacade
     */
    public function getNewsFacade()
    {
        $newsFacade = app('app.news');

        $newsFacade->setInvoker($this->getInvoker());

        return $newsFacade;
    }

    /**
     * 获取车辆门面
     * User: long
     * Date: 2020/5/3 10:36 PM
     * Describe:
     * @return \Laravel\Lumen\Application|mixed|\Modules\Car\Facades\CarFacade
     */
    public function getCarFacade()
    {
        $carFacade = app('app.car');

        $carFacade->setInvoker($this->getInvoker());

        return $carFacade;
    }

    /**
     * 获取消息中心门面
     * User: long
     * Date: 2020/5/3 10:37 PM
     * Describe:
     * @return \Laravel\Lumen\Application|mixed|\Modules\MessageCenter\Facades\MessageCenterFacade
     */
    public function getMessageCenterFacade()
    {
        $messageCenterFacade = app('app.messageCenter');

        $messageCenterFacade->setInvoker($this->getInvoker());

        return $messageCenterFacade;
    }

    /**
     * 获取小程序门面
     * User: long
     * Date: 2020/5/3 10:37 PM
     * Describe:
     * @return \Laravel\Lumen\Application|mixed|\Modules\MiniProgram\Facades\MiniProgramFacade
     */
    public function getMiniProgramFacade()
    {
        $miniProgramFacade = app('app.miniProgram');

        $miniProgramFacade->setInvoker($this->getInvoker());

        return $miniProgramFacade;
    }

    /**
     * 获取第三方门面
     * User: long
     * Date: 2020/5/3 10:37 PM
     * Describe:
     * @return \Laravel\Lumen\Application|mixed|\Modules\OpenApi\Facades\OpenApiFacade
     */
    public function getOpenApiFacade()
    {
        $openApiFacade = app('app.openApi');

        $openApiFacade->setInvoker($this->getInvoker());

        return $openApiFacade;
    }

    /**
     * 获取订单门面
     * User: long
     * Date: 2020/5/3 10:37 PM
     * Describe:
     * @return \Laravel\Lumen\Application|mixed|\Modules\Order\Facades\OrderFacade
     */
    public function getOrderFacade()
    {
        $orderFacade = app('app.order');

        $orderFacade->setInvoker($this->getInvoker());

        return $orderFacade;
    }

    /**
     * 获取用户门面
     * User: long
     * Date: 2020/5/3 10:38 PM
     * Describe:
     * @return \Laravel\Lumen\Application|mixed|\Modules\User\Facades\UserFacade
     */
    public function getUserFacade()
    {
        $userFacade = app('app.user');

        $userFacade->setInvoker($this->getInvoker());

        return $userFacade;
    }

    /**
     * 例子
     * User: long
     * Date: 2020/5/3 10:38 PM
     * Describe:
     * @return string
     */
    private function demo()
    {
        $service = new InvokeService(new InvokerEntity());

        return $service->getAdminFacade()->test();
    }

}