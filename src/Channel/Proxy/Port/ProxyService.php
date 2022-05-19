<?php

namespace FluxIliasApi\Channel\Proxy\Port;

use FluxIliasApi\Adapter\User\UserDto;
use FluxIliasApi\Channel\ConfigForm\Port\ConfigFormService;
use FluxIliasApi\Channel\Proxy\Command\GetWebProxyCommand;
use FluxIliasApi\Channel\Proxy\Command\GetWebProxyMenuItemsCommand;
use FluxIliasApi\Channel\Proxy\Command\HandleIliasGotoCommand;
use FluxIliasApi\Channel\Proxy\Command\HandleIliasRedirectCommand;
use FluxIliasApi\Channel\ProxyConfig\Port\ProxyConfigService;
use FluxIliasApi\Libs\FluxRestApi\Adapter\Api\RestApi;
use ilGlobalTemplateInterface;
use ILIAS\DI\Container;
use ILIAS\GlobalScreen\Identification\IdentificationProviderInterface;

class ProxyService
{

    private ConfigFormService $config_form_service;
    private Container $ilias_dic;
    private ProxyConfigService $proxy_config_service;
    private RestApi $rest_api;


    private function __construct(
        /*private readonly*/ RestApi $rest_api,
        /*private readonly*/ ConfigFormService $config_form_service,
        /*private readonly*/ ProxyConfigService $proxy_config_service,
        /*private readonly*/ Container $ilias_dic
    ) {
        $this->rest_api = $rest_api;
        $this->config_form_service = $config_form_service;
        $this->proxy_config_service = $proxy_config_service;
        $this->ilias_dic = $ilias_dic;
    }


    public static function new(
        RestApi $rest_api,
        ConfigFormService $config_form_service,
        ProxyConfigService $proxy_config_service,
        Container $ilias_dic
    ) : /*static*/ self
    {
        return new static(
            $rest_api,
            $config_form_service,
            $proxy_config_service,
            $ilias_dic
        );
    }


    public function getWebProxy(
        ilGlobalTemplateInterface $ilias_global_template,
        string $title,
        string $url,
        ?string $route = null,
        ?array $query_params = null,
        ?string $original_route = null
    ) : string {
        return GetWebProxyCommand::new(
            $ilias_global_template
        )
            ->getWebProxy(
                $title,
                $url,
                $route,
                $query_params,
                $original_route
            );
    }


    public function getWebProxyMenuItems(IdentificationProviderInterface $if, ?UserDto $user) : array
    {
        return GetWebProxyMenuItemsCommand::new(
            $this->proxy_config_service,
            $this->ilias_dic
        )
            ->getWebProxyMenuItems(
                $if,
                $user
            );
    }


    public function handleIliasGoto(ilGlobalTemplateInterface $ilias_global_template, ?UserDto $user) : void
    {
        HandleIliasGotoCommand::new(
            $this,
            $this->proxy_config_service,
            $this->rest_api,
            $this->config_form_service,
            $ilias_global_template
        )
            ->handleIliasGoto(
                $user
            );
    }


    public function handleIliasRedirect(string $url) : ?string
    {
        return HandleIliasRedirectCommand::new(
            $this->rest_api
        )
            ->handleIliasRedirect(
                $url
            );
    }
}
