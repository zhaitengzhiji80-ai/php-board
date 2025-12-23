<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>掲示板</title>
</head>

<body>
    <form method="POST">
        <input type="hidden" name="action" value="add">
        <input type="text" name="text">
        <button type="submit">投稿</button>
    </form>

    <ul>
        <?php foreach ($posts as $i => $post): ?>
            <li>
                <?= htmlspecialchars($post, ENT_QUOTES, 'UTF-8') ?>
                <form method="POST" style="display : inline;">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="idx" value="<?= $i ?>">
                    <button type="submit">削除</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

</body>

</html>
