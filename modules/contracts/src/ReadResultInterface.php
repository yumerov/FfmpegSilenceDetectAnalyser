<?php

namespace Yumerov\FfmpegSilenceDetectAnalyser\Contracts;

interface ReadResultInterface
{
    public function getCustomerChannel(): DataBagInterface;
    public function getUserChannel(): DataBagInterface;
}