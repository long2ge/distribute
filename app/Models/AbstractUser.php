<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 2020/5/3
 * Time: 5:30 PM
 */

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Laravel\Lumen\Auth\Authorizable;
use Laravel\Passport\HasApiTokens;

/**
 * 抽象用户
 * Class AbstractUser
 * @package App\Models
 */
abstract class AbstractUser extends BaseModel implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasApiTokens;

    /**
     * 根据用户名字获取密码
     * User: long
     * Date: 2019/4/7 6:22 PM
     * Describe:
     * @param $username
     * @return mixed
     */
    abstract public function findForPassport($username);

    /**
     * 退出登陆
     * User: long
     * Date: 2020/5/3 5:33 PM
     * Describe:
     * @param AbstractUser $user
     * @throws \Exception
     */
    public function logout(AbstractUser $user)
    {
        $user->token()->delete();
    }

}