<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "Shane4546?";
    $dbname = "boardinfo";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $query = "SELECT * 
    FROM discussion d
    join login_signup l
    on d.user_id = l.user_id
    where password = \"{$_SESSION["userName"]}\"
    ";

    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0){
        $row = mysqli_fetch_array($result);
        $userID = $row['user_id'];
    }
    mysqli_close($conn);
?>
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
        $title = $_POST["title"];
        $content = $_POST["content"];

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
        header("Location:/Bulletin%20Board/index.php");
    ?>
</body>
</html>