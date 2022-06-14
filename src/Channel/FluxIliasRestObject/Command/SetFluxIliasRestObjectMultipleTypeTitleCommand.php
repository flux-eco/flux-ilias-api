<?php

namespace FluxIliasApi\Channel\FluxIliasRestObject\Command;

use FluxIliasApi\Channel\Config\LegacyConfigKey;
use FluxIliasApi\Channel\Config\Port\ConfigService;

class SetFluxIliasRestObjectMultipleTypeTitleCommand
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


    public function setFluxIliasRestObjectMultipleTypeTitle(?string $multiple_type_title) : void
    {
        $this->config_service->setConfig(
            LegacyConfigKey::FLUX_ILIAS_REST_OBJECT_MULTIPLE_TYPE_TITLE(),
            $multiple_type_title
        );
    }
}