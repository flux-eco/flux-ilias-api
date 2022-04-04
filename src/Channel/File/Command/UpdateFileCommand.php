<?php

namespace FluxIliasApi\Channel\File\Command;

use FluxIliasApi\Adapter\File\FileDiffDto;
use FluxIliasApi\Adapter\File\FileDto;
use FluxIliasApi\Adapter\Object\ObjectIdDto;
use FluxIliasApi\Channel\File\FileQuery;
use FluxIliasApi\Channel\File\Port\FileService;

class UpdateFileCommand
{

    use FileQuery;

    private FileService $file_service;


    private function __construct(
        /*private readonly*/ FileService $file_service
    ) {
        $this->file_service = $file_service;
    }


    public static function new(
        FileService $file_service
    ) : /*static*/ self
    {
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
            $file->getId(),
            $file->getRefId()
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
            $file->getId(),
            $diff->getImportId() ?? $file->getImportId(),
            $file->getRefId()
        );
    }
}
