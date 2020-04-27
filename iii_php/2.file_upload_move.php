<?php

echo "<pre>";

print_r($_FILES);

// 1.遍歷所有文件陣列
for($i = 0, $len=count($_FILES["images"]["name"]); $i < $len ;$i++){
    // 2.判斷文件是否上傳成功
    if($_FILES["images"]["error"][$i] === 0){
        // 2-1.上傳成功，移動檔案位置
        if(move_uploaded_file($_FILES["images"]["tmp_name"][$i],"./tmp/".$_FILES["images"]["name"][$i])){
            // 2-2.移動移動成功，返回OK
            echo "檔案上傳成功<br />";
        }else{
            // 2-3.檔案移動失敗，返回false
            echo "檔案上傳失敗...<br />";
            echo "<a href='javascript:window.history.back();'></a>";
        }
    }
}
