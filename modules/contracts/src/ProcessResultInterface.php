<?php

namespace Yumerov\FfmpegSilenceDetectAnalyser\Contracts;

interface ProcessResultInterface
{
    public function getLongestMonologue(): float;
    public function getRanges(): array;
    public function getLongestUserMonologue(): float;
    public function getLongestCustomerMonologue(): float;
    public function getUserTalkPercentage(): float;
    public function getUser(): array;
    public function getCustomer(): array;
    public function setLongestUserMonologue(float $longestUserMonologue): void;
    public function setLongestCustomerMonologue(float $longestCustomerMonologue): void;
    public function setUserTalkPercentage(float $userTalkPercentage): void;
    public function setUser(array $user): void;
    public function setCustomer(array $customer): void;
    public function toArray(): array;
}