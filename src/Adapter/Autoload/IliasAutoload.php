<?php

namespace FluxIliasApi\Adapter\Autoload;

use Exception;
use FluxIliasApi\Libs\FluxAutoloadApi\Adapter\Autoload\ComposerAutoload;
use FluxIliasApi\Libs\FluxAutoloadApi\Adapter\Autoload\FileAutoload;
use FluxIliasApi\Libs\FluxAutoloadApi\Autoload\Autoload;

class IliasAutoload implements Autoload
{

    private function __construct(
        private readonly string $folder
    ) {

    }


    public static function new(
        string $folder
    ) : static {
        return new static(
            $folder
        );
    }


    public function autoload() : void
    {
        $folder = $this->getIliasFolder(
            $this->folder
        );

        chdir($folder);

        ComposerAutoload::new(
            $folder
        )
            ->autoload();

        FileAutoload::new(
            $folder . "/webservice/soap/include/inc.soap_functions.php"
        )
            ->autoload();
    }


    private function getIliasFolder(string $folder) : string
    {
        $pos = strpos($folder, "/Customizing/");
        if ($pos === false) {
            throw new Exception("Can't detect ILIAS folder because not in Customizing");
        }

        return substr($folder, 0, $pos);
    }
}
