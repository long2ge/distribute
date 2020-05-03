<?php
/**
 * Created by PhpStorm.
 * User: Long
 * Date: 2020/5/2
 * Time: 22:20
 */

namespace Modules\News\Services;

use Modules\Admin\Models\Article;
use Modules\News\Models\ArticleLogic;

/**
 * 文章服务
 * Class ArticleService
 * @package Modules\Article\Services
 */
class ArticleService
{
    /**
     * 文章分页列表
     * User: long
     * Date: 2020/1/19 10:03 PM
     * Describe:
     * @param int $pageSize
     * @param int $enable
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */

    public function index($pageSize = 10, $enable = null)
    {
        return $this->getBuilder($enable)
            ->where('type', ArticleLogic::ARTICLE_TYPE)
            ->orderBy('id', 'desc')
            ->paginate($pageSize);
    }

    /**
     * 获取建造器
     * User: long
     * Date: 2020/1/19 11:52 PM
     * Describe:
     * @param null $enable
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function getBuilder($enable = null)
    {
        $articleBuilder = Article::query();

        if (null !== $enable) {
            $articleBuilder->where('enable', $enable);
        }

        return $articleBuilder;
    }

    /**
     * 获取后台列表
     * User: long
     * Date: 2020/1/19 11:58 PM
     * Describe:
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function adminIndex()
    {
        $articles = $this
            ->getBuilder()
            ->orderBy('type', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);

        foreach ($articles as $article) {
            $article->type_name = ArticleLogic::getDescribe($article->type);
        }

        return $articles;
    }


    /**
     * 获取详情
     * User: long
     * Date: 2020/1/19 10:28 PM
     * Describe:
     * @param $type
     * @param $id
     * @param null $enable
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
     */
    public function show($type, $id, $enable = null)
    {
        $articleBuilder = Article
            ::query()
            ->select(['id', 'title', 'content'])
            ->where('type', ArticleLogic::changeType($type));

        if ($id > 0) {
            $articleBuilder->where('id', $id);
        }

        if (null !== $enable) {
            $articleBuilder->where('enable', 1);
        }

        return $articleBuilder->first();
    }

    /**
     * 创建数据
     * User: long
     * Date: 2020/1/19 11:26 PM
     * Describe:
     * @param $user
     * @param $attributes
     */
    public function store($user, $attributes)
    {
        $type = $attributes['type'];

        // 校验类型
        $type = ArticleLogic::changeType($type);
        if (null === $type) {
            abort(400, '类型错误！');
        }

        // 校验数据
        if ($type != ArticleLogic::ARTICLE_TYPE &&
            Article::query()->where('type', $type)->exists()) {
            abort(400, '数据已经存在，不能重复创建！');
        }

        // 创建数据
        $article = Article::query()->create([
            'title' => $attributes['title'] ?? '',
            'content' => $attributes['content'],
            'type' => $type,
            'creator_id' => $user->id,
            'enable' => 1,
        ]);
        if (! $article) {
            abort(400, '创建文章失败！');
        }
    }

    /**
     * 更新数据
     * User: long
     * Date: 2020/1/20 12:03 AM
     * Describe:
     * @param $user
     * @param $attributes
     */
    public function update($user, $attributes)
    {
        $article = Article::query()->find($attributes['id']);
        if (! $article) {
            abort(400, '没有找到数据');
        }

        $result = $article->fill($attributes)->save();
        if (false === $result) {
            abort(400, '更新数据失败!');
        }
    }

    /**
     * 删除数据
     * User: long
     * Date: 2020/1/20 12:03 AM
     * Describe:
     * @param $user
     * @param $id
     */
    public function delete($user, $id)
    {
        Article::query()->where('id', $id)->delete();
    }

}