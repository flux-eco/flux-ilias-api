<?php

namespace FluxIliasApi\Service\ConfigForm\Command;

use FluxIliasApi\Libs\FluxIliasBaseApi\Adapter\User\UserDto;

class HasAccessToConfigFormCommand
{

    private function __construct()
    {

    }


    public static function new() : static
    {
        return new static();
    }


    public function hasAccessToConfigForm(?UserDto $user) : bool
    {
        return $user !== null && $user->id === intval(SYSTEM_USER_ID);
    }
}
