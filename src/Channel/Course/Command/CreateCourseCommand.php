<?php

namespace FluxIliasApi\Channel\Course\Command;

use FluxIliasApi\Adapter\Course\CourseDiffDto;
use FluxIliasApi\Adapter\Object\ObjectDto;
use FluxIliasApi\Adapter\Object\ObjectIdDto;
use FluxIliasApi\Channel\Course\CourseQuery;
use FluxIliasApi\Channel\Object\Port\ObjectService;

class CreateCourseCommand
{

    use CourseQuery;

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


    public function createCourseToId(int $parent_id, CourseDiffDto $diff) : ?ObjectIdDto
    {
        return $this->createCourse(
            $this->object_service->getObjectById(
                $parent_id,
                false
            ),
            $diff
        );
    }


    public function createCourseToImportId(string $parent_import_id, CourseDiffDto $diff) : ?ObjectIdDto
    {
        return $this->createCourse(
            $this->object_service->getObjectByImportId(
                $parent_import_id,
                false
            ),
            $diff
        );
    }


    public function createCourseToRefId(int $parent_ref_id, CourseDiffDto $diff) : ?ObjectIdDto
    {
        return $this->createCourse(
            $this->object_service->getObjectByRefId(
                $parent_ref_id,
                false
            ),
            $diff
        );
    }


    private function createCourse(?ObjectDto $parent_object, CourseDiffDto $diff) : ?ObjectIdDto
    {
        if ($parent_object === null || $parent_object->getRefId() === null) {
            return null;
        }

        $ilias_course = $this->newIliasCourse();

        $ilias_course->setTitle($diff->getTitle() ?? "");

        $ilias_course->create();
        $ilias_course->createReference();
        $ilias_course->putInTree($parent_object->getRefId());
        $ilias_course->setPermissions($parent_object->getRefId());

        $this->mapCourseDiff(
            $diff,
            $ilias_course
        );

        $ilias_course->update();

        return ObjectIdDto::new(
            $ilias_course->getId() ?: null,
            $diff->getImportId(),
            $ilias_course->getRefId() ?: null
        );
    }
}
