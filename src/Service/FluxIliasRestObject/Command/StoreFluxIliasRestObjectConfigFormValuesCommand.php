<?php

namespace FluxIliasApi\Service\FluxIliasRestObject\Command;

use FluxIliasApi\Libs\FluxIliasBaseApi\Adapter\FluxIliasRestObject\FluxIliasRestObjectDiffDto;
use FluxIliasApi\Libs\FluxIliasBaseApi\Adapter\FluxIliasRestObject\FluxIliasRestObjectDto;
use FluxIliasApi\Service\FluxIliasRestObject\Port\FluxIliasRestObjectService;
use FluxIliasApi\Service\ObjectConfig\ObjectConfigKey;

class StoreFluxIliasRestObjectConfigFormValuesCommand
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


    public function storeFluxIliasRestObjectConfigFormValues(FluxIliasRestObjectDto $object, object $values) : bool
    {
        $this->flux_ilias_rest_object_service->updateFluxIliasRestObjectById(
            $object->id,
            FluxIliasRestObjectDiffDto::new(
                null,
                strval($values->title ?? null),
                strval($values->description ?? null),
                strval($values->{ObjectConfigKey::WEB_PROXY_MAP_KEY->value} ?? null),
                strval($values->{ObjectConfigKey::API_PROXY_MAP_KEY->value} ?? null)
            )
        );

        return true;
    }
}
