<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        if(isset($_POST["modify"]))
        {
            $date = date('Y-m-d');
        }
        $userID = $_POST['userID'];
        $dataID = $_POST["dataID"];
        $title = $_POST["title"];
        $content = $_POST["content"];

        /* echo "{$title}<br>";
        echo "{$content}<br>";
        echo "{$date}<br>";
        echo "{$dataID}"; */

        $servername = "localhost";
        $username = "root";
        $password = "password";
        $dbname = "boardinfo";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $query = "UPDATE discussion
        SET topic='{$title}', content = '{$content}', modified_date = '{$date}'
        WHERE data_id = '{$dataID}'";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);


        echo "<form name=\"myForm\" action=\"index.php\" method=\"POST\">
                    <input type=\"hidden\" name=\"userID\" id=\"userID\" value=\"{$userID}\">
                </form>";
        echo "
        <script>
            window.onload=function(){
                var auto = setTimeout(function(){ autoRefresh(); }, 100);
    
                function submitform(){
                document.forms[\"myForm\"].submit();
                }
    
                function autoRefresh(){
                clearTimeout(auto);
                auto = setTimeout(function(){ submitform(); autoRefresh(); }, 100);
                }
            }
        </script>";
        
    ?>
</body>
</html>