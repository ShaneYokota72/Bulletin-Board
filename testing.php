

<?php 

$password = "firstcoding$11";
$password_hash = hash("sha256", $password);

echo "해싱 전 : ".$password."<br/>";
echo "해싱 후 : ".$password_hash."<br/>";

echo "해싱 후 (대문자) : ".strtoupper($password_hash)."<br/>";
?>