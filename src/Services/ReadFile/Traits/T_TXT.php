<?php

namespace Lfo19\App\Services\ReadFile\Traits;

trait T_TXT {

    function rows($delimiter = ';', int $size = 4096): array{

        $handle = fopen($this->getPath().$this->getFileName(), 'r');

        $data = [];

        while (($row = fgets($handle, $size)) !== false) {
            $data[] = !is_null($delimiter) ? explode($delimiter, $row) : $row;
        }

        fclose($handle);

        return $data;
    }

}