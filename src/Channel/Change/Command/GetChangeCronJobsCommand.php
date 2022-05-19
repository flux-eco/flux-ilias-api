<?php

namespace FluxIliasApi\Channel\Change\Command;

use FluxIliasApi\Channel\Change\Port\ChangeService;

class GetChangeCronJobsCommand
{

    private ChangeService $change_service;


    private function __construct(
        /*private readonly*/ ChangeService $change_service
    ) {
        $this->change_service = $change_service;
    }


    public static function new(
        ChangeService $change_service
    ) : /*static*/ self
    {
        return new static(
            $change_service
        );
    }


    public function getChangeCronJobs() : array
    {
        return [
            $this->change_service->getTransferChangesCronJob(),
            $this->change_service->getPurgeChangesCronJob()
        ];
    }
}
