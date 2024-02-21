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
                    <!-- Below to next comment line will need to be restructed 
                         for PHP to fill the table from the database
                         This is simply test data for the skeleton framework
                         Will have to have PHP code inserted with for loop
                         to gather the data to fill the table-->
                    <?php
                    include_once('dbConnect.php');
                    include_once('teamsClass.php');
                    $con = new dbConnect('localhost', 'dataman', 'data', 'pwdb');
                    $sql = new teamsClass();
                    $result = $sql->display_players_for_Teams('cubs'); ?>

                    <?php

                    while ($row = mysqli_fetch_array($result)) {
                        $name = $row['playername'];
                        $team = $row['team'];
                        $position = $row['position'];
                
                    
                        $sql->displayRows($name, $team, $position);
                    }
?>
        </body></html>
