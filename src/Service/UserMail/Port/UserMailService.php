<?php

namespace FluxIliasApi\Service\UserMail\Port;

use FluxIliasApi\Service\User\Port\UserService;
use FluxIliasApi\Service\UserMail\Command\GetUnreadMailsCount;
use ilDBInterface;

class UserMailService
{

    private function __construct(
        private readonly ilDBInterface $ilias_database,
        private readonly UserService $user_service
    ) {

    }


    public static function new(
        ilDBInterface $ilias_database,
        UserService $user_service
    ) : static {
        return new static(
            $ilias_database,
            $user_service
        );
    }


    public function getUnreadMailsCountById(int $id) : ?int
    {
        return GetUnreadMailsCount::new(
            $this->ilias_database,
            $this->user_service
        )
            ->getUnreadMailsCountById(
                $id
            );
    }


    public function getUnreadMailsCountByImportId(string $import_id) : ?int
    {
        return GetUnreadMailsCount::new(
            $this->ilias_database,
            $this->user_service
        )
            ->getUnreadMailsCountByImportId(
                $import_id
            );
    }
}
