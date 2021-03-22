<?php

namespace App\Service;

use App\Service\TreeParser;

class Correlate
{
    private TreeParser $treeParser;
    private TreeFileHandler $treeFileHandler;

    public function __construct(TreeParser $treeParser, TreeFileHandler $treeFileHandler)
    {
        $this->treeParser = $treeParser;     
        $this->treeFileHandler = $treeFileHandler;
    }

    public function correlate(?string $fileName = null): array
    {
        $listHashMap = $this->getListToHashMap();
        $leafs = $this->treeParser->getTreeLeafs($this->treeFileHandler->getTree($fileName));
    
        foreach($leafs as $key => $leaf) {
            if (isset($listHashMap[$leaf['id']])) {
                $leafs[$key]['name'] = $listHashMap[$leaf['id']];
            } else {
                unset($leafs[$key]);
            }
        }
        
        return array_values($leafs);
    }

    public function getListToHashMap(): array
    {
        $result = [];
        foreach ($this->treeFileHandler->getList() as $category) {
            $result[$category['category_id']] = $category['translations']['pl_PL']['name'];
        }
        return $result;
    }
}
