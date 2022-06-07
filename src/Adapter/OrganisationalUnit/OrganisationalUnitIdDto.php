<?php

namespace FluxIliasApi\Adapter\OrganisationalUnit;

class OrganisationalUnitIdDto
{

    public ?string $external_id;
    public ?int $id;
    public ?int $ref_id;


    private function __construct(
        /*public readonly*/ ?int $id,
        /*public readonly*/ ?string $external_id,
        /*public readonly*/ ?int $ref_id
    ) {
        $this->id = $id;
        $this->external_id = $external_id;
        $this->ref_id = $ref_id;
    }


    public static function new(
        ?int $id = null,
        ?string $external_id = null,
        ?int $ref_id = null
    ) : /*static*/ self
    {
        return new static(
            $id,
            $external_id,
            $ref_id
        );
    }
}
