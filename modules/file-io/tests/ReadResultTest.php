<?php

namespace Yumerov\FfmpegSilenceDetectAnalyser\FileIO\Tests;

use PHPUnit\Framework\TestCase;
use Yumerov\FfmpegSilenceDetectAnalyser\Contracts\DataBagInterface;
use Yumerov\FfmpegSilenceDetectAnalyser\Contracts\ParseResultInterface;
use Yumerov\FfmpegSilenceDetectAnalyser\FileIO\ReadResult;

class ReadResultTest extends TestCase
{

    /**
     * @test
     */
    public function construct(): void
    {
        // Arrange
        $customer = new class implements DataBagInterface {
            public function add(ParseResultInterface $item): void
            {
            }

            public function getData(): array
            {
                return [];
            }
        };
        $user = new class implements DataBagInterface {
            public function add(ParseResultInterface $item): void
            {
            }

            public function getData(): array
            {
                return [];
            }
        };
        // Act
        $result = new ReadResult($customer, $user);

        // Assert
        $this->assertEquals(
            spl_object_hash($customer),
            spl_object_hash($result->getCustomerChannel()),
        );
        $this->assertEquals(
            spl_object_hash($user),
            spl_object_hash($result->getUserChannel()),
        );
    }
}