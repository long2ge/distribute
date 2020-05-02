<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 2020/5/2
 * Time: 4:15 PM
 */

namespace App\Entities;

/**
 * 调用者实体类
 * Class InvokerEntity
 * @package App\Entities
 */
class InvokerEntity
{
    /**
     * @var string 来源
     */
    private $source;

    /**
     * @var string 版本号
     */
    private $version;

    /**
     * @var int 用户id
     */
    private $userId;

    /**
     * 获取来源
     * User: long
     * Date: 2020/5/2 5:30 PM
     * Describe:
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * 设置来源
     * User: long
     * Date: 2020/5/2 5:32 PM
     * Describe:
     * @param string $source
     * @return InvokerEntity
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * 获取版本号
     * User: long
     * Date: 2020/5/2 5:32 PM
     * Describe:
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * 设置版本号
     * User: long
     * Date: 2020/5/2 5:33 PM
     * Describe:
     * @param $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * 获取用户id
     * User: long
     * Date: 2020/5/2 5:34 PM
     * Describe:
     * @return int
     */
    public function getUserId()
    {
        return intval($this->userId);
    }

    /**
     * 设置用户id
     * User: long
     * Date: 2020/5/2 5:34 PM
     * Describe:
     * @param int $userId
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

}