<?php

namespace FluxIliasApi\Service\OrganisationalUnit\Command;

use FluxIliasApi\Libs\FluxIliasBaseApi\Adapter\OrganisationalUnit\OrganisationalUnitDto;
use FluxIliasApi\Service\OrganisationalUnit\Port\OrganisationalUnitService;
use ilObjOrgUnit;

class GetOrganisationalUnitRootCommand
{

    private function __construct(
        private readonly OrganisationalUnitService $organisational_unit_service
    ) {

    }


    public static function new(
        OrganisationalUnitService $organisational_unit_service
    ) : static {
        return new static(
            $organisational_unit_service
        );
    }


    public function getOrganisationalUnitRoot() : ?OrganisationalUnitDto
    {
        return $this->organisational_unit_service->getOrganisationalUnitByRefId(
            ilObjOrgUnit::getRootOrgRefId()
        );
    }
}
