<?php

namespace FluxIliasApi\Service\CourseMember\Port;

use FluxIliasApi\Adapter\CourseMember\CourseMemberDiffDto;
use FluxIliasApi\Adapter\CourseMember\CourseMemberDto;
use FluxIliasApi\Adapter\CourseMember\CourseMemberIdDto;
use FluxIliasApi\Adapter\ObjectLearningProgress\LegacyObjectLearningProgress;
use FluxIliasApi\Service\Course\Port\CourseService;
use FluxIliasApi\Service\CourseMember\Command\AddCourseMemberCommand;
use FluxIliasApi\Service\CourseMember\Command\GetCourseMembersCommand;
use FluxIliasApi\Service\CourseMember\Command\RemoveCourseMemberCommand;
use FluxIliasApi\Service\CourseMember\Command\UpdateCourseMemberCommand;
use FluxIliasApi\Service\User\Port\UserService;
use ilDBInterface;

class CourseMemberService
{

    private CourseService $course_service;
    private ilDBInterface $ilias_database;
    private UserService $user_service;


    private function __construct(
        /*private readonly*/ ilDBInterface $ilias_database,
        /*private readonly*/ CourseService $course_service,
        /*private readonly*/ UserService $user_service
    ) {
        $this->ilias_database = $ilias_database;
        $this->course_service = $course_service;
        $this->user_service = $user_service;
    }


    public static function new(
        ilDBInterface $ilias_database,
        CourseService $course_service,
        UserService $user_service
    ) : static {
        return new static(
            $ilias_database,
            $course_service,
            $user_service
        );
    }


    public function addCourseMemberByIdByUserId(int $id, int $user_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return AddCourseMemberCommand::new(
            $this->course_service,
            $this->user_service
        )
            ->addCourseMemberByIdByUserId(
                $id,
                $user_id,
                $diff
            );
    }


    public function addCourseMemberByIdByUserImportId(int $id, string $user_import_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return AddCourseMemberCommand::new(
            $this->course_service,
            $this->user_service
        )
            ->addCourseMemberByIdByUserImportId(
                $id,
                $user_import_id,
                $diff
            );
    }


    public function addCourseMemberByImportIdByUserId(string $import_id, int $user_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return AddCourseMemberCommand::new(
            $this->course_service,
            $this->user_service
        )
            ->addCourseMemberByImportIdByUserId(
                $import_id,
                $user_id,
                $diff
            );
    }


    public function addCourseMemberByImportIdByUserImportId(string $import_id, string $user_import_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return AddCourseMemberCommand::new(
            $this->course_service,
            $this->user_service
        )
            ->addCourseMemberByImportIdByUserImportId(
                $import_id,
                $user_import_id,
                $diff
            );
    }


    public function addCourseMemberByRefIdByUserId(int $ref_id, int $user_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return AddCourseMemberCommand::new(
            $this->course_service,
            $this->user_service
        )
            ->addCourseMemberByRefIdByUserId(
                $ref_id,
                $user_id,
                $diff
            );
    }


    public function addCourseMemberByRefIdByUserImportId(int $ref_id, string $user_import_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return AddCourseMemberCommand::new(
            $this->course_service,
            $this->user_service
        )
            ->addCourseMemberByRefIdByUserImportId(
                $ref_id,
                $user_import_id,
                $diff
            );
    }


    /**
     * @return CourseMemberDto[]
     */
    public function getCourseMembers(
        ?int $course_id = null,
        ?string $course_import_id = null,
        ?int $course_ref_id = null,
        ?int $user_id = null,
        ?string $user_import_id = null,
        ?bool $member_role = null,
        ?bool $tutor_role = null,
        ?bool $administrator_role = null,
        ?LegacyObjectLearningProgress $learning_progress = null,
        ?bool $passed = null,
        ?bool $access_refused = null,
        ?bool $tutorial_support = null,
        ?bool $notification = null
    ) : array {
        return GetCourseMembersCommand::new(
            $this->ilias_database
        )
            ->getCourseMembers(
                $course_id,
                $course_import_id,
                $course_ref_id,
                $user_id,
                $user_import_id,
                $member_role,
                $tutor_role,
                $administrator_role,
                $learning_progress,
                $passed,
                $access_refused,
                $tutorial_support,
                $notification
            );
    }


