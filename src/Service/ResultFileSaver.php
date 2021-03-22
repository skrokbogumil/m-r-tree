<?php

namespace App\Service;

class ResultFileSaver
{
    const DEFAULT_RESULT_FILE_PATH = self::RESULT_DIR.'result.json';
    const RESULT_DIR = __DIR__ . '/../../data/result/';
    
    public function saveResult(string $result)
    {
        return file_put_contents(self::DEFAULT_RESULT_FILE_PATH, $result);
    }
}