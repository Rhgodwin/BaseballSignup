<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">

<title>Team Table Display</title>
<link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
    </head>
     <body>
     <div class=tableContainer>
            <table>
                <thead>

                    <tr>
                        <th colspan="3">Current Team Roster</th>
                    <tr>
                        <th>Player Name</th>
                        <th>Current Team</th>
                        <th>Position</th>
                    </tr>
                    </tr>
                </thead>
                <tbody>
                   
                    <?php
                    include_once('newDBconnect.php');
                    include_once('teamsClass.php');
                    $con = mysqli_connect('localhost', 'dataman', 'data', 'pwdb'); //connect to db
                    $sql = new teamsClass(); //var for team class
                  
                    $result = $sql->display_players_for_Teams('cougars'); ?>

                    <?php

                    while ($row = mysqli_fetch_array($result)) {
                        $name = $row['playername'];
                        $team = $row['team'];
                        $position = $row['position'];
                      
                    
                        $sql->displayRows($name, $team, $position);
                    }
?>
        </body></html>