<?php
/**
 * Created by PhpStorm.
 * User: Long
 * Date: 2020/5/3
 * Time: 18:35
 */

namespace Modules\Admin\Models;


use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends BaseModel
{
    use SoftDeletes;

    /**
     * The connection name for the model.
     * 库链接的配置名
     *
     * @var string
     */
//    protected $connection = 'core';

    /**
     * Table Name
     * 表名
     *
     * @var string
     */
    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', //  标题
        'content', // 内容
        'creator_id', // 创建者
        'enable', // 是否展示
        'type', // 企业介绍，服务介绍，价格介绍，文章, 服务告知书
    ];
}