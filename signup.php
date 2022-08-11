<!-- when signing up, make sure to link the info to user_into table in the DB. img link, postmade, username. etc -->
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
        $UNSU = $_POST['UNSU'];
        $PWSU = $_POST['PWSU'];
        $PWSUCF = $_POST['PWSUCF'];
        $PWhash = hash("sha256", $PWSU);

        /* echo "{$UNSU}<br>";
        echo "{$PWSU}<br>";
        echo "{$PWSUCF}<br>"; */
        // problem would occur if the same account name is signed up
        if ($PWSU == $PWSUCF){
            Adduser();
        }

        function Adduser(){
            global $UNSU;
            global $PWSU;
            global $PWhash;


            $servername = "localhost";
            $username = "root";
            $password = "Shane4546?";
            $dbname = "boardinfo";
            
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            $query = "INSERT into login_signup() values (default, \"{$UNSU}\", \"{$PWhash}\")";
            $result = mysqli_query($conn, $query);
            
            mysqli_close($conn);

            header("Location:/Bulletin%20Board/login.html");
        }
        
    ?>
</body>
</html>