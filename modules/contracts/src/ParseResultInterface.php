<?php

namespace Yumerov\FfmpegSilenceDetectAnalyser\Contracts;

interface ParseResultInterface
{
    public function getStart(): ?float;
    public function getEnd(): ?float;
    public function getDuration(): ?float;
}