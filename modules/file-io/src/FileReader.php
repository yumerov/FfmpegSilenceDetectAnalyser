<?php

namespace Yumerov\FfmpegSilenceDetectAnalyser\FileIO\Tests;

use SebastianBergmann\CodeCoverage\ParserException;
use SplFileObject;
use Yumerov\FfmpegSilenceDetectAnalyser\Contracts\DataBagInterface;
use Yumerov\FfmpegSilenceDetectAnalyser\Contracts\LineParserInterface;
use Yumerov\FfmpegSilenceDetectAnalyser\Contracts\ReaderInterface;
use Yumerov\FfmpegSilenceDetectAnalyser\Contracts\ReadResultInterface;

class FileReader implements ReaderInterface
{
    private string $rootPath;
    private string $inputDirectory;
    private LineParserInterface $lineParser;

    public function __construct(
        string $rootPath,
        string $env,
        LineParserInterface $lineParser
    ) {
        $this->rootPath = $rootPath;
        $this->lineParser = $lineParser;
        $ds = DIRECTORY_SEPARATOR;
        $this->inputDirectory = $this->rootPath . $ds . 'data' . $ds . $env . $ds . 'input' . $ds;
    }

    /**
     * @throws ParserException
     */
    public function read(): ReadResultInterface
    {
        return new ReadResult(
            $this->process('customer-channel.log'),
            $this->process('user-channel.log')
        );
    }

    /**
     * @throws ParserException
     */
    public function process(string $name): DataBagInterface
    {
        $file = new SplFileObject($this->inputDirectory . $name);
        $bag = new DataBag();

        while (!$file->eof()) {
            $line = trim($file->fgets());

            if (empty($line)) {
                continue;
            }

            $bag->add($this->lineParser->parse($line));
        }

        return $bag;
    }
}