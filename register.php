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
<form action="newEmpClass.php" method="post">
<label for="username">
				<i class="fas fa-user"></i>
			</label>
			<input type="text" name="username" placeholder="Employee Name(First Last)" id="username" required>
			<label for ="empEmail">
            <i class="fas fa-lock"></i>
</label>
<input type ="text" name="empEmail" placeholder="Enter Employee Email" id="empEmail" required>
            <label for="newPassword">
				<i class="fas fa-lock"></i>
			</label>
            <input type="password" name="newPassword" placeholder="Enter Password" id="newPassword" oninput="check()" required>
            <label for="conPassword">
				<i class="fas fa-lock"></i>
            </label>
			<input type="password" name="conPassword" placeholder="Confirm Password" oninput ="check()" id="conPassword" required>

            <input type="submit" value="Create Employee Account" >
			
		</form>
</div>
</nav>
    </head>
    <body>
        <script>
            function check (){
                var input = document.getElementById('conPassword');
                if (input.value != document.getElementById('newPassword').value){
                    input.setCustomValidity('Password Must Be Matching');
                }else{
                    input.setCustomValidity('');
                }
            }        
            
            </script>
    </body>
</html>