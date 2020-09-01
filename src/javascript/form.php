<html>
    <head>
        <script src="script.js"></script>
        <link rel="stylesheet" href="./../css/style2.css">
        <title>Get</title>
    </head>
    <body>
        <form action="get2.php" method="post">
            <p>文字入力</p>
            <input type="text" name="text" placeholder="text">
            <p>色選び（複数選択可）</p>
            <label><input type="checkbox" name="color1" value="yellow">yellow</label>
            <label><input type="checkbox" name="color2" value="red">red</label>
            <label><input type="checkbox" name="color3" value="blue">blue</label>
            <p>性別</p>
            <label><input type="radio" name="gender" value="male">male</label>
            <label><input type="radio" name="gender" value="female">female</label>
            
            <p>日付</p>
            <input type="date" name="date">
            <br>
            <input type="submit" name="send" value="送信">
        </form>
    </body>
</html>