<?php
// var_dump($_POST);
$name = $_POST["name"];  //データ受け取り
$country = $_POST["country"];
$age = $_POST["age"];
$mail = $_POST["mail"];
$comment = $_POST["comment"];

//受信側の処理
$write_data = "{$name} {$country} {$age} {$mail} {$comment}\n"; //改行コード
$file = fopen('note/data.csv', 'a'); //ファイルを開く、引数aは「ファイルがなければ作る」
flock($file, LOCK_EX);  //ファイルをロックと実行
fwrite($file, $write_data);
flock($file, LOCK_UN); //ロック解除、アンロック
fclose($file); //ファイルをとじる
header("Location:informationnote_input.php"); //入力画面に移動
