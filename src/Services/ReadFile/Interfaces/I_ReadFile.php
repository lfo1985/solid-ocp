<?php

namespace Lfo19\App\Services\ReadFile\Interfaces;

use Lfo19\App\Services\ReadFile\Utils\GetFileData;

interface I_ReadFile {

    public function read(): array;

    public function setFileName(string $fileName): void;

    public function setData(array $data): void;

    public function getPath(): string;

    public function getFileName(): string;

}