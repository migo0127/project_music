<!DOCTYPYE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的 PHP 程式</title>
    <style>
    .border {
        border: 1px solid;
    }
    </style>
</head>
<body>
<?php require_once('./templates/company_title.php'); ?>
<hr />
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

</body>
</html>