<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Success Page</title>
        <div class ="suHeadContainer">
        <h1 style="text-align: center;">Sorry that position was already filled by</h1>
        <h1 style="text-align:center;"><?= $_SESSION['name'] ?></h1>
        <p style="text-align:center; font-size: larger;">Redirecting back to sign up in <span id="countdown"></span> seconds"</p>
        </div>
        <link href="style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css">
        </head>
        <body>
            <div class="imgContainer"><img src="charliebrown.gif" alt="Thanks" class ="thanksImg"></div>
<script>
    var seconds = 6;
    var countdown = document.getElementById("countdown");

    function updateCountdown(){
        seconds--;
        countdown.innerHTML = seconds;
        if (seconds <= 0){
            clearInterval(interval);
            window.location.href = "home.php";
        }
    }

    var interval = setInterval(updateCountdown, 1000);
</script>
        </body>
        </html>