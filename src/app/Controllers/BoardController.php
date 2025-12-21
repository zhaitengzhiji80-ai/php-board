<?php

require_once __DIR__ . '/../Services/BoardService.php';

class BoardController {
    private BoardService $service;

    public function __construct() {
        $this->service = new BoardService();
    }

    public function handle(): array {
        $action = $_POST['action'] ?? '';

        if ($action === 'add') {
            $text = trim($_POST['text' ?? '']);
            if ($text !== '') {
                $this->service->add($text);
            }
        }

        if ($action === 'delete') {
            $index = (int)($_POST['idx'] ?? -1);
            $this->service->delete($index);
        }

        return $this->service->all();
    }
}
