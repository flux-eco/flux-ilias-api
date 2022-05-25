<?php

namespace FluxIliasApi\Channel\CronConfig\Command;

use FluxIliasApi\Adapter\CronConfig\ScheduleTypeCronConfig;
use FluxIliasApi\Adapter\CronConfig\Wrapper\IliasCronWrapper;
use FluxIliasApi\Channel\CronConfig\ScheduleTypeCronConfigMapping;
use ilCronJob;

class SetCronJobScheduleCommand
{

    private IliasCronWrapper $ilias_cron_wrapper;


    private function __construct(
        /*private readonly*/ IliasCronWrapper $ilias_cron_wrapper
    ) {
        $this->ilias_cron_wrapper = $ilias_cron_wrapper;
    }


    public static function new(
        IliasCronWrapper $ilias_cron_wrapper
    ) : /*static*/ self
    {
        return new static(
            $ilias_cron_wrapper
        );
    }


    public function setCronJobSchedule(ilCronJob $cron_job, ScheduleTypeCronConfig $type, ?int $interval = null) : void
    {
        $internal_type = ScheduleTypeCronConfigMapping::mapExternalToInternal($type);

        if (in_array($internal_type->value, $cron_job->getValidScheduleTypes())) {
            if (in_array($internal_type->value, $cron_job->getScheduleTypesWithValues())) {
                $interval = max(0, $interval);
            } else {
                $interval = null;
            }

            $this->ilias_cron_wrapper->updateJobSchedule($cron_job, $internal_type->value, $interval);
        }
    }
}