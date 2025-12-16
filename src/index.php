<?php
$path = "data/data.txt";
$lines = file($path);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['add'])) {
        $text = trim($_POST['add'] ?? '');
        // 空白チェック
        if ($text == "") {
            $message = "入力してください";
            return;
        }
        file_put_contents($path, $text . "\n", FILE_APPEND);
        header("Location: index.php");
        exit;
    }

    if (isset($_POST["edit"])){
        $id = $_POST["edit"];
        $val = $_POST["value"];
        $lines[$id] = $val;
        file_put_contents($path, $lines);
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="add" placeholder="入力してください">
        <input type="submit" value="送信">
    </form>
    <hr>
        <ul>
            <?php foreach ($lines as $i => $line) : ?>
                <li>
                    <span  id="display-<?php echo $i; ?>"><?php echo htmlspecialchars($line); ?></span>
                    <button class="btn-edit" data-id="<?php echo $i; ?>">編集</button>
                    <form method = "post">
                        <input type="text" name="value" value="<?php echo htmlspecialchars($line); ?>" id="text-<?php echo $i; ?>" style="display: none;">
                        <button type="submit" name="edit" value="<?php echo $i; ?>"  id="edit-<?php echo $i; ?>" style="display: none;">保存</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const btns = document.querySelectorAll(".btn-edit");
            btns.forEach(btn => {
                btn.addEventListener("click", () => {
                    btn.style.display = "none";
                    document.getElementById("display-" + btn.dataset.id).style.display = "none";
                    document.getElementById("text-" + btn.dataset.id).style.display = "block";
                    document.getElementById("edit-" + btn.dataset.id).style.display = "block";
                })
            });
        });
    </script>
</body>

</html>
