<?php
require("dbConnect.php");
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

        $con = new dbConnect("localhost", "dataman", "data", "pwdb");
        $query = "SELECT * FROM `players` WHERE `team` = '$team' AND `position` = '$position'";
        $result = $con->mysqli->query($query);
        if ($result->num_rows > 0)  {
            return true; //record exists
        }

      
      return false; //does not exist

    }
}


?>