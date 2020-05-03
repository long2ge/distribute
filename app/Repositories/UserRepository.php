<?php
/**
 * Created by PhpStorm.
 * User: long
 * Date: 2020/5/3
 * Time: 6:20 PM
 */

namespace App\Repositories;



class UserRepository extends AbstractUserRepository
{
    public function getProviderClass(): string
    {
        $provider = config('auth.guards.api.provider');

        return config('auth.providers.'.$provider.'.model');
    }
}