<?php 

// A function to check if th email id already exists in teh database
// Can't have two users with the same email id
function email_idAlreadyExists($email_id) {
    $valid = TRUE;
    
    // Information required to connect to the database
    $hosttype = "localhost";
    $username = "root";
    $password = "Tvarun@0812";
    $dbname   = "intern_assignment";

    $con = mysqli_connect($hosttype, $username, $password, $dbname);

    if(!$con) {
        echo "Failed to connect to database";
    }
    else {

        // Getting all the email_id in the table and comparing to check for any matches
        $sql = "SELECT emailid FROM Users";
        $result = mysqli_query($con, $sql);

        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                if($row['emailid'] === $email_id) {
                    $valid = FALSE;
                }
            }
        }
    }

    return $valid;
}

// Code to insert the data in the mysql database
if (isset($_POST['submit']) && !empty($_FILES['pdf_file']['name'])) {
    if ($_FILES['pdf_file']['error'] != 0) {
        echo 'Something wrong with the file.';
    } 
    else {         
        
        // Getting all the information from the form
        $name     = $_POST['name'];
        $age      = $_POST['age'];
        $weight   = $_POST['weight'];
        $email_id = $_POST['email_id'];

        // Checks is username already exists
        if(!email_idAlreadyExists($email_id)) {
            echo "<h2>Email id already used !!</h2>";
            echo "<div><a href='register.php'>Try Again</a></div>";
            die();
        }
        
        // Getting the file name of the pdf
        $file_name = htmlspecialchars($_FILES['pdf_file']['name']);
        $file_tmp = $_FILES['pdf_file']['tmp_name'];

        // Just displaying all the information gathered
        echo $name."<br>";
        echo $age."<br>";
        echo $weight."<br>";
        echo $email_id."<br>";
        echo $file_name."<br>";

        // Information required to connect to the local mysql server
        $hosttype = "localhost";
        $username = "root";
        $password = "Tvarun@0812";
        $dbname   = "intern_assignment"; // A database created by me

        $con = mysqli_connect($hosttype, $username, $password, $dbname);

        if(!$con)  {
            echo "Failed to connect to database";
        }
        else {

            // Storing the pdf in a seperated directory (named "pdfs") to retrieve it later 
            move_uploaded_file($file_tmp, './pdfs/'.$file_name);

            // MySQL statement to insert the values into the table
            $sql = "INSERT INTO Users VALUES ('$name', $age, $weight, '$email_id', \"$file_name\")";

            if(mysqli_query($con, $sql)) {
                // Displaying the result message
                echo "<h1 style='text-align center; color : green;'>Data inserted Successfully !!</h1>";
                echo "<form action='get_health_report.php' method='post'>";
                echo "<input type='text' name='email_id' style='display : none;' value='$email_id'/>";
                echo "<input type='submit' name='submit' value='Go to profile'></form>";
            }
            else {
                echo "Failed to isnert data". mysqli_error($con);
            }
        }
    }
}
?>