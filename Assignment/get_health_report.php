<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
    if(isset($_POST['submit'])) {
        $email_id = $_POST['email_id'];

        echo $email_id;

        $hosttype = "localhost";
        $username = "root";
        $password = "Tvarun@0812";
        $dbname   = "intern_assignment";

        $con = mysqli_connect($hosttype, $username, $password, $dbname);

        if(!$con) {
            echo "Connection failed";
        }
        else {
            $sql = "SELECT emailid, health_report FROM Users WHERE emailid=\"".$email_id."\"";
            $result = mysqli_query($con, $sql);


            while($row = mysqli_fetch_assoc($result)) {
                echo "<br>Health Report: ". $row['health_report'];
    
                $linker = "pdfs/".$row['health_report'];
                echo "<a href='$linker'> <br>Click to open</a>";
            }
                
            mysqli_close($con);
        }
    }
    ?>

</body>

</html>