<?php
/**
 * Created by PhpStorm.
 * User: Long
 * Date: 2020/5/2
 * Time: 16:27
 */

namespace Modules\News\Models;


/**
 * 文章逻辑
 * Class ArticleLogic
 * @package Modules\Article\Logics
 */
class ArticleLogic
{
    /**
     * int 文章类型
     */
    const ARTICLE_TYPE = 10;

    /**
     * int 企业介绍
     */
    const COMPANY_TYPE = 40;

    /**
     * int 服务介绍
     */
    const SERVICE_TYPE = 30;

    /**
     * int 价格介绍
     */
    const PRICE_TYPE = 20;

    /**
     * int 服务告知书
     */
    const SERVICE_NOTICE = 15;

    /**
     * array 类型
     */
    const TYPES = [
        self::ARTICLE_TYPE => 'article',
        self::COMPANY_TYPE => 'company',
        self::SERVICE_TYPE => 'service',
        self::PRICE_TYPE => 'price',
        self::SERVICE_NOTICE => 'service_notice',
    ];

    const DESCRIBES = [
        self::ARTICLE_TYPE => '文章',
        self::COMPANY_TYPE => '企业介绍',
        self::SERVICE_TYPE => '服务介绍',
        self::PRICE_TYPE => '价格介绍',
        self::SERVICE_NOTICE => '服务告知书',
    ];

    /**
     * @return array 获取排序类型
     */
    public static function getSortTypes()
    {
        return [
            self::ARTICLE_TYPE,
            self::COMPANY_TYPE,
            self::SERVICE_TYPE,
            self::PRICE_TYPE,
            self::SERVICE_NOTICE,
        ];
    }

    /**
     * 获取描述
     * User: long
     * Date: 2020/1/19 11:56 PM
     * Describe:
     * @param $type
     * @return mixed|null
     */
    public static function getDescribe($type)
    {
        foreach (self::DESCRIBES as $key => $value) {
            if ($type == $key) {
                return $value;
            }
        }

        return null;
    }

    /**
     * 获取类型
     * User: long
     * Date: 2020/1/19 10:27 PM
     * Describe:
     * @param $type
     * @return int|string
     */
    public static function changeType($type)
    {
        foreach (self::TYPES as $key => $value) {
            if ($type == $value) {
                return $key;
            }
        }

        return null;
    }



}