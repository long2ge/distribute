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
     * demo
     * User: long
     * Date: 2020/5/1 8:31 PM
     * Describe:
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
//            'longitude_and_latitude' => 'required|string',
            'in_city' => 'integer',
            'parking_fee' => 'numeric|min:0',
            'service_items' => 'json|nullable',
        ]);

        $attributes = $request->only([
            'keyword',
        ]);

        return response()->json($attributes + ['test' => 1]);
    }
}