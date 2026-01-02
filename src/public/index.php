<?php

require_once __DIR__ . '/../app/Controllers/BoardController.php';

$controller = new BoardController();
$data = $controller->handle();
$posts = $data['posts'];
$error = $data['error'];

require_once __DIR__ . '/../resources/views/board.php';
