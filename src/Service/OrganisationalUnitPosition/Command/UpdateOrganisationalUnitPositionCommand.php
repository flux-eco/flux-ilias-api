<?php

namespace FluxIliasApi\Service\OrganisationalUnitPosition\Command;

use FluxIliasApi\Libs\FluxIliasBaseApi\Adapter\OrganisationalUnitPosition\OrganisationalUnitPositionDiffDto;
use FluxIliasApi\Libs\FluxIliasBaseApi\Adapter\OrganisationalUnitPosition\OrganisationalUnitPositionDto;
use FluxIliasApi\Libs\FluxIliasBaseApi\Adapter\OrganisationalUnitPosition\OrganisationalUnitPositionIdDto;
use FluxIliasApi\Service\OrganisationalUnitPosition\OrganisationalUnitPositionQuery;
use FluxIliasApi\Service\OrganisationalUnitPosition\Port\OrganisationalUnitPositionService;

class UpdateOrganisationalUnitPositionCommand
{

    use OrganisationalUnitPositionQuery;

    private function __construct(
        private readonly OrganisationalUnitPositionService $organisational_unit_position_service
    ) {

    }


    public static function new(
        OrganisationalUnitPositionService $organisational_unit_position_service
    ) : static {
        return new static(
            $organisational_unit_position_service
        );
    }


    public function updateOrganisationalUnitPositionById(int $id, OrganisationalUnitPositionDiffDto $diff) : ?OrganisationalUnitPositionIdDto
    {
        return $this->updateOrganisationalUnitPosition(
            $this->organisational_unit_position_service->getOrganisationalUnitPositionById(
                $id
            ),
            $diff
        );
    }


    private function updateOrganisationalUnitPosition(?OrganisationalUnitPositionDto $organisational_unit_position, OrganisationalUnitPositionDiffDto $diff) : ?OrganisationalUnitPositionIdDto
    {
        if ($organisational_unit_position === null) {
            return null;
        }

        $ilias_organisational_unit_position = $this->getIliasOrganisationalUnitPosition(
            $organisational_unit_position->id
        );
        if ($ilias_organisational_unit_position === null) {
            return null;
        }

        $this->mapOrganisationalUnitPositionDiff(
            $diff,
            $ilias_organisational_unit_position
        );

        $ilias_organisational_unit_position->store();

        return OrganisationalUnitPositionIdDto::new(
            $organisational_unit_position->id
        );
    }
}
