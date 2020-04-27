<!-- 搜索-html -->
<form action="./company_search.php"  method="POST" name="mysearch">
        <div class="search-inner">
            <div class="search-list">
                <input type="radio" name="search" value="companyId" 
                    <?php
                            $check = "checked='checked'";

                            if(isset($_POST["search"]) && $_POST["search"] === "companyId"){
                                echo $check;
                            }
                    ?>                
                >廠商編號
                <input type="radio" name="search" value="companyName"
                    <?php
                        $check = "checked='checked'";

                        if(isset($_POST["search"]) && $_POST["search"] === "companyName"){
                            echo $check;
                        }
                    ?>  
                >廠商名稱
                <input type="radio" name="search" value="companyPhone"
                    <?php
                        $check = "checked='checked'";

                        if(isset($_POST["search"]) && $_POST["search"] === "companyPhone"){
                            echo $check;
                        }
                    ?>                  
                >廠商電話
                <input type="radio" name="search" value="principal"
                    <?php
                        $check = "checked='checked'";

                        if(isset($_POST["search"]) && $_POST["search"] === "principal"){
                            echo $check;
                        }
                    ?>                 
                >負責人
                <input type="radio" name="search" value="principalPhone"
                    <?php
                        $check = "checked='checked'";

                        if(isset($_POST["search"]) && $_POST["search"] === "principalPhone"){
                            echo $check;
                        }
                    ?> 
                >負責人電話
                <input type="radio" name="search" value="email"
                    <?php
                        $check = "checked='checked'";

                        if(isset($_POST["search"]) && $_POST["search"] === "email"){
                            echo $check;
                        }
                    ?>                 
                >信箱
                <input type="radio" name="search" value="companyAddress"
                    <?php
                        $check = "checked='checked'";

                        if(isset($_POST["search"]) && $_POST["search"] === "companyAddress"){
                            echo $check;
                        }
                    ?>                 
                >地址
            </div>
            <input type="text" name="searchtxt" value=""><input type="submit" name="searchbtn" value="搜索">
        </div>
        <a href="./company_new.php">新增廠商</a> | <a href="./company_admin.php">返回廠商列表</a> | <a href="./logout.php?logout=1">登出</a>
</form>
<!-- <a href="./company_admin.php">廠商列表</a> | <a href="./company_new.php">新增廠商</a> | <a href="./logout.php?logout=1">登出</a> -->

