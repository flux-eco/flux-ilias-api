<?php

namespace FluxIliasApi\Service\FluxIliasRestObject\Command;

use FluxIliasApi\Libs\FluxIliasBaseApi\Adapter\FluxIliasRestObject\FluxIliasRestObjectDto;
use FluxIliasApi\Service\FluxIliasRestObject\Port\FluxIliasRestObjectService;
use FluxIliasApi\Service\ObjectConfig\ObjectConfigKey;

class GetFluxIliasRestObjectConfigFormValuesCommand
{

    private function __construct(
        private readonly FluxIliasRestObjectService $flux_ilias_rest_object_service
    ) {

    }


    public static function new(
        FluxIliasRestObjectService $flux_ilias_rest_object_service
    ) : static {
        return new static(
            $flux_ilias_rest_object_service
        );
    }


    public function getFluxIliasRestObjectConfigFormValues(FluxIliasRestObjectDto $object) : object
    {
        return (object) [
            ObjectConfigKey::API_PROXY_MAP_KEY->value => $this->flux_ilias_rest_object_service->getFluxIliasRestObjectApiProxyMapSelection(
                $object
            ),
            "description"                             => $object->description,
            ObjectConfigKey::WEB_PROXY_MAP_KEY->value => $this->flux_ilias_rest_object_service->getFluxIliasRestObjectWebProxyMapSelection(
                $object
            ),
            "title"                                   => $object->title
        ];
    }
}
