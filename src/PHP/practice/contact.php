<?php 
$title='contact';
require_once('meta.php');?>
<html>
    <body>
        <main id="main">
            <div id="contact" class="big-bg">
            <?php require_once('header.php');?>
                <div class="wrapper">
                    <h2 class="page-title">Contact</h2>
                    <form action="#">
                        <div>
                            <label for="name">お名前</label>
                            <br>
                            <input type="text" name="name" id="name">
                        </div>
                        <div>
                            <label for="name">メールアドレス</label>
                            <br>
                            <input type="email" name="email" id="email">
                        </div>
                        <div>
                            <label for="message">メッセージ</label>
                            <br>
                            <textarea name="message" id="message"></textarea>
                        </div>
                        <input type="submit" name="send" class="button" value="送信">
                    </form>
                </div>
            </div>
            <?php require_once('footer.php')?>
        </main>
    </body>
    </html>
    