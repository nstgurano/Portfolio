<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <table>
            <tr>
                <th>従業員ID</th>
                <td><input type="text" name="id"></td>
            </tr>
            <tr>
                <th>パスワード</th>
                <td><input type="password" name="password"></td>
            </tr>
        </table>
        <input type="submit" name="send" value="ログイン">
    </form>
</body>
</html>