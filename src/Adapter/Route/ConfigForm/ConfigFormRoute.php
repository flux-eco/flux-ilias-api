<?php

namespace FluxIliasApi\Adapter\Route\ConfigForm;

use FluxIliasApi\Libs\FluxRestApi\Adapter\Body\HtmlBodyDto;
use FluxIliasApi\Libs\FluxRestApi\Adapter\Method\LegacyDefaultMethod;
use FluxIliasApi\Libs\FluxRestApi\Adapter\Method\Method;
use FluxIliasApi\Libs\FluxRestApi\Adapter\Route\Documentation\RouteDocumentationDto;
use FluxIliasApi\Libs\FluxRestApi\Adapter\Route\Route;
use FluxIliasApi\Libs\FluxRestApi\Adapter\Server\ServerRequestDto;
use FluxIliasApi\Libs\FluxRestApi\Adapter\Server\ServerResponseDto;
use FluxIliasApi\Service\Proxy\Port\ProxyService;
use ilGlobalTemplateInterface;

class ConfigFormRoute implements Route
{

    private ilGlobalTemplateInterface $ilias_global_template;
    private ProxyService $proxy_service;


    private function __construct(
        /*private readonly*/ ProxyService $proxy_service,
        /*private readonly*/ ilGlobalTemplateInterface $ilias_global_template
    ) {
        $this->proxy_service = $proxy_service;
        $this->ilias_global_template = $ilias_global_template;
    }


    public static function new(
        ProxyService $proxy_service,
        ilGlobalTemplateInterface $ilias_global_template
    ) : /*static*/ self
    {
        return new static(
            $proxy_service,
            $ilias_global_template
        );
    }


    public function getDocumentation() : ?RouteDocumentationDto
    {
        return null;
    }


    public function getMethod() : Method
    {
        return LegacyDefaultMethod::GET();
    }


    public function getRoute() : string
    {
        return "/";
    }


    public function handle(ServerRequestDto $request) : ?ServerResponseDto
    {
        return ServerResponseDto::new(
            HtmlBodyDto::new(
                $this->proxy_service->getWebProxy(
                    $this->ilias_global_template,
                    "flux-ilias-rest-config",
                    "flux-ilias-rest-config",
                    "flux-ilias-rest",
                    "config",
                    "/static/flilre_config.html",
                    null,
                    $request->original_route
                )
            )
        );
    }
}
