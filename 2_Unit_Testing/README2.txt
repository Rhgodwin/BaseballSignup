The following code verifies the users log in credentials with the record 
that matches in the database to allow the user to move forward, also
checked to see if the Admin flag is present allowing for access
to the database Admin editing portion of the site:

<?php

session_start();
require("newDBconnect.php");



// check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}

// Prepare our SQL, preparing the SQL statement to prevent SQL injection attacks.
if ($stmt = $mysqli->prepare('SELECT id, password, isAdmin FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc)
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so the result to see if it is in database
	$stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password, $isAdmin);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: WARNING using plain passwords for ease of use. In future use hashed valued!!!
        if ($_POST['password'] === $password) {
            // Success! User has logged-in!
            // Create sessions, so we know the user is logged in. 
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            if ($isAdmin){
            header('location: admin.php');
        } else {

            header('location: home.php');
        }
        exit();
    } else {
            // Incorrect password

            echo "<script>alert('Incorrect Password'); window.location.href='index.html';</script>";
        }
    } else {
        // Incorrect username
        echo "<script>alert('Incorrect Username'); window.location.href='index.html';</script>";
    }

	$stmt->close();

   
}

The following code is used to add a checks to see if the employee is already in the
system and if it isnt allows for the adding of a new employee:

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
    
The following code is used to check if a player exists with the 
team and position that is being submitted and to return true 
if it is and false if there is not a match:

 function recordExists($team, $position)
    {
        //code change to prevent bobby tables
        $con = mysqli_connect("localhost", "dataman", "data", "pwdb");
        $result = $con->execute_query("SELECT * FROM `players` WHERE `team` = '$team' AND `position` = '$position'");
        if ($result->num_rows > 0)  {
            return true; //record exists
        }

      
      return false; //does not exist

    }

The following code checks to see if an employee exists in the database 
and if it does return true, otherwise return false:

   function empExists($name){
        $con = mysqli_connect("localhost", "dataman", "data", "pwdb");
        $result = $con->execute_query("SELECT * FROM `accounts` WHERE `username` = '$name'");
        if ($result->num_rows > 0) {
            return true;
    }
    return false;
}

The following code is used to query the database and get a list of all the players:

 public function Get_Players_From_DB() {
        $con = mysqli_connect("localhost", "dataman", "data", "pwdb");
        //bobby tables prevention 
         $result = $con->execute_query('SELECT * FROM players');
        mysqli_close($con);
        return $result;
        }

The following code is used to query the database and get a list of players for the 
selected team:

 public function display_players_for_Teams($team2){
            $con = mysqli_connect("localhost", "dataman", "data", "pwdb");
          //bobby table prevention
            $result = $con->execute_query("SELECT * FROM `players` WHERE `team` = '$team2'");
        
            mysqli_close($con);
            return $result;
            
        
        }

The following code is used to check if a player already exists in the database
for the team/position and if has not already been selected added the player
to the team and position:

function ProcessRegistrationForm()
{

        //retrieve form data          
        $name = $_POST['dbname'];
        $team = $_POST['team'];
        $position = $_POST['position'];

        $pclass = new playersClass();
        $con = mysqli_connect("localhost", "dataman", "data", "pwdb");
        

        if ($pclass->recordExists($team, $position)) {
            //if a record is found code goes in here
            
            header("location: sorry.php");
        } else {
            # code...
              


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

The following code is used to add a new player to the database using the
database admin functions: 

require_once("newDBconnect.php");

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
	$name = mysqli_real_escape_string($mysqli, $_POST['playername']);
	$team = mysqli_real_escape_string($mysqli, $_POST['team']);
	$position = mysqli_real_escape_string($mysqli, $_POST['position']);
		
	// Check for empty fields
	if (empty($name) || empty($team) || empty($position)) {
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($team)) {
			echo "<font color='red'>Team field is empty.</font><br/>";
		}
		
		if (empty($position)) {
			echo "<font color='red'>Position field is empty.</font><br/>";
		}
		
		// Show link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// If all the fields are filled (not empty) 

		// Insert data into database
		$result = mysqli_query($mysqli, "INSERT INTO players (`playername`, `team`, `position`) VALUES ('$name', '$team', '$position')");
		
		// Display success message
		echo "<p><font color='green'>Data added successfully!</p>";
		echo "<a href='admin.php'>View Result</a>";
	}
}

The following code is used to add a new user to the employee database table:

require_once("newDBconnect.php");

if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	
	// Check for empty fields
	if (empty($name) || empty($password) || empty($email)) {
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($password)) {
			echo "<font color='red'>Team field is empty.</font><br/>";
		}
		
		if (empty($email)) {
			echo "<font color='red'>Position field is empty.</font><br/>";
		}
	} else {
		// Update the database table
		$result = mysqli_query($mysqli, "UPDATE accounts SET `username` = '$name', `password` = '$password', `email` = '$email' WHERE `id` = $id");
		
		// Display success message
		echo "<p><font color='green'>Data updated successfully!</p>";
		echo "<a href='admin.php'>View Result</a>";
	}
}

The following code is used to edit the player database in the admin section of the site:

// Include the database connection file
require_once("newDBconnect.php");

if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$team = mysqli_real_escape_string($mysqli, $_POST['team']);
	$position = mysqli_real_escape_string($mysqli, $_POST['position']);	
	
	// Check for empty fields
	if (empty($name) || empty($team) || empty($position)) {
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($team)) {
			echo "<font color='red'>Team field is empty.</font><br/>";
		}
		
		if (empty($position)) {
			echo "<font color='red'>Position field is empty.</font><br/>";
		}
	} else {
		// Update the database table
		$result = mysqli_query($mysqli, "UPDATE players SET `playername` = '$name', `team` = '$team', `position` = '$position' WHERE `id` = $id");
		
		// Display success message
		echo "<p><font color='green'>Data updated successfully!</p>";
		echo "<a href='admin.php'>View Result</a>";
	}
}

The following code is used to edit the employee database in the admin
part of the site:

require_once("newDBconnect.php");

if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	
	// Check for empty fields
	if (empty($name) || empty($password) || empty($email)) {
		if (empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if (empty($password)) {
			echo "<font color='red'>Team field is empty.</font><br/>";
		}
		
		if (empty($email)) {
			echo "<font color='red'>Position field is empty.</font><br/>";
		}
	} else {
		// Update the database table
		$result = mysqli_query($mysqli, "UPDATE accounts SET `username` = '$name', `password` = '$password', `email` = '$email' WHERE `id` = $id");
		
		// Display success message
		echo "<p><font color='green'>Data updated successfully!</p>";
		echo "<a href='admin.php'>View Result</a>";
	}
}

The following code is used to delete an employee/player from there respective databases:

// Include the database connection file
require_once("newDBconnect.php");

// Get id parameter value from URL
$id = $_GET['id'];

// Delete row from the database table
$result = mysqli_query($mysqli, "DELETE FROM players WHERE id = $id");
$result2 = mysqli_query($mysqli,"DELETE FROM accounts WHERE id= $id");
// Redirect to the main display page 
header("Location:admin.php");

