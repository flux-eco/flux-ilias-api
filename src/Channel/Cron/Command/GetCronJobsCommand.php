<?php

namespace FluxIliasApi\Channel\Cron\Command;

use FluxIliasApi\Channel\Change\Port\ChangeService;
use ilCronJob;

class GetCronJobsCommand
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


    /**
     * @return ilCronJob[]
     */
    public function getCronJobs() : array
    {
        return $this->change_service->getChangeCronJobs();
    }
}
