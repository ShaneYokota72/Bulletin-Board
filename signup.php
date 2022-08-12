<!-- when signing up, make sure to link the info to user_into table in the DB. img link, postmade, username. etc -->
<?php
    session_start();

    $date;
    $UNSU = $_POST['UNSU'];
    $PWSU = $_POST['PWSU'];
    $PWSUCF = $_POST['PWSUCF'];
    $PWhash = hash("sha256", $PWSU);
    $img = $_POST['img'];
    if(isset($_POST["date"]))
    {
        echo "<script>alert(\"mimimi\");</script>";
        $date = date('Y-m-d');
    }

    if ($PWSU == $PWSUCF){
        Adduser();
    }

    function Adduser(){
        global $UNSU;
        global $PWSU;
        global $PWhash;
        global $date;
        global $img;


        $servername = "localhost";
        $username = "root";
        $password = "Shane4546?";
        $dbname = "boardinfo";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $query = "INSERT into login_signup() values (default, \"{$UNSU}\", \"{$PWhash}\")";
        $result = mysqli_query($conn, $query);
        
        mysqli_close($conn);

        $servername = "localhost";
        $username = "root";
        $password = "Shane4546?";
        $dbname = "boardinfo";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $query = "INSERT into user_info() values (default, \"{$UNSU}\", \"{$date}\", default, \"{$img}\" ,\"0\")";
        $result = mysqli_query($conn, $query);
        
        mysqli_close($conn);

        header("Location:/Bulletin%20Board/login.html");
    }
    
    ?>