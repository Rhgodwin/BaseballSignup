<?php
ob_start();
class dbFun{
    
    //private vars
    private $HostName;
    private $UserID;
    private $Password;
    private $DBName;
    private $Con;
    private $name;
    private $fuck;
    //constructor
    public function __construct($host = null, $uid = null, $pw = null, $db = null)
    {
        $this->HostName = $host;
        $this->UserID = $uid;
        $this->Password = $pw;
        $this->DBName = $db;
        $this->Con = mysqli_connect($host, $uid, $pw, $db);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }
    //destructor
    public function __destruct()
    {
        $this->Con->Close();
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
            

            $con = mysqli_connect("localhost", "root", "", "pwdb");
           
            $sql = "INSERT INTO players
             (`playername`, `team`, `position`) 
            VALUES
             ('$name','$team','$position');";
              
          
            
            if (mysqli_query($con, $sql)) {

                
                echo "<h1>You have been added to play in sports Tourney</h1>";
                echo "<h1>Thanks for playing</h1>";
            } else {
                echo "Error in database. Registration failed" . mysqli_error($con);

              }
            mysqli_close($con);

        }
    }
//get functions

//start of insert functions (will need to fix this code)
//to add the UID into player name. going to have to 
//do more research
public function Insert_PlayerName_Into_DB($name){
    $con = mysqli_connect("localhost", "root", "", "pwdb");
    
    $sql = "INSERT INTO `players.playername` VALUE $name";

    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    return $result;

}


//DB retrieval functions
public function Get_Players_From_DB() {
$con = mysqli_connect("localhost", "root", "", "pwdb");

$sql = "SELECT * FROM players";
$result = mysqli_query($con, $sql);
mysqli_close($con);
return $result;
}
//Display only members with a certain team
public function display_player_for_Team($team){
    $con = mysqli_connect("localhost", "root", "", "pwdb");
    $sql = "SELECT team FROM players group by $team having count(*) >1";
    $result = mysqli_query($con, $sql);

    mysqli_close($con);
    return $result;
    

}
public function Set_Playername($name){
    $this->name = $name;
}
//function to check if the record exists before adding
function recordExists($table, $where, $mysqli) {
    $query = "SELECT * FROM `$table` WHERE $where";
    $result = $mysqli->query($query);

    if($result->num_rows > 0) {
            return true; // The record(s) do exist
    }
    return false; // No record found
}
}
//posty post method
if  ($_SERVER["REQUEST_METHOD"] == "POST") {
 
            $postmebaby = new dbFun("localhost", "root", "", "pwdb");
            $postmebaby->ProcessRegistrationForm();      

    }
   

