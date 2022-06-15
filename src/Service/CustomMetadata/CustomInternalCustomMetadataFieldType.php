<?php

namespace FluxIliasApi\Service\CustomMetadata;

use JsonSerializable;
use LogicException;

class CustomInternalCustomMetadataFieldType implements InternalCustomMetadataFieldType, JsonSerializable
{

    private int $_value;


    private function __construct(
        /*public readonly*/ int $value
    ) {
        $this->_value = $value;
    }


    public static function factory(int $value) : InternalCustomMetadataFieldType
    {
        return LegacyDefaultInternalCustomMetadataFieldType::tryFrom($value) ?? static::new(
                $value
            );
    }


    private static function new(
        int $value
    ) : /*static*/ self
    {
        return new static(
            $value
        );
    }


    public function __debugInfo() : ?array
    {
        return [
            "value" => $this->value
        ];
    }


    public final function __get(string $key) : int
    {
        switch ($key) {
            case "value":
                return $this->_value;

            default:
                throw new LogicException("Can't get " . $key);
        }
    }


    public final function __set(string $key, /*mixed*/ $value) : void
    {
        throw new LogicException("Can't set");
    }


    public function jsonSerialize() : int
    {
        return $this->value;
    }
}