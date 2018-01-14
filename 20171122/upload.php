<html>
    <head>
    
    </head>
    <body>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Height：<input type="text" name="height" id="heigth"> m<br>
            Weight：<input type="text" name="weight" id="weigth"> kg<br>
            Picture：<input type="file" name="picture" id="picture"><br>
            <input type="submit" name="submit" id="submit" value="提交">
        </form>
    </body>
</html>

<?php
    if($_POST["height"]==null || $_POST["weight"]==null){
        echo "please type in all information";
    }
    else{
        if($_FILES["picture"]["error"]>0){
            echo "empty";
        }
        else{
            echo "Height = " . $_POST["height"] . "<br>";
            echo "Weight = " . $_POST["weight"] . "<br>";
            $height2 = $_POST["height"] * $_POST["height"];
            $BMI = $_POST["weight"] / $height2;
            echo "BMI = ：" . $BMI . "<br>";        
            echo "檔案名稱: " . $_FILES["picture"]["name"]."<br>";
            echo "檔案類型: " . $_FILES["picture"]["type"]."<br>";
            echo "檔案大小: " . ($_FILES["picture"]["size"] / 1024)." Kb<br>";
            echo "暫存名稱: " . $_FILES["picture"]["tmp_name"];
            echo '<br><br><img src="upload/' . $_FILES["picture"]["name"] . '">';
            move_uploaded_file($_FILES["picture"]["tmp_name"],"upload/".$_FILES["picture"]["name"]);
        }
    }
?>
<!-- If it is not a picture, show “wrong file type.” -->