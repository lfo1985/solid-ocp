<?php

use Lfo19\App\Services\ReadFile\ReadFile;
use Lfo19\App\Services\ReadFile\Types\FileCSV;
use Lfo19\App\Services\ReadFile\Types\FileTXT;
use PHPUnit\Framework\TestCase;

class ReadFileTest extends TestCase
{

    public function testLeituraArquivoTxt()
    {

        $fileTXT = new FileTXT;
        $fileTXT->setFileName('dados.txt');

        $response = (new ReadFile($fileTXT))->content();

        self::assertCount(4, $response['data']);
    }

    public function testLeituraArquivoTxtInvalido()
    {

        $fileTXT = new FileTXT;
        $fileTXT->setFileName('dados.docx');

        $response = (new ReadFile($fileTXT))->content();

        self::assertEquals(false, $response['success']);
        self::assertEquals('Extensão incorreta!', $response['error']);
    }

    public function testLeituraArquivoCsvNaoExiste()
    {

        $fileCSV = new FileCSV;
        $fileCSV->setFileName('dados_xxx_123.csv');

        $response = (new ReadFile($fileCSV))->content();

        self::assertEquals(false, $response['success']);
        self::assertEquals('Arquivo não existe!', $response['error']);
    }

    public function testLeituraArquivoCsv()
    {

        $FileCSV = new FileCSV;
        $FileCSV->setFileName('dados.csv');

        $response = (new ReadFile($FileCSV))->content();

        self::assertCount(4, $response['data']);
    }
}
