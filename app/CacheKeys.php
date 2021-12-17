<?php

namespace App;


class CacheKeys
{
    /**
     * Api 登陆临时token
     *
     * @param  int  $id
     *
     * @return string
     */
    public static function tempToken(int $id)
    {
        return 'auth:temp-token:'.$id;
    }
}
