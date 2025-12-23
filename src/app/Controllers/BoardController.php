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

        if ($action === 'add') {
            $this->add();
        }

        if ($action === 'delete') {
            $this->delete();
        }

        return $this->service->all();
    }

    private function add(): void
    {
        $text = $_POST['text'] ?? '';
        $this->service->add($text);
    }

    private function delete(): void
    {
        $index = (int)($_POST['idx'] ?? -1);
        $this->service->delete($index);
    }
}
