<html>
<?php

$link = mysqli_connect("localhost","root","root","Account");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
else{
    echo " connected to MySQL.<br />" ;

}

$sql2 = "SELECT * FROM account WHERE Account='$_POST[Account]' or Email='$_POST[Email]'";
echo $sql2."<br />";


$result = mysqli_query( $link, $sql2);
        $row = mysqli_fetch_array($result);
        if(!$row){
            echo "<div>";
            echo "No existing user.";
            echo "</div>";
            $sql = "INSERT INTO account (Account,Email,Password, Preference) VALUES ('$_POST[Account]','$_POST[Email]','$_POST[Password]','$_POST[Preference]')";
            echo $sql;

            if (!mysqli_query($link, $sql)){
                echo "inserting into database failed."."<br />";
            }
            else{
            echo "1 record added."."<br />";
            }
        }
        else{
            printf ("%s %s", $row[0], $row[1]);
            echo "\n";
            $loggedIn = true;
            echo "Account or Email Has Been Used."."<br />";
}

?>
<button><a href="login.html">return</a></button>
</html>
