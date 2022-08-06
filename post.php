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
        if(isset($_POST["click"]))
        {
            $date = date('Y-m-d');
        }
        $userID = $_POST['userID'];
        $title = $_POST["title"];
        $content = $_POST["content"];

        /* echo "{$userID}<br>";
        echo "{$title}<br>";
        echo "{$content}<br>";
        echo "uploaded date: {$date}"; */

        $servername = "localhost";
        $username = "root";
        $password = "Shane4546?";
        $dbname = "boardinfo";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $query = "INSERT into discussion() values (default, \"{$userID}\", \"{$title}\", \"{$content}\", \"{$date}\", \"{$date}\", default)";
        $result = mysqli_query($conn, $query);
        mysqli_close($conn);

        $servername = "localhost";
        $username = "root";
        $password = "Shane4546?";
        $dbname = "boardinfo";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $query = "UPDATE user_info set postmade = postmade + 1 where user_id = \"{$userID}\";";
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