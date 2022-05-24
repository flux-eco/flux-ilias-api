<?php

namespace FluxIliasApi\Channel\CronConfig\Command;

use FluxIliasApi\Adapter\CronConfig\ScheduleTypeCronConfig;
use FluxIliasApi\Adapter\CronConfig\Wrapper\IliasCronWrapper;
use FluxIliasApi\Channel\CronConfig\CustomInternalScheduleTypeCronConfig;
use FluxIliasApi\Channel\CronConfig\ScheduleTypeCronConfigMapping;
use ilCronJob;

class GetCronJobScheduleCommand
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


    public function getCronJobSchedule(ilCronJob $cron_job) : object
    {
        $data = $this->ilias_cron_wrapper->getCronJobData($cron_job->getId());

        if (!empty($data)) {
            $data = current($data);
        } else {
            $data = [
                "schedule_type"  => $cron_job->getDefaultScheduleType(),
                "schedule_value" => $cron_job->getDefaultScheduleValue()
            ];
        }

        $internal_type = CustomInternalScheduleTypeCronConfig::factory(
            $data["schedule_type"]
        );

        if (in_array($internal_type->value, $cron_job->getScheduleTypesWithValues())) {
            $interval = intval($data["schedule_value"]);
        } else {
            $interval = null;
        }

        return (object) [
            "type"           => ScheduleTypeCronConfigMapping::mapInternalToExternal($internal_type),
            "interval"       => $interval,
            "types"          => array_map(fn(int $type) : ScheduleTypeCronConfig => ScheduleTypeCronConfigMapping::mapInternalToExternal(CustomInternalScheduleTypeCronConfig::factory(
                $type
            )),
                $cron_job->getValidScheduleTypes()),
            "interval_types" => array_map(fn(int $type) : ScheduleTypeCronConfig => ScheduleTypeCronConfigMapping::mapInternalToExternal(CustomInternalScheduleTypeCronConfig::factory(
                $type
            )),
                $cron_job->getScheduleTypesWithValues())

        ];
    }
}
