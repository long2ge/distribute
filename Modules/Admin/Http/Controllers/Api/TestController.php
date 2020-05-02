<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 2020/5/1
 * Time: 7:59 PM
 */

namespace Modules\Admin\Http\Controllers\Api;


use Illuminate\Http\Request;
use Modules\Admin\Http\Controllers\AdminController;

class TestController extends AdminController
{
    /**
     * get 测试
     * User: long
     * Date: 2020/5/2 10:19 AM
     * Describe: https://laravel-apidoc-generator.readthedocs.io/en/latest/documenting.html#indicating-authentication-status
     * @group 分组111
     * @urlParam id required The ID of the post.
     * @urlParam lang The language.
     * @bodyParam user_id int required The id of the user. Example: 9
     * @bodyParam room_id string The id of the room.
     * @bodyParam forever boolean Whether to ban the user forever. Example: false
     * @bodyParam another_one number Just need something here.
     * @bodyParam yet_another_param object required Some object params.
     * @bodyParam yet_another_param.name string required Subkey in the object param.
     * @bodyParam even_more_param array Some array params.
     * @bodyParam even_more_param.* float Subkey in the array param.
     * @bodyParam book.name string
     * @bodyParam book.author_id integer
     * @bodyParam book[pages_count] integer
     * @bodyParam ids.* integer
     * @bodyParam users.*.first_name string The first name of the user. Example: John
     * @bodyParam users.*.last_name string The last name of the user. Example: Doe
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     * @response {
     *  "id": 4,
     *  "name": "Jessica Jones",
     *  "roles": ["admin"]
     * }
     */
    public function test(Request $request)
    {
        $this->validate($request, [
            'keyword' => 'nullable|string',
            'business_status' => 'nullable|integer',
            'start_date' => 'nullable|date',
            'page_size' => 'int',
//            'longitude_and_latitude' => 'required|string',
            'in_city' => 'integer',
            'parking_fee' => 'numeric|min:0',
            'service_items' => 'json|nullable',
        ]);

        $attributes = $request->only([
            'keyword',
        ]);

        return response()->json($attributes + ['get test' => 1]);
    }

    /**
     * get 测试
     * User: long
     * Date: 2020/5/2 10:19 AM
     * Describe: https://laravel-apidoc-generator.readthedocs.io/en/latest/documenting.html#indicating-authentication-status
     * @group 分组222
     * @urlParam id required The ID of the post.
     * @urlParam lang The language.
     * @bodyParam user_id int required The id of the user. Example: 9
     * @bodyParam room_id string The id of the room.
     * @bodyParam forever boolean Whether to ban the user forever. Example: false
     * @bodyParam another_one number Just need something here.
     * @bodyParam yet_another_param object required Some object params.
     * @bodyParam yet_another_param.name string required Subkey in the object param.
     * @bodyParam even_more_param array Some array params.
     * @bodyParam even_more_param.* float Subkey in the array param.
     * @bodyParam book.name string
     * @bodyParam book.author_id integer
     * @bodyParam book[pages_count] integer
     * @bodyParam ids.* integer
     * @bodyParam users.*.first_name string The first name of the user. Example: John
     * @bodyParam users.*.last_name string The last name of the user. Example: Doe
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     * @response 201 {
     * }
     * @response 404 {
     *      "message": "No query"
     * }
     */
    public function postTest(Request $request)
    {
        $this->validate($request, [
            'keyword' => 'nullable|string',
            'business_status' => 'nullable|integer',
            'start_date' => 'nullable|date',
            'page_size' => 'int',
//            'longitude_and_latitude' => 'required|string',
            'in_city' => 'integer',
            'parking_fee' => 'numeric|min:0',
            'service_items' => 'json|nullable',
        ]);

        $attributes = $request->only([
//            'keyword',
        ]);

        return response()->json($attributes + ['post test' => 1]);
    }
}