<?php

namespace Yumerov\FfmpegSilenceDetectAnalyser\Contracts;

interface ProcessorInterface
{
    public function process(DataBagInterface $data): ProcessResultInterface;
}