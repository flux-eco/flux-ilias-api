<?php

namespace FluxIliasApi\Service\Category\Command;

use FluxIliasApi\Libs\FluxIliasBaseApi\Adapter\Category\CategoryDiffDto;
use FluxIliasApi\Libs\FluxIliasBaseApi\Adapter\Category\CategoryDto;
use FluxIliasApi\Libs\FluxIliasBaseApi\Adapter\Object\ObjectIdDto;
use FluxIliasApi\Service\Category\CategoryQuery;
use FluxIliasApi\Service\Category\Port\CategoryService;
use FluxIliasApi\Service\CustomMetadata\CustomMetadataQuery;
use ilDBInterface;

class UpdateCategoryCommand
{

    use CategoryQuery;
    use CustomMetadataQuery;

    private function __construct(
        private readonly CategoryService $category_service,
        private readonly ilDBInterface $ilias_database
    ) {

    }


    public static function new(
        CategoryService $category_service,
        ilDBInterface $ilias_database
    ) : static {
        return new static(
            $category_service,
            $ilias_database
        );
    }


    public function updateCategoryById(int $id, CategoryDiffDto $diff) : ?ObjectIdDto
    {
        return $this->updateCategory(
            $this->category_service->getCategoryById(
                $id,
                false
            ),
            $diff
        );
    }


    public function updateCategoryByImportId(string $import_id, CategoryDiffDto $diff) : ?ObjectIdDto
    {
        return $this->updateCategory(
            $this->category_service->getCategoryByImportId(
                $import_id,
                false
            ),
            $diff
        );
    }


    public function updateCategoryByRefId(int $ref_id, CategoryDiffDto $diff) : ?ObjectIdDto
    {
        return $this->updateCategory(
            $this->category_service->getCategoryByRefId(
                $ref_id,
                false
            ),
            $diff
        );
    }


    private function updateCategory(?CategoryDto $category, CategoryDiffDto $diff) : ?ObjectIdDto
    {
        if ($category === null) {
            return null;
        }

        $ilias_category = $this->getIliasCategory(
            $category->id,
            $category->ref_id
        );
        if ($ilias_category === null) {
            return null;
        }

        $this->mapCategoryDiff(
            $diff,
            $ilias_category
        );

        $ilias_category->update();

        return ObjectIdDto::new(
            $category->id,
            $diff->import_id ?? $category->import_id,
            $category->ref_id
        );
    }
}
