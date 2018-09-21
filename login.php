<html>
    <head>
        <!--
        <script>
        function returnPrefer(){
           window.location.assign("index_soccer.html");
        }
        </script>
        -->
    </head>
<?php

$link = mysqli_connect("localhost","root","root","Account");

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
else{
    echo "Connected to MySQL. <br />" ;
}

$sql = "SELECT * FROM account WHERE Account='$_POST[Account]' and Password='$_POST[Password]'";
echo $sql."<br />";


$result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);
        if(!$row){
            echo "<div>";
            echo "Error: No Existing User or Passward is Wrong!";
            echo "</div>";
            }
        else{
            printf ("%s %s", $row[0], $row[1]); /* what is the meaning of this line? */
            echo "<br />";
            echo "Account is Logedin. <br />";
            $preference = $row[4];
            echo "Preference: ".$preference."<br />";
            if($preference == "Soccer"){
                echo '<script type="text/javascript">
                        window.location = "index_soccer.php"
                    </script>';
            }
            elseif($preference == "Basketball"){
                 echo '<script type="text/javascript">
                        window.location = "index_basketball.php"
                    </script>';
            }
            elseif($preference == "Volleyball"){
                echo '<script type="text/javascript">
                        window.location = "index_volleyball.php"
                    </script>';
            }
}

?>

</html>
