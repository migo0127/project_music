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

                 // 針對搜索按鈕判斷
                // 判斷文本框的值是否為空，若是空，則點選搜索按鈕時會跳出訊息
                if(empty($_POST["searchtxt"])){
                    echo "請輸入關鍵字查詢";
                    exit();
                }

                 // 搜尋方法一：
                 $value =  $_POST["search"];

                 $name = $_POST["searchtxt"]; 

                $sql = "SELECT `companyId`, `companyName`, `companyPhone`, `principal`,
                        `principalPhone`, `email`, `companyAddress`
                        FROM `company`
                        WHERE `{$value}` LIKE '%{$name}%'";                

                $pdo_stmt = $pdo->prepare($sql);
                $pdo_stmt->execute();    
        
                // 搜尋方法二：
                // switch($value){
                //     case "companyId":
                //         $sql = "SELECT `companyId`, `companyName`, `companyPhone`, `principal`,
                //         `principalPhone`, `email`, `companyAddress`
                //         FROM `company`
                //         WHERE `companyId` LIKE ?";

                //     break;

                //     case "companyName":
                //         $sql = "SELECT `companyId`, `companyName`, `companyPhone`, `principal`,
                //         `principalPhone`, `email`, `companyAddress`
                //         FROM `company`
                //         WHERE `companyName` LIKE ? ";
                //     break;

                //     case "companyPhone":
                //         $sql = "SELECT `companyId`, `companyName`, `companyPhone`, `principal`,
                //         `principalPhone`, `email`, `companyAddress`
                //         FROM `company`
                //         WHERE `companyPhone` LIKE ? ";
                //     break;

                //     case "principal":
                //         $sql = "SELECT `companyId`, `companyName`, `companyPhone`, `principal`,
                //         `principalPhone`, `email`, `companyAddress`
                //         FROM `company`
                //         WHERE `principal` LIKE ? ";
                //     break;

                //     case "principalPhone":
                //         $sql = "SELECT `companyId`, `companyName`, `companyPhone`, `principal`,
                //         `principalPhone`, `email`, `companyAddress`
                //         FROM `company`
                //         WHERE `principalPhone` LIKE ? ";
                //     break;

                //     case "email":
                //         $sql = "SELECT `companyId`, `companyName`, `companyPhone`, `principal`,
                //         `principalPhone`, `email`, `companyAddress`
                //         FROM `company`
                //         WHERE `email` LIKE ? ";
                //     break;

                //     case "companyAddress":
                //         $sql = "SELECT `companyId`, `companyName`, `companyPhone`, `principal`,
                //         `principalPhone`, `email`, `companyAddress`
                //         FROM `company`
                //         WHERE `companyAddress` LIKE ? ";
                //     break;
                // }

                // $pdo_stmt->execute(array('%'.$name.'%'));
                
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
            //SQL 敘述: 取得 students 資料表總筆數
            $sqlTotal = "SELECT count(1) FROM `company` 
                         WHERE `{$value}` LIKE '%{$name}%'"; 

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
            
            $sql = "SELECT `companyId`, `companyName`, `companyPhone`, `principal`,
            `principalPhone`, `email`, `companyAddress`
            FROM `company`
            WHERE `{$value}` LIKE '%{$name}%'
            ORDER BY `companyId` ASC
            LIMIT ?,?";

            //設定繫結值
            $arrParam = [($page - 1) * $numPerPage, $numPerPage];

            //查詢分頁後的學生資料
            $stmt = $pdo->prepare($sql);
            $stmt->execute($arrParam);

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
</body>

</html>