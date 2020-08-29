<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    error_get_last(E_ALL^E_NOTICE);
    session_cache_limiter('none');
    session_start();
?>
<table>
    <caption>カートの中身</caption>
    <?php
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
    ?>
    <tr>
        <td><?php print( htmlspecialchars($item,ENT_QUOTES));?></td>
    </tr>
    <?php
        }
    }
    ?>
</table>
<p><a href="list.php">戻る</a></p>
</body>
</html>