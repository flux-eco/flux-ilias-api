<?php

namespace FluxIliasApi\Service\ObjectConfig\Port;

use FluxIliasApi\Service\ObjectConfig\Command\DeleteObjectConfigCommand;
use FluxIliasApi\Service\ObjectConfig\Command\DeleteObjectConfigsCommand;
use FluxIliasApi\Service\ObjectConfig\Command\GetObjectConfigCommand;
use FluxIliasApi\Service\ObjectConfig\Command\SetObjectConfigCommand;
use FluxIliasApi\Service\ObjectConfig\ObjectConfigKey;
use ilDBInterface;

class ObjectConfigService
{

    private function __construct(
        private readonly ilDBInterface $ilias_database
    ) {

    }


    public static function new(
        ilDBInterface $ilias_database
    ) : static {
        return new static(
            $ilias_database
        );
    }


    public function deleteObjectConfig(int $id) : void
    {
        DeleteObjectConfigCommand::new()
            ->deleteObjectConfig(
                $id
            );
    }


    public function deleteObjectConfigs() : void
    {
        DeleteObjectConfigsCommand::new(
            $this->ilias_database
        )
            ->deleteObjectConfigs();
    }


    public function getObjectConfig(int $id, ObjectConfigKey $key) : mixed
    {
        return GetObjectConfigCommand::new()
            ->getObjectConfig(
                $id,
                $key
            );
    }


    public function setObjectConfig(int $id, ObjectConfigKey $key, mixed $value) : void
    {
        SetObjectConfigCommand::new()
            ->setObjectConfig(
                $id,
                $key,
                $value
            );
    }
}
