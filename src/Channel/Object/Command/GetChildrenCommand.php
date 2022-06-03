<?php

namespace FluxIliasApi\Channel\Object\Command;

use FluxIliasApi\Adapter\Object\ObjectDto;
use FluxIliasApi\Channel\Object\ObjectQuery;
use FluxIliasApi\Channel\Object\Port\ObjectService;
use ilDBInterface;

class GetChildrenCommand
{

    use ObjectQuery;

    private ilDBInterface $ilias_database;
    private ObjectService $object_service;


    private function __construct(
        /*private readonly*/ ObjectService $object_service,
        /*private readonly*/ ilDBInterface $ilias_database
    ) {
        $this->object_service = $object_service;
        $this->ilias_database = $ilias_database;
    }


    public static function new(
        ObjectService $object_service,
        ilDBInterface $ilias_database
    ) : /*static*/ self
    {
        return new static(
            $object_service,
            $ilias_database
        );
    }


    /**
     * @return ObjectDto[]|null
     */
    public function getChildrenById(int $id, bool $ref_ids = false, ?bool $in_trash = null) : ?array
    {
        $object = $this->object_service->getObjectById(
            $id,
            $in_trash
        );
        if ($object === null) {
            return null;
        }

        return $this->getChildren(
            $object->getId(),
            null,
            null,
            $ref_ids,
            $in_trash
        );
    }


    /**
     * @return ObjectDto[]|null
     */
    public function getChildrenByImportId(string $import_id, bool $ref_ids = false, ?bool $in_trash = null) : ?array
    {
        $object = $this->object_service->getObjectByImportId(
            $import_id,
            $in_trash
        );
        if ($object === null) {
            return null;
        }

        return $this->getChildren(
            null,
            $object->getImportId(),
            null,
            $ref_ids,
            $in_trash
        );
    }


    /**
     * @return ObjectDto[]|null
     */
    public function getChildrenByRefId(int $ref_id, bool $ref_ids = false, ?bool $in_trash = null) : ?array
    {
        $object = $this->object_service->getObjectByRefId(
            $ref_id,
            $in_trash
        );
        if ($object === null) {
            return null;
        }

        return $this->getChildren(
            null,
            null,
            $object->getRefId(),
            $ref_ids,
            $in_trash
        );
    }


    /**
     * @return ObjectDto[]
     */
    private function getChildren(?int $id = null, ?string $import_id = null, ?int $ref_id = null, bool $ref_ids = false, ?bool $in_trash = null) : array
    {
        $objects = $this->ilias_database->fetchAll($this->ilias_database->query($this->getObjectChildrenQuery(
            $id,
            $import_id,
            $ref_id,
            $in_trash
        )));
        $object_ids = array_map(fn(array $object) : int => $object["obj_id"], $objects);

        $ref_ids_ = $ref_ids ? $this->ilias_database->fetchAll($this->ilias_database->query($this->getObjectRefIdsQuery($object_ids))) : null;

        return array_map(fn(array $object) : ObjectDto => $this->mapObjectDto(
            $object,
            $ref_ids_
        ), $objects);
    }
}
