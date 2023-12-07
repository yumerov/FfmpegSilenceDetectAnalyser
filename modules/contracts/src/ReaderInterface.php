<?php

namespace Yumerov\FfmpegSilenceDetectAnalyser\Contracts;

interface ReaderInterface
{
    public function read(): ReadResultInterface;
    public function process(string $name): DataBagInterface;
}