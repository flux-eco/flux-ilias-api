<?php

namespace FluxIliasApi\Channel\FluxIliasRestObject\Command;

use FluxIliasApi\Channel\Config\LegacyConfigKey;
use FluxIliasApi\Channel\Config\Port\ConfigService;

class SetEnableFluxIliasRestObjectWebProxyCommand
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


    public function setEnableFluxIliasRestObjectWebProxy(bool $enable_flux_ilias_rest_object_web_proxy) : void
    {
        $this->config_service->setConfig(
            LegacyConfigKey::ENABLE_FLUX_ILIAS_REST_OBJECT_WEB_PROXY(),
            $enable_flux_ilias_rest_object_web_proxy
        );
    }
}