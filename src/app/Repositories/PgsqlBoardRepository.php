<?php

require_once __DIR__ . '/BoardRepositoryInterface.php';

class PgsqlBoardRepository implements BoardRepositoryInterface
{
    private \PDO $pdo;

    public function __construct()
    {
        $host = getenv('DB_HOST') ?: 'db';
        $dbname = getenv('DB_NAME') ?: 'board';
        $user = getenv('DB_USER') ?: 'board_user';
        $pass = getenv('DB_PASS') ?: 'board_pass';

        $dsn = "pgsql:host={$host};dbname={$dbname}";

        $this->pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function all(): array
    {
        try {
            $query = 'SELECT id, content FROM posts ORDER BY id ASC';
            $stmt = $this->pdo->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $e) {
            throw $e;
            return [];
        }
    }

    public function add(string $text): bool
    {
        try {
            $query = 'INSERT INTO posts (content) VALUES (:content)';
            $stmt = $this->pdo->prepare($query);
            return $stmt->execute([':content' => $text]);
        } catch (\Throwable $e) {
            throw $e;
            return false;
        }
    }

    public function update(int $id, string $content): bool
    {
        try {
            $query = 'UPDATE posts SET content = :content WHERE id = :id';
            $stmt = $this->pdo->prepare($query);

            return $stmt->execute([
                ':id' => $id,
                'content' => $content,
            ]);
        } catch (\Throwable $e) {
            throw $e;
            return false;
        }
    }

    public function delete(int $index): bool
    {
        try {
            $query = 'DELETE FROM posts WHERE id = :id';
            $stmt = $this->pdo->prepare($query);
            return $stmt->execute([':id' => $index]);
        } catch (\Throwable $e) {
            throw $e;
            return false;
        }
    }

    public function resetTestData(): void
    {
        $this->pdo->query('TRUNCATE TABLE posts RESTART IDENTITY');
    }
}
