<?php

// 后台模块路由
Route::group([
    'prefix' => 'api/admin',
    'namespace' => 'Modules\Admin\Http\Controllers\Api'
], function () {
    require __DIR__ . '/Api/Test.php';
    require __DIR__ . '/Api/Article.php';
});