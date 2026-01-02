<?php

require_once __DIR__ . '/../Repositories/RepositoryFactory.php';

class BoardService
{
    private $repository;

    public function __construct()
    {
        $this->repository = RepositoryFactory::createBoardRepository();
    }

    public function all(): array
    {
        return $this->repository->all();
    }

    public function add(string $text): array
    {
        if (trim($text) === '') {
            return [
                'success' => false,
                'message' => '内容が空です'
            ];
        }

        $result =  $this->repository->add($text);

        if ($result == FALSE) {
            return [
                'success' => false,
                'message' => '保存に失敗しました'
            ];
        }

        return [
            'success' => true,
            'message' => ''
        ];
    }

    public function update(int $id, string $content): array
    {
        if (trim($content) === '') {
            return [
                'success' => false,
                'message' => '内容が空です'
            ];
        }

        $result = $this->repository->update($id, $content);

        if ($result == FALSE) {
            return [
                'success' => false,
                'message' => '保存に失敗しました'
            ];
        }

        return [
            'success' => true,
            'message' => ''
        ];
    }

    public function delete(int $index): array
    {
        if ($index < 0) {
            return [
                'success' => false,
                'message' => '不正なIDです'
            ];
        }

        $result = $this->repository->delete($index);

        if ($result == FALSE) {
            return [
                'success' => false,
                'message' => '削除に失敗しました'
            ];
        }

        return [
            'success' => true,
            'message' => ''
        ];
    }
}
