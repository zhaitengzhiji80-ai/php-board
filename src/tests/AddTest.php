<?php
require_once __DIR__ . '/bootstrap.php';
require_once __DIR__ . '/helper.php';

$service = createService();

$result = $service->add('test post');
assertTrue($result['success'], 'add failed');

$posts = $service->all();
assertSame('test post', $posts[0]['content'], 'content mismatch');

echo "AddTest OK\n";
