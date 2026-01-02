<?php

class FileBoardRepository
{
    private string $filePath;

    public function __construct()
    {
        $env = getenv('APP_ENV') ?: 'production';

        if ($env === 'testing') {
            $this->filePath = __DIR__ . '/../../storage/testing/data.txt';
        } else {
            $this->filePath = __DIR__ . '/../../storage/production/data.txt';
        }

        $dir = dirname($this->filePath);
        if (!is_dir($dir)) {
            mkdir($dir, 0775, true);
        }
    }

    public function all(): array
    {
        if (!file_exists($this->filePath)) {
            return [];
        }

        return file($this->filePath, FILE_IGNORE_NEW_LINES);
    }

    public function add(string $text): bool
    {
        return file_put_contents(
            $this->filePath,
            $text . PHP_EOL,
            FILE_APPEND
        ) !== false;
    }

    public function delete(int $index): bool
    {
        $lines = $this->all();

        if (!isset($lines[$index])) {
            return false;
        }

        unset($lines[$index]);

        return file_put_contents(
            $this->filePath,
            implode(PHP_EOL, $lines) . PHP_EOL
        ) !== false;
    }
}
