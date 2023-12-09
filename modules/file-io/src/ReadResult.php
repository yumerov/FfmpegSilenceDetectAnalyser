<?php

namespace Yumerov\FfmpegSilenceDetectAnalyser\FileIO;

use Yumerov\FfmpegSilenceDetectAnalyser\Contracts\DataBagInterface;
use Yumerov\FfmpegSilenceDetectAnalyser\Contracts\ReadResultInterface;

class ReadResult implements ReadResultInterface
{
    public function __construct(
        private readonly DataBagInterface $customerData,
        private readonly DataBagInterface $userData,
    )
    {
    }

    public function getCustomerChannel(): DataBagInterface
    {
        return $this->customerData;
    }

    public function getUserChannel(): DataBagInterface
    {
        return $this->userData;
    }
}