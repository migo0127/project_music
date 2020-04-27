<?php
header("Content-Type: text/html; chartset=utf-8");

//引入判斷是否登入機制
require_once('./checkSession.php');

//引用資料庫連線
require_once('./db.inc.php');
?>

<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
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
    <table>
        
            <?php

                if(empty($_POST["search"])){
                    echo "請輸入關鍵字查詢";
                    exit();
                }

                $value = $_POST["search"];

                switch($value){
                    case "companyId":
                        $sql = "SELECT `companyId`, `companyName`, `companyPhone`, `principal`,
                        `principalPhone`, `email`, `companyAddress`
                        FROM `company`
                        WHERE `companyId` LIKE ?";
                    break;

                    case "companyName":
                        $sql = "SELECT `companyId`, `companyName`, `companyPhone`, `principal`,
                        `principalPhone`, `email`, `companyAddress`
                        FROM `company`
                        WHERE `companyName` LIKE ? ";
                    break;

                    case "companyPhone":
                        $sql = "SELECT `companyId`, `companyName`, `companyPhone`, `principal`,
                        `principalPhone`, `email`, `companyAddress`
                        FROM `company`
                        WHERE `companyPhone` LIKE ? ";
                    break;

                    case "principal":
                        $sql = "SELECT `companyId`, `companyName`, `companyPhone`, `principal`,
                        `principalPhone`, `email`, `companyAddress`
                        FROM `company`
                        WHERE `principal` LIKE ? ";
                    break;

                    case "principalPhone":
                        $sql = "SELECT `companyId`, `companyName`, `companyPhone`, `principal`,
                        `principalPhone`, `email`, `companyAddress`
                        FROM `company`
                        WHERE `principalPhone` LIKE ? ";
                    break;

                    case "email":
                        $sql = "SELECT `companyId`, `companyName`, `companyPhone`, `principal`,
                        `principalPhone`, `email`, `companyAddress`
                        FROM `company`
                        WHERE `email` LIKE ? ";
                    break;

                    case "companyAddress":
                        $sql = "SELECT `companyId`, `companyName`, `companyPhone`, `principal`,
                        `principalPhone`, `email`, `companyAddress`
                        FROM `company`
                        WHERE `companyAddress` LIKE ? ";
                    break;
                }

                $name = $_POST["searchtxt"];

                if(empty($name)){
                    // header("Refresh: 3; url=./company_admin.php");
                    echo "請輸入關鍵字查詢";
                    exit();
                }

                $pdo_stmt = $pdo->prepare($sql);
                $pdo_stmt->execute(array('%'.$name.'%'));
            ?>
            <thead>
                <th class="border">廠商編號</th>
                <th class="border">廠商名稱</th>
                <th class="border">廠商電話</th>
                <th class="border">負責人</th>
                <th class="border">負責人電話</th>
                <th class="border">信箱</th>
                <th class="border">地址</th>
            </thead>
            <tbody>

            <?php
                if( $pdo_stmt->rowcount() > 0 ){
                    $arrlike = $pdo_stmt->fetchAll(PDO::FETCH_ASSOC);
                    for($i = 0; $i < count($arrlike); $i++) {
            ?>           
                <tr>
                <td class="border"><?php echo $arrlike[$i]['companyId']; ?></td>
                <td class="border"><?php echo $arrlike[$i]['companyName']; ?></td>
                <td class="border"><?php echo $arrlike[$i]['companyPhone']; ?></td>
                <td class="border"><?php echo $arrlike[$i]['principal']; ?></td>
                <td class="border"><?php echo $arrlike[$i]['principalPhone']; ?></td>
                <td class="border"><?php echo $arrlike[$i]['email']; ?></td>
                <td class="border"><?php echo $arrlike[$i]['companyAddress']; ?></td>
                </tr>
            <?php
                }
            }
                 else {
                    ?>
                    <tr>
                        <td class="border" colspan="7">沒有資料</td>
                    </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>