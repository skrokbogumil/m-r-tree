<?php

namespace App\Service;

class TreeParser
{
    public function getTreeLeafs(array $tree, array $leafs = []): array
    {
        foreach ($tree as $node) {
            if (isset($node['children']) && count($node['children']) === 0) {
                $leafs[] = $node;
            }

            if (is_array($node) && isset($node['children']) ) {
                $leafs = $this->getTreeLeafs($node['children'], $leafs);
            }

            if (is_array($node) && !isset($node['children'])) {
                $leafs = $this->getTreeLeafs($node, $leafs);
            }
        }

        return $leafs;
    }
}
