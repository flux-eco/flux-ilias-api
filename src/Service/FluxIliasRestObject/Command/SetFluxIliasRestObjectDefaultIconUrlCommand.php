<?php

namespace FluxIliasApi\Service\FluxIliasRestObject\Command;

use FluxIliasApi\Service\Config\LegacyConfigKey;
use FluxIliasApi\Service\Config\Port\ConfigService;

class SetFluxIliasRestObjectDefaultIconUrlCommand
{

    private ConfigService $config_service;


    private function __construct(
        /*private readonly*/ ConfigService $config_service
    ) {
        $this->config_service = $config_service;
    }


    public static function new(
        ConfigService $config_service
    ) : /*static*/ self
    {
        return new static(
            $config_service
        );
    }


    public function setFluxIliasRestObjectDefaultIconUrl(?string $default_icon_url) : void
    {
        $this->config_service->setConfig(
            LegacyConfigKey::FLUX_ILIAS_REST_OBJECT_DEFAULT_ICON_URL(),
            $default_icon_url
        );
    }
}