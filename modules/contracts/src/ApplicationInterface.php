<?php

namespace Yumerov\FfmpegSilenceDetectAnalyser\Contracts;

interface ApplicationInterface
{
    public function registerConfigs(array $configs): static;
    public function run(string $config = null): void;
}