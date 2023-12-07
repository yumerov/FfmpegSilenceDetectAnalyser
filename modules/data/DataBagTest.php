<?php

namespace Yumerov\FfmpegSilenceDetectAnalyser\Data;

use PHPUnit\Framework\TestCase;
use Yumerov\FfmpegSilenceDetectAnalyser\Contracts\ParseResultInterface;

class DataBagTest extends TestCase
{

    /**
     * @test
     */
    public function addAndGet(): void
    {
        // Arrange
        $bag = new DataBag();
        $data = [
            $this->createParseResultInstance(0, 1, 1),
            $this->createParseResultInstance(1, 3, 2),
        ];

        // Act
        $bag->add($data[0]);

        // Assert
        $this->assertCount(1, $bag->getData());
        $this->assertSameObjectHash($data[0], $bag->getData()[0]);

        // Act
        $bag->add($data[1]);

        // Assert
        $this->assertCount(2, $bag->getData());
        $this->assertSameObjectHash($data[1], $bag->getData()[1]);
    }

    private function createParseResultInstance(float $start, float $end, float $duration): ParseResultInterface
    {
        return new class($start, $end, $duration) implements ParseResultInterface
        {

            public function __construct(
                private readonly float $start,
                private readonly float $end,
                private readonly float $duration,
            )
            {
            }

            public function getStart(): ?float
            {
                return $this->start;
            }

            public function getEnd(): ?float
            {
                return $this->end;
            }

            public function getDuration(): ?float
            {
                return $this->duration;
            }
        };
    }

    private function assertSameObjectHash($expected, $actual)
    {
        $this->assertEquals(spl_object_hash($expected), spl_object_hash($actual));
    }
}
