<?php

namespace Yumerov\FfmpegSilenceDetectAnalyser\Contracts;

interface DataBagInterface
{
    public function add(ParseResult $item): void;
    public function getData(): array;
}