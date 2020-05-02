<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 2020/5/1
 * Time: 7:59 PM
 */

namespace Modules\Admin\Http\Controllers\Api;

use Illuminate\Http\Request;
use Modules\Admin\Http\Controllers\AdminAppController;

/**
 * Class TestController
 * Describe: https://laravel-apidoc-generator.readthedocs.io/en/latest/documenting.html#indicating-authentication-status
 * @package Modules\Admin\Http\Controllers\Api
 */
class TestController extends AdminAppController
{
    /**
     * 接口的名字 ： get 测试
     * User: long
     * Date: 2020/5/2 12:12 PM
     *
     * @group 分组111
     *
     * 在url的参数
     * @urlParam id required The ID of the post.
     * @urlParam lang The language.
     *
     * 在请求体的参数（user_id 用户id, int 数据类型, required 是否必须, 字段的解释(用一点结束解释), Example : 9 这个参数的例子）
     * @bodyParam user_id int required 用户的id. Example: 9
     * @bodyParam room_id string 字段解释.
     * @bodyParam forever boolean Whether to ban the user forever. Example: false
     * @bodyParam another_one number Just need something here.
     * @bodyParam yet_another_param object required Some object params.
     * @bodyParam yet_another_param.name string required Subkey in the object param.
     * @bodyParam even_more_param array Some array params.
     *
     * @response 200 {
     *  "id": 4,
     *  "name": "Jessica Jones",
     *  "roles": ["admin"]
     * }
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function test(Request $request)
    {
        $this->validate($request, [
            'keyword' => 'nullable|string',
            'business_status' => 'nullable|integer',
            'start_date' => 'nullable|date',
            'page_size' => 'int',
            'in_city' => 'integer',
            'parking_fee' => 'numeric|min:0',
            'service_items' => 'json|nullable',
        ]);

        $a = ['get test' => 1];

        return $this->responseArray($a);
    }

    /**
     * 接口的名字写在这里 post 测试
     * User: long
     * Date: 2020/5/2 12:12 PM
     *
     * @group 分组2222
     *
     * 在url的参数
     * @urlParam id required The ID of the post.
     * @urlParam lang The language.
     *
     * 在请求体的参数（user_id 用户id, int 数据类型, required 是否必须, 字段的解释(用一点结束解释), Example : 9 这个参数的例子）
     * @bodyParam user_id int required 用户的id. Example: 9
     * @bodyParam room_id string 字段解释.
     * @bodyParam forever boolean Whether to ban the user forever. Example: false
     * @bodyParam another_one number Just need something here.
     * @bodyParam yet_another_param object required Some object params.
     * @bodyParam yet_another_param.name string required Subkey in the object param.
     * @bodyParam even_more_param array Some array params.
     * 响应的
     * @response 201 {
     * }
     * @response 404 {
     *      "message": "No query"
     * }
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function postTest(Request $request)
    {
        $this->validate($request, [
            'keyword' => 'nullable|string',
            'business_status' => 'nullable|integer',
            'start_date' => 'nullable|date',
            'page_size' => 'int',
            'longitude_and_latitude' => 'required|string',
            'in_city' => 'integer',
            'parking_fee' => 'numeric|min:0',
            'service_items' => 'json|nullable',
        ]);

        $attributes = $request->only([
            'keyword',
        ]);

        // 逻辑处理

        return $this->noContent();
    }
}