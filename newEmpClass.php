<?php
require("playersClass.php");
class newEmpClass{
function newEmployeeForm(){
  
        $name = $_POST["username"];
        $password = $_POST["newPassword"];
        $email = $_POST["empEmail"];
        $pclass = new playersClass();
        $con = mysqli_connect("localhost", "dataman", "data","pwdb");
    
        if ($pclass->empExists($name)) {
        echo "<script>alert('$name is already an employee in our system');
        window.location.href='index.html'</script>";  
        
        }
        else {
            
              $sql = "INSERT INTO accounts 
              (`username`, `password`,`email`)
             VALUES ('$name' , '$password','$email')";
             
              if (mysqli_query( $con, $sql)) {
                echo "<script>alert('Your employee account has been added')
                window.location.href='index.html'</script>";
        } else {
            echo "error in database". mysqli_error($con);
        }
        }
    }
    
}

if  ($_SERVER["REQUEST_METHOD"]) {
 
    $postmebaby = new newEmpClass();
    $postmebaby->newEmployeeForm();      
} 
    

    