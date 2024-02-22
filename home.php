<?php

// Session start
session_start();
require("dbConnect.php");

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: index.html');
    exit;

}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <title>Annual Baseball Tech Tourney Signup Page</title>
    <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">

</head>
<!--navigation area for Corp nam and Profile/Logout links -->
<nav class="navtop">
    <div>
        <h1>Innovative Soulutions Corporation</h1>
        <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
    </div>
</nav>

<header> <!--welcome message -->

    <div class="welcome">
        <img src="anim.gif" alt="baseball" class="img1">
        <img src="anim.gif" alt="baseball" class="img2">
        <h1>Annual Baseball Tech Tourney Signup </h1>

        <marquee scrollamount="10" width="60%" direction="right" onclick="stop">
            <h2> Welcome back,
                <?= $_SESSION['name'] ?>! Ready to play some baseball?
            </h2>
        </marquee>





    </div>
</header>

<body>

    <!--This is the form area to get input from user and display output  -->

    <h4 style="text-align: left; padding-left: 5% ;">What team and position are you interested in?</h4>
    <div class=" checkbox" style="align-items: center; width: 35%;padding-left: 5%; flex-wrap: wrap;float: left;">
        <form action="regFormClass.php" method="post">
            <input type="hidden" name="dbname" value="<?= $_SESSION['name'] ?>">

            <ul>

                <fieldset class="fs2">
                    <legend><b>Desired Position</b></legend>
                    <input type="checkbox" id="ckbox1" name="position" value="Left Field" id="leftfield">
                    <label for="left field">Left Field</label><br>

                    <input type="checkbox" id="ckbox1" name="position" value="Center Field" id="centerfield">
                    <label for="centerfield">Center Field</label><br>

                    <input type="checkbox" id="ckbox1" name="position" value="Right Field" id="rightfield">
                    <label for="rightfield">Right Field</label><br>

                    <input type="checkbox" id="ckbox1" name="position" value="Short Stop" id="shortstop">
                    <label for="shortstop">Short Stop</label><br>

                    <input type="checkbox" id="ckbox1" name="position" value="First Base" id="firstbase">
                    <label for="firstbase">First Base</label><br>

                    <input type="checkbox" id="ckbox1" name="position" value="Second Base" id="secondbase">
                    <label for="secondbase">Second Base</label><br>

                    <input type="checkbox" id="ckbox1" name="position" value="Third Base" id="thirdbase">
                    <label for="thirdbase">Third Base</label><br>

                    <input type="checkbox" id="ckbox1" name="position" value="Pitcher" id="pitcher">
                    <label for="pitcher">Pitcher</label><br>

                    <input type="checkbox" id="ckbox1" name="position" value="Catcher" id="catcher">
                    <label for="catcher">Catcher</label><br>
                </fieldset>


                <fieldset class="fs1">
                    <legend><b>Team Selection:</b></legend>

                    <input type="checkbox" id="ckbox2" name="team" value="Jaguars" id="jaguars">
                    <label for="jaguars">Jaguars</label><br>

                    <input type="checkbox" id="ckbox2" name="team" value="Cougars" id="jaguars">
                    <label for="Cougars">Cougars</label><br>


                    <input type="checkbox" id="ckbox2" name="team" value="Reds" id="reds">
                    <label for="Reds">Reds</label><br>

                    <input type="checkbox" id="ckbox2" name="team" value="Cubs" id="cubs">
                    <label for="cubs">Cubs</label><br>


                </fieldset>

                <fieldset class="submit">
                    <input type="submit" id="submit" value="Sign Up" class="inputbtn">
        </form>
        </ul>

        </fieldset>


    </div>
    <!--This Table is  a place holder and the team buttens need better placement (work in progress)-->
    <div class="Data">
        <fieldset class="buttons-fieldset">
            <legend>Display By Team</legend>
            <button onclick="return mypopup('CougarTeam.php')">Cougars

            </button>
            <button onclick="return mypopup('CubsTeam.php')"> Cubs
            </button>
            <button onclick="return mypopup('JaguarsTeam.php')">
                Jaguars
            </button>
            <button onclick="return mypopup('RedsTeam.php')">
                Reds
            </button>

        </fieldset>


    </div>
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
                $result = $sql->Get_Players_From_DB(); ?>

                <?php

                while ($row = mysqli_fetch_array($result)) {
                    $name = $row['playername'];
                    $team = $row['team'];
                    $position = $row['position'];
                    $sql->displayRows($name, $team, $position);
                }




                ?>
            </tbody>
        </table>
    </div>
    <!--END OF Input Output sec-->

    <!--Buttons HELP where to place (function to deisplay team info in table I assume ?)-->

    <script>
        let boxes = document.querySelectorAll("input[id=ckbox1]");
        let boxes2 = document.querySelectorAll("input[id=ckbox2]")

        boxes.forEach(b => b.addEventListener("change", tick1));
        boxes2.forEach(b => b.addEventListener("change", tick2));
        function tick1(e) {
            let state = e.target.checked; // save state of changed checkbox
            boxes.forEach(b => b.checked = false); // clear all checkboxes
            e.target.checked = state; // restore state of changed checkbox
        }

        function tick2(e) {
            let state = e.target.checked; // save state of changed checkbox
            boxes2.forEach(b => b.checked = false); // clear all checkboxes
            e.target.checked = state; // restore state of changed checkbox
        }

        function popup(url) {
            newwindow = window.open(url, 'name', 'height=400px,width=750px,screenX=200,screenY=350');
            if (window.focus) { newwindow.focus() }
            return false;
        }

        function mypopup(url) {
            mywindow = window.open(url, "mywindow", "height=500,width=900,left=1000,top=1000,resizable=no,scrollbars=yes,toolbar=no,menubar=no,location=no,directories=no, status=no");
            mywindow.moveTo(1250, 450);
        }


    </script>
</body>

</html>