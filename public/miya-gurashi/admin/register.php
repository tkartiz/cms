<?php

//データベース接続
$db = new PDO('sqlite:./db/test.db');

//テスト用にユーザーデータを作る
// function init()
// {
// 	global $db;
// 	$db->query('CREATE TABLE IF NOT EXISTS user (user_id text PRIMARY KEY, user_pw TEXT)');
// 	$db->query('CREATE TABLE IF NOT EXISTS user_token (token text PRIMARY KEY, user_id TEXT, insert_date DATETIME)');
// 	$st = $db->prepare('INSERT INTO user (user_id, user_pw) VALUES (?, ?)');
// 	$st->execute(array('testuser', password_hash('hogehoge', PASSWORD_DEFAULT)));
// }

// 準備
$st = $db->prepare('INSERT INTO user (user_id, user_pw) VALUES (?, ?)');

// 実行
$st->execute(array('testuser', password_hash('hogehoge', PASSWORD_DEFAULT)));

?>
