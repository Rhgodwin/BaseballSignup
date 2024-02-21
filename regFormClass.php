<?php

class regFormClass {

public function __construct() {
}
public function __destruct() {
}

//process for the form
function ProcessRegistrationForm()
{

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //retrieve form data
      
       // $name = $_SESSION['name'];          
        $name = $_POST['dbname'];
        $team = $_POST['team'];
        $position = $_POST['position'];
        

        $con = mysqli_connect("localhost", "dataman", "data", "pwdb");
       
        $sql = "INSERT INTO players
         (`playername`, `team`, `position`) 
        VALUES
         ('$name','$team','$position');";
          
      
        
        if (mysqli_query($con, $sql)) {
            header("Location: success.php");
            
        
        } else {
            echo "<h1>Error in database. Registration failed<br>
            Please contact support</h1>" . mysqli_error($con);

          }
        mysqli_close($con);

    }

  

}



}

//posty post method to grab the posty post variable
if  ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $postmebaby = new regFormClass();
    $postmebaby->ProcessRegistrationForm();      
}
