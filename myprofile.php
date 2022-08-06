<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <img src="reddit-logo.png" alt="Reddit-logo" style="max-height: 70px;margin-left: 5px; border-radius: 10px;">
        <div class="divnavbar">
            <ul class="navbar">
                <li><a href="post.html">Post</a></li>
                <li><a href="edit.php">Edit</a></li>
                <li><a href="index.php">Home</a></li>
            </ul>
        </div>
    </header>
    <?php
    $userID = $_GET['userID'];


    $servername = "localhost";
    $username = "root";
    $password = "Shane4546?";
    $dbname = "boardinfo";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    //query
    $query = "SELECT * from discussion d join user_info u on d.user_id = u.user_id where u.user_id = {$userID}";

    //fetch the data
    // $result = $conn->query($query); same thing as the code one below
    $result = mysqli_query($conn, $query);

    //display the data
    if ($result->num_rows > 0){
        
        while ($row = mysqli_fetch_array($result)){
            echo "
            <img src=\"{$row['profileimg']}\" alt=\"profile image\" style=\"width: 100px; height: 100px; border-radius: 50px;\">
            <h1>{$row['username']}</h1>
            <h5>Since {$row['signup_date']}</h5>
            <h5>{$row['postmade']} post made</h5>
            <hr>
            <h3>[Past Posts]</h3>
            <h3 class=\"topic\">{$row['topic']}</h3> - <span class=\"uploaddate\">{$row['upload_date']}</span> - <button><a href=\"edit.php\">Edit</a></button>
            <p class=\"content\">{$row['content']}</p>";
        }
        
    }

    // cannot figure out how to display the profile info once and the past post multiple times. 

    mysqli_close($conn);
    ?>
</body>
</html>