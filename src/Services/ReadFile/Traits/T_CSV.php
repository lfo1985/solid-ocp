<?php

namespace Lfo19\App\Services\ReadFile\Traits;

trait T_CSV {

    function rows(int $limit = 10000, string $delimiter = ';'): array{

        $handle = fopen($this->getPath().$this->getFileName(), 'r');

        $data = [];

        while (($row = fgetcsv($handle, $limit, $delimiter)) !== false) {
            $data[] = $row;
        }

        fclose($handle);

        return $data;
    }
}