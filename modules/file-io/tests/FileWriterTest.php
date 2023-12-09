<?php

namespace Yumerov\FfmpegSilenceDetectAnalyser\FileIO\Tests;

use PHPUnit\Framework\TestCase;
use Yumerov\FfmpegSilenceDetectAnalyser\Contracts\ProcessResultInterface;
use Yumerov\FfmpegSilenceDetectAnalyser\FileIO\FileWriter;

class FileWriterTest extends TestCase
{
    private string $outputPath = __DIR__ . DIRECTORY_SEPARATOR . 'result.json';

    protected function tearDown(): void
    {
        parent::tearDown();

        unlink($this->outputPath);
    }

    /**
     * @test
     */
    public function write(): void
    {
        // Arrange
        $data = $this->getProcessResultInstance();

        // Act
        (new FileWriter($this->outputPath))->write($data);

        // Assert
        $this->assertEquals(
            json_encode($data->toArray()),
            file_get_contents($this->outputPath)
        );
    }

    private function getProcessResultInstance(): ProcessResultInterface
    {
        return new class implements ProcessResultInterface {
            public function getLongestMonologue(): float
            {
                return 0;
            }

            public function getRanges(): array
            {
                return [];
            }

            public function getLongestUserMonologue(): float
            {
                return 0;
            }

            public function getLongestCustomerMonologue(): float
            {
                return 0;
            }

            public function getUserTalkPercentage(): float
            {
                return 0;
            }

            public function getUser(): array
            {
                return [];
            }

            public function getCustomer(): array
            {
                return [];
            }

            public function setLongestUserMonologue(float $longestUserMonologue): void
            {
            }

            public function setLongestCustomerMonologue(float $longestCustomerMonologue): void
            {
            }

            public function setUserTalkPercentage(float $userTalkPercentage): void
            {
            }

            public function setUser(array $user): void
            {
            }

            public function setCustomer(array $customer): void
            {
            }

            public function toArray(): array
            {
                return ['test' => 'success'];
            }
        };
    }
}
