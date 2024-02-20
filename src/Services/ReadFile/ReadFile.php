<?php

namespace Lfo19\App\Services\ReadFile;

use Lfo19\App\Services\ReadFile\Interfaces\I_ReadFile;

class ReadFile
{

    private I_ReadFile $strategy;

    function __construct(I_ReadFile $strategy)
    {
        $this->strategy = $strategy;
    }

    public function content(): array
    {
        return $this->strategy->read();
    }
}
