<?php
header("Content-Type: text/html; chartset=utf-8");

//引入判斷是否登入機制
require_once('./checkSession.php');

//引用資料庫連線
require_once('./db.inc.php');

//SQL 敘述
$sql = "INSERT INTO `company` 
        (`companyId`, `companyName`, `companyPhone`, `principal`,`principalPhone`, `email`, `companyAddress`) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";


//繫結用陣列
$arr = [
    $_POST['companyId'],
    $_POST['companyName'],
    $_POST['companyPhone'],
    $_POST['principal'],
    $_POST['principalPhone'],
    $_POST['email'],
    $_POST['companyAddress']
];

$pdo_stmt = $pdo->prepare($sql);
$pdo_stmt->execute($arr);
if($pdo_stmt->rowCount() === 1) {
    header("Refresh: 3; url=./admin.php");
    echo "新增成功";
} else {
    header("Refresh: 3; url=./admin.php");
    echo "新增失敗";
}