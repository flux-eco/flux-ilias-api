<?php

namespace FluxIliasApi\Service\Change\Command;

use FluxIliasApi\Libs\FluxRestApi\Adapter\Api\RestApi;
use FluxIliasApi\Libs\FluxRestApi\Adapter\Body\JsonBodyDto;
use FluxIliasApi\Libs\FluxRestApi\Adapter\Client\ClientRequestDto;
use FluxIliasApi\Libs\FluxRestApi\Adapter\Header\DefaultHeaderKey;
use FluxIliasApi\Libs\FluxRestApi\Adapter\Method\DefaultMethod;
use FluxIliasApi\Service\Change\ChangeQuery;
use FluxIliasApi\Service\Change\Port\ChangeService;
use ilDBInterface;

class TransferChangesCommand
{

    use ChangeQuery;

    private function __construct(
        private readonly ilDBInterface $ilias_database,
        private readonly ChangeService $change_service,
        private readonly RestApi $rest_api
    ) {

    }


    public static function new(
        ilDBInterface $ilias_database,
        ChangeService $change_service,
        RestApi $rest_api
    ) : static {
        return new static(
            $ilias_database,
            $change_service,
            $rest_api
        );
    }


    public function transferChanges() : ?int
    {
        if (empty($this->change_service->getTransferChangesPostUrl())) {
            return null;
        }

        $changes = $this->change_service->getChanges(
            null,
            null,
            $this->change_service->getLastTransferredChangeTime()
        );

        $this->rest_api->makeRequest(
            ClientRequestDto::new(
                $this->change_service->getTransferChangesPostUrl(),
                DefaultMethod::POST,
                null,
                null,
                [
                    DefaultHeaderKey::USER_AGENT->value => "flux-ilias-api"
                ],
                JsonBodyDto::new(
                    $changes
                ),
                null,
                null,
                false,
                true,
                false,
                false
            )
        );

        $count = count($changes);
        if ($count > 0) {
            $this->change_service->setLastTransferredChangeTime(
                $changes[$count - 1]->time
            );
        }

        return $count;
    }
}
