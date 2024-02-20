<?php

namespace Lfo19\App\Services\ReadFile\Utils;

class GetFileData
{

    private array $data;
    private string $extension;
    private string $dirname;
    private string $basename;
    private string $filename;

    public function getData(): array
    {
        return $this->data;
    }

    public function getExtension(): string
    {
        return $this->extension;
    }

    public function getDirName(): string
    {
        return $this->dirname;
    }

    public function getBaseName(): string
    {
        return $this->basename;
    }

    public function getFileName(): string
    {
        return $this->filename;
    }

    private function setDataFile(string $path)
    {

        $meta = pathinfo($path);

        $this->extension = $meta['extension'];
        $this->dirname = $meta['dirname'];
        $this->basename = $meta['basename'];
        $this->filename = $meta['filename'];
    }

    private function validation(string $path, string $ext)
    {

        if (!file_exists($path)) {
            throw new \Exception('Arquivo não existe!', 1);
        }

        $this->setDataFile($path);

        if ($this->getExtension() != $ext) {
            throw new \Exception('Extensão incorreta!', 2);
        }
    }

    public function txt(string $path, $delimiter = null, int $size = 4096): void
    {

        $this->validation($path, 'txt');

        $handle = fopen($path, 'r');

        while (($row = fgets($handle, $size)) !== false) {
            $this->data[] = !is_null($delimiter) ? explode($delimiter, $row) : $row;
        }

        fclose($handle);
    }

    public function csv(string $path, int $limit = 10000, string $delimiter = ';'): void
    {

        $this->validation($path, 'csv');

        $handle = fopen($path, 'r');

        while (($row = fgetcsv($handle, $limit, $delimiter)) !== false) {
            $this->data[] = $row;
        }

        fclose($handle);
    }
}
