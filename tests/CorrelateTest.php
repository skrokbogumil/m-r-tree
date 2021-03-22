<?php

declare(strict_types=1);

namespace App\Tests;

use App\Service\Correlate;
use App\Service\TreeFileHandler;
use App\Service\TreeParser;
use PHPUnit\Framework\TestCase;

final class CorrelateTest extends TestCase
{
    /**
     * @dataProvider getCorrelateData
     */
    public function testCorrelate(array $leafs, array $expectedIds): void
    {

        $correlate = $this->createCorrelate($leafs);
        $correlations = $correlate->correlate();
        
        $this->assertIsArray($correlations);

        $this->assertCount(count($expectedIds), $correlations);
        foreach ($correlations as $correlation) {
            $this->assertTrue(in_array($correlation['id'], $expectedIds));
            $this->assertArrayHasKey('name', $correlation);
        }
    }


    private function createCorrelate(array $leafs = []): Correlate
    {
        $treeParserMock = $this->getMockBuilder(TreeParser::class)->getMock();
        $treeParserMock->method('getTreeLeafs')->willReturn($leafs);

        return new Correlate($treeParserMock, new TreeFileHandler());
    }


    public function getCorrelateData(): array
    {
        return [
            'no leafs' => [
                'leafs' => [],
                'expected' => []

            ],
            'leafs 11, 13' => [
                'leafs' =>[
                    ['id' => 11, 'children' => []],
                    ['id' => 13, 'children' => []]
                ],
                'expected' => [11,13]

            ],
            'leafs 101, 103' => [
                'leafs' => [
                    ['id' => 101, 'children' => []],
                    ['id' => 103, 'children' => []]
                ],
                'expected' => []
            ],
        ];
    }
}
