<?php
    $userID = $_POST['userID'];
    $data_id = $_POST['data_id'];
    $comment = $_POST['commentcontent'];
    if(isset($_POST["click"]))
    {
        $date = date('Y-m-d');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>
</head>
<body>
    <?php
    /* echo $userID, $data_id, $comment, $date; */
    $servername = "localhost";
    $username = "root";
    $password = "Shane4546?";
    $dbname = "boardinfo";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $query = "SELECT * from user_info where user_id = {$userID}";

    $result = mysqli_query($conn, $query);

    /* $row_cnt = $result->num_rows; */
    /* echo "{$row_cnt}"; */
    //display the data
    if ($result->num_rows > 0){     
        $row = mysqli_fetch_array($result);
        $commenterUN = $row['username'];
    }

    mysqli_close($conn);


    $servername = "localhost";
    $username = "root";
    $password = "Shane4546?";
    $dbname = "boardinfo";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $query = "INSERT into comment() values (\"$data_id\", \"$date\", \"$commenterUN\", \"$comment\")";

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
    // checking the funcyionality
    /* echo "upload completed, {$userID}, {$data_id}, {$comment}, {$date}, {$commenterUN}"; */
    ?>
</body>
</html>