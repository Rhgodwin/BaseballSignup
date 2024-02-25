<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
	<title>New Employee Registration</title>
	<link rel="stylesheet" href="style.css" type="text/css">
    <nav>   
        <div class="top"> 
        <h1>Innovative Solutions Corporation<br> New Employee Registration</h1>
</div>
<div class="login">
<form action="newEmpReg.php" method="post">
<label for="username">
				<i class="fas fa-user"></i>
			</label>
			<input type="text" name="username" placeholder="Employee Name(First Last)" id="username" required>
			<label for="newPassword">
				<i class="fas fa-lock"></i>
			</label>
            <input type="password" name="newPassword" placeholder="Enter Password" id="newPassword" required>
            <label for="conPassword">
				<i class="fas fa-lock"></i>
            </label>
			<input type="password" name="conPassword" placeholder="Confirm Password" id="conPassword" required>

            <input type="submit" value="Create Employee Account" action="newEmpReg.php">
			
		</form>
</div>
</nav>
    </head>
    <body>
    </body>
</html>