<?php

namespace FluxIliasApi\Service\File\Command;

use FluxIliasApi\Libs\FluxIliasBaseApi\Adapter\File\FileDiffDto;
use FluxIliasApi\Libs\FluxIliasBaseApi\Adapter\File\FileDto;
use FluxIliasApi\Libs\FluxIliasBaseApi\Adapter\Object\ObjectIdDto;
use FluxIliasApi\Service\File\FileQuery;
use FluxIliasApi\Service\File\Port\FileService;

class UpdateFileCommand
{

    use FileQuery;

    private function __construct(
        private readonly FileService $file_service
    ) {

    }


    public static function new(
        FileService $file_service
    ) : static {
        return new static(
            $file_service
        );
    }


    public function updateFileById(int $id, FileDiffDto $diff) : ?ObjectIdDto
    {
        return $this->updateFile(
            $this->file_service->getFileById(
                $id,
                false
            ),
            $diff
        );
    }


    public function updateFileByImportId(string $import_id, FileDiffDto $diff) : ?ObjectIdDto
    {
        return $this->updateFile(
            $this->file_service->getFileByImportId(
                $import_id,
                false
            ),
            $diff
        );
    }


    public function updateFileByRefId(int $ref_id, FileDiffDto $diff) : ?ObjectIdDto
    {
        return $this->updateFile(
            $this->file_service->getFileByRefId(
                $ref_id,
                false
            ),
            $diff
        );
    }


    private function updateFile(?FileDto $file, FileDiffDto $diff) : ?ObjectIdDto
    {
        if ($file === null) {
            return null;
        }

        $ilias_file = $this->getIliasFile(
            $file->id,
            $file->ref_id
        );
        if ($ilias_file === null) {
            return null;
        }

        $this->mapFileDiff(
            $diff,
            $ilias_file
        );

        $ilias_file->update();

        return ObjectIdDto::new(
            $file->id,
            $diff->import_id ?? $file->import_id,
            $file->ref_id
        );
    }
}
