<?php

interface BoardRepositoryInterface
{
    public function all(): array;
    public function add(string $text): bool;
    public function update(int $id, string $content): bool;
    public function delete(int $index): bool;
}
