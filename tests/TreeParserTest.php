<?php

declare(strict_types=1);
namespace App\Tests;

use App\Service\TreeParser;
use PHPUnit\Framework\TestCase;

final class TreeParserTest extends TestCase
{
    /**
     * @dataProvider getLeafsCorrelateData
     */
    public function testGetTreeLeafs(array $tree, array $expected)
    {
        $correlate = $this->createTreeParser();
        $leafs = $correlate->getTreeLeafs($tree);
        $this->assertCount(count($expected), $leafs);
        foreach ($leafs as $leaf) {
            $this->assertTrue(in_array($leaf['id'], $expected));
        }
    }

    private function createTreeParser(): TreeParser
    {
        return new TreeParser();
    }

    public function getLeafsCorrelateData(): array
    {
        return [
            'leafs 2,5,6,8,11,13' => [
                TreeGenerator::getTreeLeaf_2_5_6_8_11_13(),
                [2, 5, 6, 8, 11, 13],
            ],
            'leafs 11' => [
                TreeGenerator::getTreeLeaf_11(),
                [11]
            ],
            'no leafs only root' => [
                TreeGenerator::getTreeLeaf_Root(),
                []
            ],
            'empty structure' => [
                [],
                []
            ],
        ];
    }
}
