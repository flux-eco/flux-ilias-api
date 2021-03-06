<?php

namespace FluxIliasApi\Service\Config\Port;

use FluxIliasApi\Service\Config\Command\DeleteConfigCommand;
use FluxIliasApi\Service\Config\Command\GetConfigCommand;
use FluxIliasApi\Service\Config\Command\SetConfigCommand;
use FluxIliasApi\Service\Config\ConfigKey;

class ConfigService
{

    private function __construct()
    {

    }


    public static function new() : static
    {
        return new static();
    }


    public function deleteConfig() : void
    {
        DeleteConfigCommand::new()
            ->deleteConfig();
    }


    public function getConfig(ConfigKey $key) : mixed
    {
        return GetConfigCommand::new()
            ->getConfig(
                $key
            );
    }


    public function setConfig(ConfigKey $key, mixed $value) : void
    {
        SetConfigCommand::new()
            ->setConfig(
                $key,
                $value
            );
    }
}
