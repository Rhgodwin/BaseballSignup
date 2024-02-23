<?php
require("newDBconnect.php");
class playersClass
{

    public function __construct()
    {
    }

    public function __destruct()
    {
    }


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
}


?>