    public function removeCourseMemberByIdByUserId(int $id, int $user_id) : ?CourseMemberIdDto
    {
        return RemoveCourseMemberCommand::new(
            $this->course_service,
            $this->user_service
        )
            ->removeCourseMemberByIdByUserId(
                $id,
                $user_id
            );
    }


    public function removeCourseMemberByIdByUserImportId(int $id, string $user_import_id) : ?CourseMemberIdDto
    {
        return RemoveCourseMemberCommand::new(
            $this->course_service,
            $this->user_service
        )
            ->removeCourseMemberByIdByUserImportId(
                $id,
                $user_import_id
            );
    }


    public function removeCourseMemberByImportIdByUserId(string $import_id, int $user_id) : ?CourseMemberIdDto
    {
        return RemoveCourseMemberCommand::new(
            $this->course_service,
            $this->user_service
        )
            ->removeCourseMemberByImportIdByUserId(
                $import_id,
                $user_id
            );
    }


    public function removeCourseMemberByImportIdByUserImportId(string $import_id, string $user_import_id) : ?CourseMemberIdDto
    {
        return RemoveCourseMemberCommand::new(
            $this->course_service,
            $this->user_service
        )
            ->removeCourseMemberByImportIdByUserImportId(
                $import_id,
                $user_import_id
            );
    }


    public function removeCourseMemberByRefIdByUserId(int $ref_id, int $user_id) : ?CourseMemberIdDto
    {
        return RemoveCourseMemberCommand::new(
            $this->course_service,
            $this->user_service
        )
            ->removeCourseMemberByRefIdByUserId(
                $ref_id,
                $user_id
            );
    }


    public function removeCourseMemberByRefIdByUserImportId(int $ref_id, string $user_import_id) : ?CourseMemberIdDto
    {
        return RemoveCourseMemberCommand::new(
            $this->course_service,
            $this->user_service
        )
            ->removeCourseMemberByRefIdByUserImportId(
                $ref_id,
                $user_import_id
            );
    }


    public function updateCourseMemberByIdByUserId(int $id, int $user_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return UpdateCourseMemberCommand::new(
            $this->course_service,
            $this->user_service
        )
            ->updateCourseMemberByIdByUserId(
                $id,
                $user_id,
                $diff
            );
    }


    public function updateCourseMemberByIdByUserImportId(int $id, string $user_import_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return UpdateCourseMemberCommand::new(
            $this->course_service,
            $this->user_service
        )
            ->updateCourseMemberByIdByUserImportId(
                $id,
                $user_import_id,
                $diff
            );
    }


    public function updateCourseMemberByImportIdByUserId(string $import_id, int $user_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return UpdateCourseMemberCommand::new(
            $this->course_service,
            $this->user_service
        )
            ->updateCourseMemberByImportIdByUserId(
                $import_id,
                $user_id,
                $diff
            );
    }


    public function updateCourseMemberByImportIdByUserImportId(string $import_id, string $user_import_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return UpdateCourseMemberCommand::new(
            $this->course_service,
            $this->user_service
        )
            ->updateCourseMemberByImportIdByUserImportId(
                $import_id,
                $user_import_id,
                $diff
            );
    }


    public function updateCourseMemberByRefIdByUserId(int $ref_id, int $user_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return UpdateCourseMemberCommand::new(
            $this->course_service,
            $this->user_service
        )
            ->updateCourseMemberByRefIdByUserId(
                $ref_id,
                $user_id,
                $diff
            );
    }


    public function updateCourseMemberByRefIdByUserImportId(int $ref_id, string $user_import_id, CourseMemberDiffDto $diff) : ?CourseMemberIdDto
    {
        return UpdateCourseMemberCommand::new(
            $this->course_service,
            $this->user_service
        )
            ->updateCourseMemberByRefIdByUserImportId(
                $ref_id,
                $user_import_id,
                $diff
            );
    }
}
