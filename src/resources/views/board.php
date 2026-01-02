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

    <?php if ($error !== ''): ?>
        <p style="color:red;">
            <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
        </p>
    <?php endif; ?>

    <ul>
        <?php foreach ($posts as $post): ?>
            <li>
                <?= htmlspecialchars($post['content'], ENT_QUOTES, 'UTF-8') ?>
                <form method="POST" style="display : inline;">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="idx" value="<?= $post['id'] ?>">
                    <button type="submit">削除</button>
                </form>

                <form method="POST" style="display : inline;">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="idx" value="<?= $post['id'] ?>">
                    <input type="text" name="text" value="<?= htmlspecialchars($post['content'], ENT_QUOTES, 'UTF-8') ?>">
                    <button type="submit">更新</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>

</body>

</html>
