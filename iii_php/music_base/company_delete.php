<?php
//引入判斷是否登入機制
require_once('./checkSession.php');

//引用資料庫連線
require_once('./db.inc.php');

//先查詢出特定 companyId (editId) 資料欄位
$sqlGetId = "SELECT `companyId` FROM `company` WHERE `companyId` = ? ";
$stmtGetId = $pdo->prepare($sqlGetId);

//加入繫結陣列
$arrGetIdParam = [
    $_GET['deleteId']
];

//執行 SQL 語法
$stmtGetId->execute($arrGetIdParam);

//若有找到 stmtGetId 的資料
if($stmtGetId->rowCount() > 0) {
    //取得指定 companyId 的資料 (1筆)
    $arrId = $stmtGetId->fetchAll(PDO::FETCH_ASSOC);     
}

//SQL 語法
$sql = "DELETE FROM `company` WHERE `companyId` = ? ";

$arrParam = [
    $_GET['deleteId']
];

$stmt = $pdo->prepare($sql);
$stmt->execute($arrParam);

if($stmt->rowCount() > 0) {
    header("Refresh: 3; url=./company_admin.php");
    echo "刪除成功";
} else {
    header("Refresh: 3; url=./company_admin.php");
    echo "刪除失敗";
}