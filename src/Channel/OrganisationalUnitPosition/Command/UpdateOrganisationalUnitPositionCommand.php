<?php

namespace FluxIliasApi\Channel\OrganisationalUnitPosition\Command;

use FluxIliasApi\Adapter\OrganisationalUnitPosition\OrganisationalUnitPositionDiffDto;
use FluxIliasApi\Adapter\OrganisationalUnitPosition\OrganisationalUnitPositionDto;
use FluxIliasApi\Adapter\OrganisationalUnitPosition\OrganisationalUnitPositionIdDto;
use FluxIliasApi\Channel\OrganisationalUnitPosition\OrganisationalUnitPositionQuery;
use FluxIliasApi\Channel\OrganisationalUnitPosition\Port\OrganisationalUnitPositionService;

class UpdateOrganisationalUnitPositionCommand
{

    use OrganisationalUnitPositionQuery;

    private OrganisationalUnitPositionService $organisational_unit_position_service;


    private function __construct(
        /*private readonly*/ OrganisationalUnitPositionService $organisational_unit_position_service
    ) {
        $this->organisational_unit_position_service = $organisational_unit_position_service;
    }


    public static function new(
        OrganisationalUnitPositionService $organisational_unit_position_service
    ) : /*static*/ self
    {
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
            $organisational_unit_position->getId()
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
            $organisational_unit_position->getId()
        );
    }
}
