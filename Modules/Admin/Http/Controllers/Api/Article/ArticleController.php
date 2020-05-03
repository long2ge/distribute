<?php
/**
 * Created by PhpStorm.
 * User: Long
 * Date: 2020/5/2
 * Time: 22:04
 */

namespace Modules\Admin\Http\Controllers\Api\Article;


use App\Entities\InvokerEntity;
use App\Services\InvokeService;
use App\User;
use Illuminate\Http\Request;
use Modules\Admin\Http\Controllers\AdminAppController;
use Modules\News\Services\ArticleService;

class ArticleController extends AdminAppController
{

    private $newsFacade;

    public function __construct()
    {
        $service = new InvokeService(new InvokerEntity());

        $this->newsFacade = $service->getNewsFacade();
    }

    /**
     * 接口的名字 ： 文章列表
     * User: long
     * Date: 2020/5/3 17:12 PM
     *
     * @group Article
     *
     * @response 200 {
     *  "current_page": 1,
     *  "data": [
     *      {
     *          "id": 2,
     *          "title": "1111",
     *          "enable": 1,
     *          "type": 1,
     *          "type_name": 1,
     *          "created_at": "2020-01-19 23:31:09",
     *          "updated_at": "2020-01-19 23:31:09",
     *          "content": "222222"
     *      }
     *  ],
     *  "first_page_url": "http://musk.com/api/user/user-contact-list?page=1",
     *  "from": 1,
     *  "last_page": 1,
     *  "last_page_url": "http://musk.com/api/user/user-contact-list?page=1",
     *  "next_page_url": null,
     *  "path": "http://musk.com/api/user/user-contact-list",
     *  "per_page": "3",
     *  "prev_page_url": null,
     *  "to": 3,
     *  "total": 3
     *  }
     *
     */
    public function index()
    {
        return $this->responseArray($this->newsFacade->index());
    }

    /**
     * 单条
     * @param $type
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($type, $id)
    {
        return response()->json($this->newsFacade->show($type, $id));
    }

    /**
     * 保存
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'string',
            'content' => 'required|string',
            'type' => 'required|string',
        ]);

        $attributes = $request->only([
            'title',
            'content',
            'type',
        ]);

        // 1，控制器要继承对应模块的基础类，这个admin模块是 AdminAppController

        // 2 调用数据的方法变了，要用下面的方式 $this->newsFacade

        // 返回变了，用transformer

        $user = User::query()->find(1);
        $this->
        $this->newsFacade->articleStore($user, $attributes);

        return $this->noContent();
    }

    /**
     * 修改
     * @param Request $request
     * @param $id
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'string',
            'content' => 'string',
        ]);

        $attributes = $request->only([
            'title',
            'content',
        ]);

        if (empty($attributes)) {
            abort(400, '数据不能是空!');
        }

        $attributes += [
            'id' => $id
        ];

        $user = $request->user();

        $this->newsFacade->update($user, $attributes);

        return response()->noContent();
    }

    /**
     * 删除
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function delete(Request $request, $id)
    {
        $user = $request->user();

        $this->newsFacade->delete($user, $id);

        return response()->noContent();
    }

}