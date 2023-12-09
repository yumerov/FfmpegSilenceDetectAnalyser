<?php

namespace Yumerov\FfmpegSilenceDetectAnalyser\FileIO;

use SplFileObject;
use Yumerov\FfmpegSilenceDetectAnalyser\Contracts\ProcessResultInterface;
use Yumerov\FfmpegSilenceDetectAnalyser\Contracts\WriterInterface;

class FileWriter implements WriterInterface
{
    // "{$this->rootPath}{$ds}data{$ds}{$env}{$ds}output{$ds}result.json"
    public function __construct(
        private readonly string $outputPath
    ) {
    }

    public function write(ProcessResultInterface $result): void
    {
        (new SplFileObject($this->outputPath, 'w+'))
            ->fwrite(json_encode($result->toArray()));
    }
}