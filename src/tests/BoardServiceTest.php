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
    echo "追加テスト失敗\n";
    exit(-1);
}

// 削除テスト
$service->delete(0);
$data = $service->all();

if ($data !== ['test2']) {
    echo "削除テスト失敗\n";
    exit(1);
}

echo "テスト成功\n";
