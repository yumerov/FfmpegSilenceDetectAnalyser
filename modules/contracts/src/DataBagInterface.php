<?php

namespace Yumerov\FfmpegSilenceDetectAnalyser\Contracts;

interface DataBagInterface
{
    public function add(ParseResultInterface $item): void;
    public function getData(): array;
}