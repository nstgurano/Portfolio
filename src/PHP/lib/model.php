<?php
define("HOST","localhost");
define("DBNAME","store_db");
define("DBUSER","user1");
define("DBPASS","pass");

function connect_database($host=HOST,$dbname=DBNAME,$dbuser=DBUSER,$dbpass=DBPASS)
{
    try{
        $dbh=new PDO("mysql:host=urano-mysql;dbname=store_db","user1","pass");
        $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        // echo "接続に成功しました";
    } catch (PDOException $e) {
        print($e->getMessage());
        echo "<br>例外処理あり";
        die();
    }
    return $dbh;
}
?>