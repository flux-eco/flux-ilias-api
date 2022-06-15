<?php

namespace FluxIliasApi\Service\Object\Command;

use FluxIliasApi\Adapter\Object\ObjectDto;
use FluxIliasApi\Service\Object\Port\ObjectService;

class GetRootObjectCommand
{

    private ObjectService $object_service;


    private function __construct(
        /*private readonly*/ ObjectService $object_service
    ) {
        $this->object_service = $object_service;
    }


    public static function new(
        ObjectService $object_service
    ) : /*static*/ self
    {
        return new static(
            $object_service
        );
    }


    public function getRootObject() : ?ObjectDto
    {
        return $this->object_service->getObjectByRefId(
            ROOT_FOLDER_ID
        );
    }
}