<?php

namespace Yumerov\FfmpegSilenceDetectAnalyser\Contracts;

interface LineParserInterface
{
    public function parse(string $line): ParseResultInterface;
}