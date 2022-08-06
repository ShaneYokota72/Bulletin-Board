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

    $query = "select * from user_info where user_id = {$userID}";

    $query = "INSERT into comment() values (\"$data_id\", \"$date\", \"$userID\", \"$comment\")";
    $result = mysqli_query($conn, $query);
    mysqli_close($conn);


    ?>
</body>
</html>