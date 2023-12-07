<?php

namespace Yumerov\FfmpegSilenceDetectAnalyser\Contracts;


interface WriterInterface
{
    public function write(ProcessResultInterface $result): void;
}