<?php

require_once __DIR__ . '/../app/Controllers/BoardController.php';

$controller = new BoardController();
$posts = $controller->handle();

require_once __DIR__ . '/../resources/views/board.php';
