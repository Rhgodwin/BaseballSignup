<?php

class teamsClass {

    public function __construct() {
    }

    public function __destruct() {
    }
    
    public function Get_Players_From_DB() {
        $con = mysqli_connect("localhost", "dataman", "data", "pwdb");
        
        $sql = "SELECT * FROM players";
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
        return $result;
        }
        //Display only members with a certain team
        public function display_player_for_Team($team){
            $con = mysqli_connect("localhost", "dataman", "data", "pwdb");
            $sql = "SELECT team FROM players group by $team having count(*) >1";
            $result = mysqli_query($con, $sql);
        
            mysqli_close($con);
            return $result;
            
        
        }


}