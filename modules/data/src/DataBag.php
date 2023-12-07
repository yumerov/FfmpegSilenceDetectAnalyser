<?php

namespace Yumerov\FfmpegSilenceDetectAnalyser\Data;

use Yumerov\FfmpegSilenceDetectAnalyser\Contracts\DataBagInterface;
use Yumerov\FfmpegSilenceDetectAnalyser\Contracts\ParseResultInterface;

class DataBag implements DataBagInterface
{
    private array $data = [];

    public function add(ParseResultInterface $item): void
    {
        $this->data[] = $item;
    }

    public function getData(): array
    {
        return $this->data;
    }
}