<?php

namespace FluxIliasApi\Channel\ProxyConfig\Command;

use FluxIliasApi\Adapter\Proxy\ApiProxyMapDto;

class GetApiProxyMapByKeyCommand
{

    /**
     * @var ApiProxyMapDto[]
     */
    private array $api_proxy_map;


    /**
     * @param ApiProxyMapDto[] $api_proxy_map
     */
    private function __construct(
        /*private readonly*/ array $api_proxy_map
    ) {
        $this->api_proxy_map = $api_proxy_map;
    }


    /**
     * @param ApiProxyMapDto[] $api_proxy_map
     */
    public static function new(
        array $api_proxy_map
    ) : /*static*/ self
    {
        return new static(
            $api_proxy_map
        );
    }


    public function getApiProxyMapByKey(string $key) : ?ApiProxyMapDto
    {
        foreach ($this->api_proxy_map as $api_proxy_map_dto) {
            if ($api_proxy_map_dto->target_key === $key) {
                return $api_proxy_map_dto;
            }
        }

        return null;
    }
}
