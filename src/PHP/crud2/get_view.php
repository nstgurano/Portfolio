<?php
session_start();
?>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="get.php" method="get">
        <p>社員名</p>
        <input type="text" name="name" placeholder="name"><span><?php echo $_SESSION['name']?></span>
        <p>血液型</p>
        <select name="bloodType">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="O">O</option>
            <option value="AB">AB</option>
        </select>
        <p>誕生日</p>
        <input type="date" name="birth"><span><?php echo $_SESSION['birth']?></span>
        <br>
        <input type="submit" name="send" value="送信">
    </form>
    <a href="mailto:urano@nstg.co.jp">urano@nstg.co.jp</a>
    <?php
    if(isset($_SESSION['none'])){
        echo $_SESSION['none'];
    }
    var_dump($_SESSION);
    unset($_SESSION);
    ?>
</body>
</html>