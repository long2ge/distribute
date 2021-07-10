<?php
/**
 * Created by PhpStorm.
 * User: Long
 * Date: 2020/5/3
 * Time: 12:31
 */

namespace Modules\News\Facades;


use App\Traits\InvokeTrait;
use Modules\News\Services\ArticleService;

/**
 * 资讯系统门面
 * Class NewsFacade
 * @package Modules\News\Facades
 */
class NewsFacade
{
    use InvokeTrait;
    /**
     * 数据储存
     * @param $user
     * @param $attributes
     */
    public function articleStore($user, $attributes)
    {
        app(ArticleService::class)->store($user, $attributes);
    }

    /**
     * 查单条数据
     * @param $type
     * @param $id
     * @param null $enable
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function show($type, $id, $enable = null)
    {
        return app(ArticleService::class)->show($type, $id, $enable);
    }

    /**
     * 数据列表
     * @param null $pageSize
     * @param null $enable
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function index($pageSize = null, $enable = null)
    {
        return app(ArticleService::class)->index($pageSize,$enable);
    }

    /**
     * 更新数据
     * @param $user
     * @param $attributes
     */
    public function update($user, $attributes)
    {
        app(ArticleService::class)->update($user, $attributes);
    }

    public function delete($user, $id)
    {
        app(ArticleService::class)->delete($user, $id);
    }





}