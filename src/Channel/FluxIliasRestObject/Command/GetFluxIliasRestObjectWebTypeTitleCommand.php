<?php

namespace FluxIliasApi\Channel\FluxIliasRestObject\Command;

use FluxIliasApi\Channel\FluxIliasRestObject\Port\FluxIliasRestObjectService;
use ilUtil;

class GetFluxIliasRestObjectWebTypeTitleCommand
{

    private FluxIliasRestObjectService $flux_ilias_rest_object_service;


    private function __construct(
        /*private readonly*/ FluxIliasRestObjectService $flux_ilias_rest_object_service
    ) {
        $this->flux_ilias_rest_object_service = $flux_ilias_rest_object_service;
    }


    public static function new(
        FluxIliasRestObjectService $flux_ilias_rest_object_service
    ) : /*static*/ self
    {
        return new static(
            $flux_ilias_rest_object_service
        );
    }


    public function getFluxIliasRestObjectWebTypeTitle() : string
    {
        $type_title = $this->flux_ilias_rest_object_service->getFluxIliasRestObjectTypeTitle();
        if ($type_title !== null) {
            return $type_title;
        }

        return "flux-ilias-rest-object";
    }
}
