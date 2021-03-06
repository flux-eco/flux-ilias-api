<?php

namespace FluxIliasApi\Service\ProxyConfig\Command;

use FluxIliasApi\Adapter\Proxy\WebProxyMapDto;
use FluxIliasApi\Service\Config\ConfigKey;
use FluxIliasApi\Service\Config\Port\ConfigService;

class SetWebProxyMapCommand
{

    private function __construct(
        private readonly ConfigService $config_service
    ) {

    }


    public static function new(
        ConfigService $config_service
    ) : static {
        return new static(
            $config_service
        );
    }


    /**
     * @param WebProxyMapDto[] $web_proxy_map
     */
    public function setWebProxyMap(array $web_proxy_map) : void
    {
        $this->config_service->setConfig(
            ConfigKey::WEB_PROXY_MAP,
            $web_proxy_map
        );
    }
}
