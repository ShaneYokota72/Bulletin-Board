<?php
    session_start();
    $data_id = $_POST['data_id'];
    $comment = $_POST['commentcontent'];
    if(isset($_POST["click"]))
    {
        $date = date('Y-m-d');
    }

    /* echo $userID, $data_id, $comment, $date; */
    $servername = "localhost";
    $username = "root";
    $password = "Shane4546?";
    $dbname = "boardinfo";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $query = "SELECT * FROM login_signup where password = \"{$_SESSION["userName"]}\"";

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
    header("Location:/Bulletin%20Board/index.php");
    // checking the funcyionality
    /* echo "upload completed, {$userID}, {$data_id}, {$comment}, {$date}, {$commenterUN}"; */
?>