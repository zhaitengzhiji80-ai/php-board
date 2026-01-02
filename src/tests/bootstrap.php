<?php
require_once __DIR__ . '/../app/Repositories/PgsqlBoardRepository.php';
require_once __DIR__ . '/../app/Services/BoardService.php';

function createService(): BoardService
{
    $repository = new PgsqlBoardRepository();
    $repository->resetTestData();
    return new BoardService();
}
