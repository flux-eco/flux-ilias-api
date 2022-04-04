<?php

namespace FluxIliasApi\Adapter\ObjectLearningProgress;

use JsonSerializable;

class ObjectLearningProgressDto implements JsonSerializable
{

    private ?LegacyObjectLearningProgress $learning_progress;
    private ?int $object_id;
    private ?string $object_import_id;
    private ?int $object_ref_id;
    private ?int $user_id;
    private ?string $user_import_id;


    private function __construct(
        /*public readonly*/ ?int $object_id,
        /*public readonly*/ ?string $object_import_id,
        /*public readonly*/ ?int $object_ref_id,
        /*public readonly*/ ?int $user_id,
        /*public readonly*/ ?string $user_import_id,
        /*public readonly*/ ?LegacyObjectLearningProgress $learning_progress
    ) {
        $this->object_id = $object_id;
        $this->object_import_id = $object_import_id;
        $this->object_ref_id = $object_ref_id;
        $this->user_id = $user_id;
        $this->user_import_id = $user_import_id;
        $this->learning_progress = $learning_progress;
    }


    public static function new(
        ?int $object_id = null,
        ?string $object_import_id = null,
        ?int $object_ref_id = null,
        ?int $user_id = null,
        ?string $user_import_id = null,
        ?LegacyObjectLearningProgress $learning_progress = null
    ) : /*static*/ self
    {
        return new static(
            $object_id,
            $object_import_id,
            $object_ref_id,
            $user_id,
            $user_import_id,
            $learning_progress
        );
    }


    public function getLearningProgress() : ?LegacyObjectLearningProgress
    {
        return $this->learning_progress;
    }


    public function getObjectId() : ?int
    {
        return $this->object_id;
    }


    public function getObjectImportId() : ?string
    {
        return $this->object_import_id;
    }


    public function getObjectRefId() : ?int
    {
        return $this->object_ref_id;
    }


    public function getUserId() : ?int
    {
        return $this->user_id;
    }


    public function getUserImportId() : ?string
    {
        return $this->user_import_id;
    }


    public function jsonSerialize() : array
    {
        return get_object_vars($this);
    }
}
