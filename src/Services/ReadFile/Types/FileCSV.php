<?php

namespace Lfo19\App\Services\ReadFile\Types;

use Lfo19\App\Services\ReadFile\Interfaces\I_ReadFile;
use Lfo19\App\Services\ReadFile\Traits\T_CSV;

class FileCSV implements I_ReadFile
{

    use T_CSV;

    private string $fileName;
    private string $path = DATA_FILE_PATH;
    public array $data;

    public function setFileName(string $fileName): void
    {
        $this->fileName = $fileName;
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function validation(){
        /**
         * @todo aplicar validação para que os testes unitários voltem a funcionar
         */
    }

    public function read(): array
    {

        try {

            $output = array_map(function ($row) {

                list($nome, $cpf, $email) = $row;

                return [
                    'nome' => $nome,
                    'cpf' => $cpf,
                    'email' => $email,
                ];
            }, $this->rows());

            return response(true, $output, null);
        } catch (\Exception $e) {

            return response(false, [], $e->getMessage());
        }
    }
}
