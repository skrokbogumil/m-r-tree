<?php

namespace App\Service;

use Exception;

class TreeFileHandler
{
    const LIST_FILE_PATH = __DIR__ . '/../../data/list.json';
    const TREE_DIR = __DIR__ . '/../../data/tree/';
    const DEFAULT_TREE_FILE_PATH = self::TREE_DIR.'example_tree.json';

    public function getList(): array
    {
        return $this->parseJsonFile($this->getListFile());
    }

    public function getTree(?string $fileName = null): array
    {
        return $this->parseJsonFile($this->getContentOfTheFile($this->getTreeFilePath($fileName)));
    }

    private function getFileIterator(string $path)
    {
        $handle = fopen($path, "r");

        while (!feof($handle)) {
            yield trim(fgets($handle));
        }

        fclose($handle);
    }

    /**
     * @throws Exception
     */
    private function getContentOfTheFile(string $path): string
    {
        $this->isFileExist($path);

        $iterator = $this->getFileIterator($path);
        $buffer = '';

        foreach ($iterator as $iteration) {
            $buffer .= $iteration;
        }
        return $buffer;
    }

    /**
     * @throws Exception
     */
    private function getListFile(): string
    {
        $this->isFileExist(self::LIST_FILE_PATH);
        return file_get_contents(self::LIST_FILE_PATH);
    }

    private function parseJsonFile(string $rawJson): array
    {
        return json_decode($rawJson, true);
    }

    private function getTreeFilePath(?string $fileName = null): string
    {
        return $fileName ? self::TREE_DIR.$fileName : self::DEFAULT_TREE_FILE_PATH;
    }

    /**
     * @throws Exception
     */
    private function isFileExist(string $filePath): bool
    {
        if (file_exists($filePath)) {
            return true;
        }
        throw new Exception(sprintf('File %s not found', $filePath));
    }
}
