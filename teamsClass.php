<?php
require ("newDBconnect.php");
class teamsClass {

    public function __construct() {
    }

    public function __destruct() {
    }
    
    public function Get_Players_From_DB() {
        $con = mysqli_connect("localhost", "dataman", "data", "pwdb");
        //bobby tables prevention 
         $result = $con->execute_query('SELECT * FROM players');
        mysqli_close($con);
        return $result;
        }
        //Display only members with a certain team
        public function display_players_for_Teams($team2){
            $con = mysqli_connect("localhost", "dataman", "data", "pwdb");
          //bobby table prevention
            $result = $con->execute_query("SELECT * FROM `players` WHERE `team` = '$team2'");
        
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

