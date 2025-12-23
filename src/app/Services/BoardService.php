<?php

require_once __DIR__ . '/../Repositories/BoardRepository.php';

class BoardService
{
    private BoardRepository $repository;

    public function __construct()
    {
        $this->repository = new Boardrepository();
    }

    public function all(): array
    {
        return $this->repository->all();
    }

    public function add(string $text): bool
    {
        if (trim($text) === '') {
            return false;
        }

        return $this->repository->add($text);
    }

    public function delete(int $index): bool
    {
        return $this->repository->delete($index);
    }
}
