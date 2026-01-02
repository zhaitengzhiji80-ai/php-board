<?php

require_once __DIR__ . '/PgsqlBoardRepository.php';
require_once __DIR__ . '/FileBoardRepository.php';

class RepositoryFactory
{
    public static function createBoardRepository()
    {
        $driver = getenv('STORAGE_DRIVER') ?: 'file';

        if ($driver === 'pgsql') {
            return new PgsqlBoardRepository();
        }

        return new FileBoardRepository();
    }
}
