<?php

namespace FluxIliasApi\Channel\Category\Command;

use FluxIliasApi\Adapter\Category\CategoryDto;
use FluxIliasApi\Channel\Category\CategoryQuery;
use FluxIliasApi\Channel\Object\ObjectQuery;
use ilDBInterface;
use LogicException;

class GetCategoryCommand
{

    use CategoryQuery;
    use ObjectQuery;

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


    public function getCategoryById(int $id, ?bool $in_trash = null) : ?CategoryDto
    {
        $category = null;
        while (($category_ = $this->ilias_database->fetchAssoc($result ??= $this->ilias_database->query($this->getCategoryQuery(
                $id,
                null,
                null,
                $in_trash
            )))) !== null) {
            if ($category !== null) {
                throw new LogicException("Multiple categories found with the id " . $id);
            }
            $category = $this->mapCategoryDto(
                $category_
            );
        }

        return $category;
    }


    public function getCategoryByImportId(string $import_id, ?bool $in_trash = null) : ?CategoryDto
    {
        $category = null;
        while (($category_ = $this->ilias_database->fetchAssoc($result ??= $this->ilias_database->query($this->getCategoryQuery(
                null,
                $import_id,
                null,
                $in_trash
            )))) !== null) {
            if ($category !== null) {
                throw new LogicException("Multiple categories found with the import id " . $import_id);
            }
            $category = $this->mapCategoryDto(
                $category_
            );
        }

        return $category;
    }


    public function getCategoryByRefId(int $ref_id, ?bool $in_trash = null) : ?CategoryDto
    {
        $category = null;
        while (($category_ = $this->ilias_database->fetchAssoc($result ??= $this->ilias_database->query($this->getCategoryQuery(
                null,
                null,
                $ref_id,
                $in_trash
            )))) !== null) {
            if ($category !== null) {
                throw new LogicException("Multiple categories found with the ref id " . $ref_id);
            }
            $category = $this->mapCategoryDto(
                $category_
            );
        }

        return $category;
    }
}
