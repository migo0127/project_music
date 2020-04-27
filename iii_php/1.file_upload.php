<?php

// echo "<pre>";

// print_r($_FILES);

// 1.判斷文件上傳代號(上傳是否成功)
if($_FILES["file_upload"]["error"] === 0){

    //2-1.若上傳成功，則將檔案從暫存檔移動到指定資料夾中：move_upload_file(暫存區,指定資料夾路徑)
    if(move_uploaded_file($_FILES["file_upload"]["tmp_name"],"./tmp/".$_FILES["file_upload"]["name"])){
        echo "上傳成功<br />";
        echo "檔案名稱：".$_FILES["file_upload"]["name"]."<br />";
        echo "檔案類型：".$_FILES["file_upload"]["type"]."<br />";
        echo "檔案大小：".$_FILES["file_upload"]["size"]."<br />";
    }else{
        // 2-2.若檔案上傳失敗，返到上一頁選項
        echo "檔案上傳失敗...<br />";
        echo "<a href='javascript:window.history.back();'>回上一頁</a>";
    }
}

/* 
    單筆文件上傳步驟：
        1.判斷文件是否上傳成功(捕捉錯誤代號是否為 === 0)。
        2.若判斷上傳成功，則將文件從暫存資料夾中移至指定目錄路徑裡。
            - 使用 move_uplaod_file(暫存路徑,指定路徑);
            - 移動完成，返回檔案上傳成功及檔案資訊(可有可無)。
        3.若是移動失敗，返回錯誤訊息及返回上一頁選項。

*/