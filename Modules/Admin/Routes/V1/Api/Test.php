<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 2020/5/1
 * Time: 8:20 PM
 */

/**
 * ·············································
 *  get 测试路由
 * ·············································
 */
Route::get('test', 'TestController@test');

/**
 * ·············································
 *  post 测试路由
 * ·············································
 */
Route::post('test', 'TestController@postTest');
