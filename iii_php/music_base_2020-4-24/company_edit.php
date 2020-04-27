<?php
//引入判斷是否登入機制
require_once('./checkSession.php');

//引用資料庫連線
require_once('./db.inc.php');
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
<?php require_once('./templates/company_title.php'); ?>
<hr />
<form name="myForm" method="POST" action="company_updateEdit.php" enctype="multipart/form-data">
    <table class="border">
        <tbody>
        <?php
        //SQL 敘述
        $sql = "SELECT `companyId`, `companyName`, `companyPhone`, `principal`, 
                        `principalPhone`, `email`, `companyAddress`
                FROM `company` 
                WHERE `companyId` = ?";

        //設定繫結值
        $arrParam = [$_GET['editId']];

        //查詢
        $stmt = $pdo->prepare($sql);
        $stmt->execute($arrParam);
        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($arr) > 0) {
        ?>
           <tr>
                <td class="border">廠商編號</td>
                <td class="border">
                    <input type="text" name="companyId" value="<?php echo $arr[0]['companyId']; ?>" maxlength="5" />
                </td>
            </tr>
            <tr>
                <td class="border">廠商名稱</td>
                <td class="border">
                    <input type="text" name="companyName" value="<?php echo $arr[0]['companyName']; ?>" maxlength="10" />
                </td>
            </tr>            
            <tr>
                <td class="border">廠商電話</td>
                <td class="border">
                    <input type="text" name="companyPhone" value="<?php echo $arr[0]['companyPhone']; ?>" maxlength="15" />
                </td>
            </tr>
            <tr>
                <td class="border">負責人</td>
                <td class="border">
                    <input type="text" name="principal" value="<?php echo $arr[0]['principal']; ?>" maxlength="10" />
                </td>
            </tr>
            <tr>
                <td class="border">負責人電話</td>
                <td class="border">
                    <input type="text" name="principalPhone" value="<?php echo $arr[0]['principalPhone']; ?>" maxlength="15" />
                </td>
            </tr>
            <tr>
                <td class="border">信箱</td>
                <td class="border">
                    <input type="text" name="email" value="<?php echo $arr[0]['email']; ?>" maxlength="40" />
                </td>
            </tr>
            <tr>
                <td class="border">地址</td>
                <td class="border">
                    <input type="text" name="companyAddress" value="<?php echo $arr[0]['companyAddress']; ?>" maxlength="50" />
                </td>
            </tr>
            <tr>
                <td class="border">功能</td>
                <td class="border">
                    <a href="./company_delete.php?deleteId=<?php echo $arr[0]['companyId']; ?>">刪除</a>
                </td>
            </tr>
        <?php
        } else {
        ?>
            <tr>
                <td class="border" colspan="6">沒有資料</td>
            </tr>
        <?php
        }
        ?>
        </tbody>
        <tfoot>
            <tr>
            <td class="border" colspan="6"><input type="submit" name="smb" value="修改"></td>
            </tr>
        </tfoo>
    </table>
    <input type="hidden" name="editId" value="<?php echo $_GET['editId']; ?>">
</form>
</body>
</html>