<?php
    require('./read.php');  
    include("connection.php");
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
</head>
<body>

    <div class="dashboard">
            <ul>
                <li><a href="admin.php">Home</a></li>
                <li><a href="des.php">Description</a></li>
                <li><a href="payroll.php">Create</a></li>
                <li><a href="Logout.php">Logout</a></li>
            </ul>
            <form class="create-main"  action="create.php" method="post">
                <h2>PARKING REQUIREMENTS</h2>
                <label for="Email">EMAIL:</label>
                <input type="email" name="email" required/>
                
                <label for="Firstname">FULLNAME:</label>
                <input type="text" name="fullname" required/>
                
                <label for="platenumber">PLATENUMBER:</label>
                <input type="text" name="platenumber"required/>
                
                <label for="date">DATE:</label>
                <input type="datetime-local" name="date"required/>
                
                <label for="contact">CONTACT</label>
                <input type="int" name="contact"required/>

                <label for="vehicle">VEHICLE</label>
                <input type="text" name="vehicle"required/>
                
                <label for="amount">AMOUNT</label>
                <input type="text" name="amount"required/>
                <input type="submit" name="create" value="SUBMIT"/>
            </form>
            
</div>
        </div>
    </div>
    

    
</body>
</html>