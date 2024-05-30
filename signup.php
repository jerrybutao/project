<?php
    $reg_email = $reg_password = $reg_Account_Type = "";
    $errMsg = $reg_emailErr = $reg_passwordErr = $reg_Account_TypeErr ="";
    global $success;
    global $isDupp;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["email"])){
            $reg_emailErr = "Email is Required!";
        }else{
            $reg_email = $_POST["email"];
        }
    
        if(empty($_POST["password"])){
            $reg_passwordErr = "Password is Required!";
        }else{
            $reg_password = $_POST["password"];
        }

        if(empty($_POST["account_type"])){
            $reg_Account_TypeErr = "Select Account Type";
        }else{
            $reg_Account_Type = $_POST["account_type"];
        }

        if($reg_email && $reg_password && $reg_Account_Type){
            include("Connections.php");
            $dupp = mysqli_query($Connections,
                "SELECT 
                    *
                FROM 
                    login_table
                WHERE(
                    Email = '$reg_email'
                )"
            );
            if(mysqli_num_rows($dupp) > 0){
                $reg_emailErr = "Email is Already Taken!";
            }else{
                $query = "INSERT INTO login_table(Email, Password, Account_type)
                    VALUES ('$reg_email', '$reg_password', '$reg_Account_Type')";
                mysqli_query($Connections, $query);
                $reg_emailErr = "Account Created Succesfully!";
            }
        }else{
            $errMsg = "Account Creation Failed!<br>";
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="container">
		<h1>SIGN UP</h1>     
		<form action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
            <span class="error"><?php echo $errMsg ?></span>
            <span class="error"><?php echo $reg_emailErr?></span> 
            <label for="Email"> Email: </label>
			<input type="Email" name="email" placeholder="Enter your Email" value="<?php echo $reg_email?>" />
			<span class="error"><?php echo $reg_passwordErr?></span> 
            <label for="password">Password: </label>
			<input type="password" id="password" name="password" placeholder="Enter your Password">
			<select name="account_type">
				<option value="1">Administrator</option>
				<option value="2">User</option>
			</select>
			<div class="button">
				<button type="submit">Sign Up</button>
                <div class="signup">Already have an acccount? 
         <a href="index.php" id="login">Login</a>
          </div>
        </div>
        </div>
</form>
</body>
</html>