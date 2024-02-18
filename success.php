<!DOCTYPE html>
<html>
    <head>
        <title>Success Page</title>
        <div class ="suHeadContainer">
        <h1 style="text-align: center;">You have been added to play in sports Tourney</h1>
        <h1 style="text-align:center;">Thanks for playing</h1>
        <p style="text-align:center; font-size: larger;">Redirecting back to sign up in <span id="countdown"></span> seconds"</p>
        </div>
        <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
        </head>
        <body>
            <div class="imgContainer"><img src="Thanks.gif" alt="Thanks" class ="thanksImg"></div>
<script>
    var seconds = 10;
    var countdown = document.getElementById("countdown");

    function updateCountdown(){
        seconds--;
        countdown.innerHTML = seconds;
        if (seconds <= 0){
            clearInterval(interval);
            window.location.href = "http://localhost/home.php";
        }
    }

    var interval = setInterval(updateCountdown, 1000);
</script>
        </body>
        </html>