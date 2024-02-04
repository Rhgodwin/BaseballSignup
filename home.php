<?php
// Session start
session_start();
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
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	</head>
<!--This is the navigation area for Corp nam and Profile/Logout links -->
<nav class="navtop">
            <div>
                <h1>Innovative Soulutions Corporation</h1>
                <a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </div>
        </nav>
   
    <header> <!--This is the Welcome message and displays users name -->
    
        <div class="welcome">
            <h1>Annual Baseball Tech Tourney Signup Page</h1>
			<h2> Welcome back, <?=$_SESSION['name']?>! Ready to play some baseball?</h2>
		
        </div> 
    </header>
     <!--This is the form area to get input from user and display output  -->
            <section>
                <h4 style="text-align: left; padding-left: 5% ;">What team and position are you interested in?</h4>
             <div class=" checkbox" style="align-items: center; width: 35%;padding-left: 5%; flex-wrap: wrap;float: left;">
                <form>
                    <ul>
                  
                   <fieldset class ="fs2" style="width: 35%;">
                        <legend><b>Desired Position</b></legend>
                        <input type="checkbox" name="leftfield" value="Left Field" id="leftfield">
                        <label for="left field" >Left Field</label><br>
                       
                        <input type="checkbox" name="centerfield" value="Center Field" id="centerfield" >
                        <label for="centerfield" >Center Field</label><br>
               
                        <input type="checkbox" name="rightfield" value="Right Field" id="rightfield" >
                        <label for="rightfield" >Right Field</label><br>
                   
                        <input type="checkbox" name="shortstop" value="Short Stop" id="shortstop" >
                        <label for="shortstop" >Short Stop</label><br>
                        
                        <input type="checkbox" name="firstbase" value="First Base" id="firstbase" >
                        <label for="firstbase" >First Base</label><br>
            
                        <input type="checkbox" name="secondbase" value="Second Base" id="secondbase" >
                        <label for="secondbase" >Second Base</label><br>
            
                        <input type="checkbox" name="thirdbase" value="Third Base" id="thirdbase" >
                        <label for="thirdbase" >Third Base</label><br>
            
                        <input type="checkbox" name="pitcher" value="Pitcher" id="pitcher" >
                        <label for="pitcher" >Pitcher</label><br>
            
                        <input type="checkbox" name="catcher" value="Catcher" id="catcher" >
                        <label for="catcher" >Catcher</label><br>
                    </fieldset>
                
                
                    <fieldset class="fs1"style="width: 35%;">
                     <legend><b>Team Selection:</b></legend>
                
                     <input type="checkbox" name="jaguars" value="jaguars" id="jaguars">
                     <label for="jaguars" >Jaguars</label><br>
                    
                     <input type="checkbox" name="cougars" value="cougars" id="jaguars" >
                     <label for="jaguars" >Cougars</label><br>
            
                    
                     <input type="checkbox" name="reds" value="reds" id="reds" >
                     <label for="reds" >Reds</label><br>
                
                     <input type="checkbox" name="cubs" value="cubs" id="cubs" >
                     <label for="cubs" >Cubs</label><br>
                    
                     
                    </fieldset>

                    <fieldset class="submit" style="text-align: center; width:35%;">
                    <input type="submit" value="Submit">
                    </form>
            </ul>

                </fieldset>
                </form>
            </div>
            <!--This Table is  a place holder and the team buttens need better placement (work in progress)-->
                <div class="Data" style=" width: 30%;padding-right: 5%; flex-wrap: wrap;float: left;">
                <table class="ptable">
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
                        <tr>
                        <td>Rhett Godwin</td>
                        <td>Jaguars</td>
                        <td>First Base</td>
                    </tr>
                    <tr>
                         <td>Zach Butler</td>
                         <td>Reds</td>
                         <td>Short Stop</td>
                    </tr>
                    <tr>
                        <td>Cat Kramka</td>
                        <td>Cubs</td>
                        <td>Center Field</td>
                    </tr>
                    <tr>
                        <td>Rhett Godwin</td>
                        <td>Jaguars</td>
                        <td>First Base</td>
                    </tr>
                    <tr>
                         <td>Zach Butler</td>
                         <td>Reds</td>
                         <td>Short Stop</td>
                    </tr>
                    <tr>
                        <td>Cat Kramka</td>
                        <td>Cubs</td>
                        <td>Center Field</td>
                    </tr>	<tr>
                        <td>Rhett Godwin</td>
                        <td>Jaguars</td>
                        <td>First Base</td>
                    </tr>
                    <tr>
                         <td>Zach Butler</td>
                         <td>Reds</td>
                         <td>Short Stop</td>
                    </tr>
                    <tr>
                        <td>Cat Kramka</td>
                        <td>Cubs</td>
                        <td>Center Field</td>
                    </tr>
                    <tr>
                        <td>Rhett Godwin</td>
                        <td>Jaguars</td>
                        <td>First Base</td>
                    </tr>
                    <tr>
                         <td>Zach Butler</td>
                         <td>Reds</td>
                         <td>Short Stop</td>
                    </tr>
                    <tr>
                        <td>Cat Kramka</td>
                        <td>Cubs</td>
                        <td>Center Field</td>
                    </tr>	
                    <!-- End of test data -->
        </tbody>
       
    </div>
           
           </section> <!--END OF Input Output sec-->

           <!--Buttons HELP where to place (function to deisplay team info in table I assume ?)-->
           <div class="teambutton">
           <button class="btntb4">
			Cougars
		</button>
		<button class="btntb3">
			Cubs
		</button>
		<button class="btntb2">
			Jaguars
		</button>
		<button class="btntb1">
			Reds
        </div>
    
	</body>
</html>
