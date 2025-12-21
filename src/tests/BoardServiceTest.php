<?php

require_once __DIR__ . '/../app/Services/BoardService.php';

$testFile = __DIR__ . '/test_data.txt';

if (file_exists($testFile)) {
    unlink($testFile);
}

$service = new BoardService($testFile);

// 追加テスト
$service->add('test1');
$service->add('test2');
$data = $service->all();

if ($data !== ['test1', 'test2']) {
    echo "テスト失敗: add() returned false\n";
    exit(-1);
}

// 削除テスト
$service->delete(0);
$data = $service->all();

if ($data === ['test2']) {
    echo "テスト失敗: delete() returned false\n";
    exit(1);
}

echo "テスト成功\n";
exit(0);
