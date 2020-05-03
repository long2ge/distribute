<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 2019/10/16
 * Time: 1:25 AM
 */

/**
 *  ```````````````````````````
 *  文章列表
 *  ```````````````````````````
 */
Route::get('/article/index',  'Article\ArticleController@index');

//
///**
// *  ```````````````````````````
// *  文章内容
// *  ```````````````````````````
// */
//Route::get('/article/show/{type}/{id}', 'Admin\Article\ArticleController@show');
//
///**
// *  ```````````````````````````
// *  新增文章
// *  ```````````````````````````
// */
//Route::post('/article', 'Admin\Article\ArticleController@store');
//
//
///**
// *  ```````````````````````````
// *  修改文章
// *  ```````````````````````````
// */
//Route::put('/article/{id}', 'Admin\Article\ArticleController@update');
//
//
///**
// *  ```````````````````````````
// *  删除文章
// *  ```````````````````````````
// */
//Route::delete('/article/{id}', 'Admin\Article\ArticleController@delete');