<?php

namespace FluxIliasApi\Adapter\Route\FluxIliasRestObjectForm;

use FluxIliasApi\Libs\FluxIliasBaseApi\Adapter\FluxIliasRestObject\FluxIliasRestObjectDto;
use FluxIliasApi\Libs\FluxRestApi\Adapter\Body\JsonBodyDto;
use FluxIliasApi\Libs\FluxRestApi\Adapter\Method\DefaultMethod;
use FluxIliasApi\Libs\FluxRestApi\Adapter\Method\Method;
use FluxIliasApi\Libs\FluxRestApi\Adapter\Route\Documentation\RouteDocumentationDto;
use FluxIliasApi\Libs\FluxRestApi\Adapter\Route\Route;
use FluxIliasApi\Libs\FluxRestApi\Adapter\Server\ServerRequestDto;
use FluxIliasApi\Libs\FluxRestApi\Adapter\Server\ServerResponseDto;
use FluxIliasApi\Service\FluxIliasRestObject\Port\FluxIliasRestObjectService;

class GetFluxIliasRestObjectConfigFormValuesRoute implements Route
{

    private function __construct(
        private readonly FluxIliasRestObjectService $flux_ilias_rest_object_service,
        private readonly FluxIliasRestObjectDto $object
    ) {

    }


    public static function new(
        FluxIliasRestObjectService $flux_ilias_rest_object_service,
        FluxIliasRestObjectDto $object
    ) : static {
        return new static(
            $flux_ilias_rest_object_service,
            $object
        );
    }


    public function getDocumentation() : ?RouteDocumentationDto
    {
        return null;
    }


    public function getMethod() : Method
    {
        return DefaultMethod::GET;
    }


    public function getRoute() : string
    {
        return "/get-values";
    }


    public function handle(ServerRequestDto $request) : ?ServerResponseDto
    {
        return ServerResponseDto::new(
            JsonBodyDto::new(
                $this->flux_ilias_rest_object_service->getFluxIliasRestObjectConfigFormValues(
                    $this->object
                )
            )
        );
    }
}
