<?php

header("Content-Type: text/html; chartset=utf-8");

//引入判斷是否登入機制
require_once('./checkSession.php');

//引用資料庫連線
require_once('./db.inc.php');

$sql = "SELECT `companyId`, `companyName`, `companyPhone`, `principal`, 
        `principalPhone`, `email`, `companyAddress`
        FROM `company`
        WHERE `companyId` = ? ";

$arr = [
    $_POST["test"]
];

$stmt = $pdo->prepare($sql);

print_r($stmt);

$stmt->execute($arr);

print_r($stmt->execute($arr));

?>