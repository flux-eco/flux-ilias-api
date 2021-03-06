<?php

namespace FluxIliasApi\Service\OrganisationalUnitPosition\Command;

use FluxIliasApi\Libs\FluxIliasBaseApi\Adapter\OrganisationalUnitPosition\OrganisationalUnitPositionDiffDto;
use FluxIliasApi\Libs\FluxIliasBaseApi\Adapter\OrganisationalUnitPosition\OrganisationalUnitPositionIdDto;
use FluxIliasApi\Service\OrganisationalUnitPosition\OrganisationalUnitPositionQuery;

class CreateOrganisationalUnitPositionCommand
{

    use OrganisationalUnitPositionQuery;

    private function __construct()
    {

    }


    public static function new() : static
    {
        return new static();
    }


    public function createOrganisationalUnitPosition(OrganisationalUnitPositionDiffDto $diff) : OrganisationalUnitPositionIdDto
    {
        $ilias_organisational_unit_position = $this->newIliasOrganisationalUnitPosition();

        $this->mapOrganisationalUnitPositionDiff(
            $diff,
            $ilias_organisational_unit_position
        );

        $ilias_organisational_unit_position->store();

        return OrganisationalUnitPositionIdDto::new(
            $ilias_organisational_unit_position->getId() ?: null
        );
    }
}
