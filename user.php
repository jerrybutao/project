<?php
    require('./read.php');  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="user.css">
</head>
<body>
    <div class="dashboard">

            <ul>
                <li><a href="Logout.php">Logout</a></li>
            </ul>
        
            <table class="container">
            <tr>
                <th>ID</th>
                <th>EMAIL</th>
                <th>FULLNAME</th>
                <th>PLATENUMBER</th>
                <th>DATE</th>
                <th>CONTACT</th>
                <th>VEHICLE</th>
                <th>AMOUNT</th>
            </tr>
            <?php while($results = mysqli_fetch_array($sqlAccounts)) { ?>
            <tr>
                <td><?php echo $results['id']?></td>
                <td><?php echo $results['email']?></td>
                <td><?php echo $results['fullname']?></td>
                <td><?php echo $results['platenumber']?></td>
                <td><?php echo $results['date']?></td>
                <td><?php echo $results['contact']?></td>
                <td><?php echo $results['vehicle']?></td>
                <td><?php echo $results['amount']?></td>
            </tr>
            <?php } ?>
        </table>
        </div>
    </div>
</body>
</html>