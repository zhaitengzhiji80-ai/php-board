<?php

require_once __DIR__ . '/../Services/BoardService.php';

class BoardController
{
    private BoardService $service;

    public function __construct()
    {
        $this->service = new BoardService();
    }

    public function handle(): array
    {
        $action = $_POST['action'] ?? '';
        $error = '';

        if ($action === 'add') {
            $result = $this->add();
        }

        if ($action === 'update') {
            $result = $this->update();
        }

        if ($action === 'delete') {
            $result = $this->delete();
        }

        if ($result['success'] == FALSE) {
            $error = $result['message'];
        }

        return [
            'posts' => $this->service->all(),
            'error' => $error,
        ];
    }

    private function add(): array
    {
        try {
            $text = $_POST['text'] ?? '';
            return $this->service->add($text);
        } catch (\Throwable $e) {
            throw $e;
            return [];
        }
    }

    private function update(): array
    {
        try {
            $id = (int)($_POST['idx'] ?? 0);
            $text = $_POST['text'] ?? '';
            return $this->service->update($id, $text);
        } catch (\Throwable $e) {
            throw $e;
            return [];
        }
    }

    private function delete(): array
    {
        try {
            $index = (int)($_POST['idx'] ?? 0);
            return $this->service->delete($index);
        } catch (\Throwable $e) {
            throw $e;
            return [];
        }
    }
}
