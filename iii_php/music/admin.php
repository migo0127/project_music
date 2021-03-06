<?php
//引入判斷是否登入機制
require_once('./checkSession.php');

//引用資料庫連線
require_once('./db.inc.php');

//SQL 敘述: 取得 students 資料表總筆數
$sqlTotal = "SELECT count(1) FROM `company`";

//取得總筆數
$total = $pdo->query($sqlTotal)->fetch(PDO::FETCH_NUM)[0];

//每頁幾筆
$numPerPage = 15;

// 總頁數
$totalPages = ceil($total/$numPerPage); 

//目前第幾頁
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

//若 page 小於 1，則回傳 1
$page = $page < 1 ? 1 : $page;
?>
<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
    <style>
    .border {
        border: 1px solid;
    }
    .w200px {
        width: 200px;
    }
    </style>
</head>
<body>
 <?php require_once('./templates/title.php'); ?>
<hr />
<form name="myForm" method="POST" action="deleteIds.php">
    <table class="border">
        <thead>
            <tr>
                <th class="border">選擇</th>
                <th class="border">廠商編號</th>
                <th class="border">廠商名稱</th>
                <th class="border">廠商電話</th>
                <th class="border">負責人</th>
                <th class="border">負責人電話</th>
                <th class="border">信箱</th>
                <th class="border">地址</th>
                <th class="border">功能</th>
            </tr>
        </thead>
        <tbody>
        <?php
        //SQL 敘述
        $sql = "SELECT `companyId`, `companyName`, `companyPhone`, `principal`, 
                        `principalPhone`, `email`, `companyAddress`
                FROM `company` 
                ORDER BY `companyId` ASC 
                LIMIT ?, ? ";

        //設定繫結值
        $arrParam = [($page - 1) * $numPerPage, $numPerPage];

        //查詢分頁後的學生資料
        $stmt = $pdo->prepare($sql);
        $stmt->execute($arrParam);

        //資料數量大於 0，則列出所有資料
        if($stmt->rowCount() > 0) {
            $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
            for($i = 0; $i < count($arr); $i++) {
        ?>
            <tr>
                <td class="border">
                    <input type="checkbox" name="chk[]" value="<?php echo $arr[$i]['companyId']; ?>" />
                </td>
                <td class="border"><?php echo $arr[$i]['companyId']; ?></td>
                <td class="border"><?php echo $arr[$i]['companyName']; ?></td>
                <td class="border"><?php echo $arr[$i]['companyPhone']; ?></td>
                <td class="border"><?php echo $arr[$i]['principal']; ?></td>
                <td class="border"><?php echo $arr[$i]['principalPhone']; ?></td>
                <td class="border"><?php echo $arr[$i]['email']; ?></td>
                <td class="border"><?php echo $arr[$i]['companyAddress']; ?></td>                
                <td class="border">
                    <a href="./edit.php?editId=<?php echo $arr[$i]['companyId']; ?>">編輯</a>
                    <a href="./delete.php?deleteId=<?php echo $arr[$i]['companyId']; ?>">刪除</a>
                </td>
            </tr>
        <?php
            }
        } else {
        ?>
            <tr>
                <td class="border" colspan="9">沒有資料</td>
            </tr>
        <?php
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <td class="border" colspan="9">
                <?php for($i = 1; $i <= $totalPages; $i++){ ?>
                    <a href="?page=<?= $i ?>"><?= $i ?></a>
                <?php } ?>
                </td>
            </tr>
        </tfoot>
    </table>
    <input type="submit" name="smb" value="刪除">
</form>

</body>
</html>