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
        trim($text) === '';
        if ($text === '') {
            return false;
        }

        return $this->repository->add($text);
    }

    public function delete(int $index): bool
    {
        if ($index < 0) {
            return false;
        }
        return $this->repository->delete($index);
    }
}
