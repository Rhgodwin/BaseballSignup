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
        public function display_players_for_Teams($team2){
            $con = mysqli_connect("localhost", "dataman", "data", "pwdb");
            $sql = "SELECT * FROM `players` WHERE `team` = '$team2'";
            $result = mysqli_query($con, $sql);
        
            mysqli_close($con);
            return $result;
            
        
        }

        function setTeam($team){
            $this->team = $team;
            $team2 ='';
            $team = $team2;
        }
        function displayRows($name, $team, $pos)
        {
            ?>

            <tr>
                <td>
                    <?php echo $name; ?>
                </td>
                <td>
                    <?php echo $team; ?>
                </td>
                <td>
                    <?php echo $pos; ?>
                </td>
            </tr>

            <!-- End of test data -->

            <?php
        }
    }
       ?>

