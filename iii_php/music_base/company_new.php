<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>

    <!-- title -->
    <header class="header">
        <p>Music Classroom</p>
        <a href="./logout.php?logout=1">登出</a>
    </header>

    <div class="wrap">
         <!-- 左側功能列表 -->
        <div class="left-wrap">
            <?php require_once("./list.php"); ?>
        </div>

         <!-- 右側廠商列表 -->
         <div class="right-wrap">

            <?php require_once('./templates/company_title.php'); ?>
            <form name="myForm" method="POST" action="./company_insert.php" enctype="multipart/form-data">
            <table class="border">
                <thead>
                    <tr>
                        <th class="border">廠商編號</th>
                        <th class="border">廠商名稱</th>
                        <th class="border">廠商電話</th>
                        <th class="border">負責人</th>
                        <th class="border">負責人電話</th>
                        <th class="border">信箱</th>
                        <th class="border">地址</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border">
                            <input type="text" name="companyId" id="companyId" value="" maxlength="9" pattern="[A-Z]{1}[0-9]{3,4}" title="F###"/>
                        </td>
                        <td class="border">
                            <input type="text" name="companyName" id="companyName" value="" maxlength="15"/>
                        </td>
                        <td class="border">
                            <input type="text" name="companyPhone" id="companyPhone" value="" maxlength="15" />
                        </td>
                        <td class="border">
                            <input type="text" name="principal" id="principal" value="" maxlength="10" />
                        </td>
                        <td class="border">
                            <input type="text" name="principalPhone" id="principal" value="" maxlength="15" />
                        </td>
                        <td class="border">
                            <input type="email" name="email" id="email" value="" maxlength="40" />
                        </td>
                        <td class="border">
                            <input type="text" name="companyAddress" id="companyAddress" value="" maxlength="50" />
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="border" colspan="7"><input type="submit" name="smb" value="新增"></td>
                    </tr>
                </tfoot>
            </table>
            </form>
        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $(".btn2").click(function(){
    $(".p2").toggle(500);
  });
});
</script>

</html>