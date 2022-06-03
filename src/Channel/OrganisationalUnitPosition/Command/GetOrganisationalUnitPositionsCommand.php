<?php

namespace FluxIliasApi\Channel\OrganisationalUnitPosition\Command;

use FluxIliasApi\Adapter\OrganisationalUnitPosition\OrganisationalUnitPositionDto;
use FluxIliasApi\Channel\OrganisationalUnitPosition\OrganisationalUnitPositionQuery;
use ilDBInterface;

class GetOrganisationalUnitPositionsCommand
{

    use OrganisationalUnitPositionQuery;

    private ilDBInterface $ilias_database;


    private function __construct(
        /*private readonly*/ ilDBInterface $ilias_database
    ) {
        $this->ilias_database = $ilias_database;
    }


    public static function new(
        ilDBInterface $ilias_database
    ) : /*static*/ self
    {
        return new static(
            $ilias_database
        );
    }


    /**
     * @return OrganisationalUnitPositionDto[]
     */
    public function getOrganisationalUnitPositions(bool $authorities = false) : array
    {
        $organisational_unit_positions = $this->ilias_database->fetchAll($this->ilias_database->query($this->getOrganisationalUnitPositionQuery()));
        $position_ids = array_map(fn(array $position) : int => $position["id"], $organisational_unit_positions);

        $authorities_ = $authorities ? $this->ilias_database->fetchAll($this->ilias_database->query($this->getOrganisationalUnitPositionAuthorityQuery($position_ids))) : null;

        return array_map(fn(array $organisational_unit_position) : OrganisationalUnitPositionDto => $this->mapOrganisationalUnitPositionDto(
            $organisational_unit_position,
            $authorities_
        ), $organisational_unit_positions);
    }
}
