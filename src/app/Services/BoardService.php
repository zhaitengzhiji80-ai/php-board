<?php

class BoardService{
    private string $file;

    public function __construct(string $file = null) {
        $this->file = $file ?? __DIR__ . '/../../storage/data.txt';
    }

    public function all(): array {
        return file_exists($this -> file) 
            ? file($this->file, FILE_IGNORE_NEW_LINES)
            : [];
    }

    public function add(string $text): void {
        file_put_contents($this->file, $text . PHP_EOL, FILE_APPEND);
    }

    public function delete(int $index): void {
        $lines = $this -> all();
        if (isset($lines[$index])) {
            unset($lines[$index]);
            file_put_contents($this->file, implode(PHP_EOL, $lines) . PHP_EOL);
        }
    }
}
