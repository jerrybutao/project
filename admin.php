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
      <!-- modal css -->
      <style>
/* Modal Content/Box */

.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0,0,0,0.4);
  
}

.modal-content {
  border-radius: 25px;
  background-image:linear-gradient(lightblue, white);
  box-shadow: 5px 5px 17px #000,
              -5px -5px 17px #add8e6;
  padding: 10px;
  border: 1px solid #add8e6; /* Yellow border */
  width: 80%;
  position: fixed;
  top: 20%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.close {
  color: #000; /* Black text color */
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #333; /* Dark gray text color on hover */
  text-decoration: none;
  cursor: pointer;
}
</style>
    <div class="dashboard">
            <ul>
                <li><a href="admin.php">Home</a></li>
                <li><a href="des.php">Description</a></li>
                <li><a href="payroll.php">Create</a></li>
                <li><a href="Logout.php">Logout</a></li>
            </ul>
            <h2><center>RECORDS<center></h2>
            <table class="container">
            <tr>
            <th>ID</th>
            <th>Email</th>
            <th>FULLNAME</th>
            <th>PLATENUMBER</th>
            <th>DATE</th>
            <th>CONTACT</th>
            <th>VEHICLE</th>
            <th>AMOUNT</th>
            <th>Action</th>
        </tr>
        <?php
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);
      include("connection.php");
        // Modified SQL query to select specific attributes
        $sql = "SELECT id, email, fullname, platenumber, date, contact, vehicle, amount FROM vehicle";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["email"] . "</td><td>" .
                    $row["fullname"] . "</td><td>" . $row["platenumber"] . "</td><td>" .
                    $row["date"] . "</td><td>" . $row["contact"] . "</td><td>" .
                    $row["vehicle"] . "</td><td>" . $row["amount"] . "</td><td>" . 
                    "<button class='action-button view-button' onclick='viewinfo(" . $row["id"] . ")'>View</button>" .
                    "<button class='action-button update-button' onclick='updateinfo(" . $row["id"] . ")'>Update</button>" .
                    "<button class='action-button delete-button' onclick='deleteinfo(" . $row["id"] . ")'>Delete</button></td></tr>";
            }
        } else {
            echo "<tr><td colspan='5'>0 results</td></tr>";
        }

        // Closing database connection
        mysqli_close($conn);
        ?> 
    </table>
</div>
        </div>
    </div>
    <div id="myModal" class="modal" style="display: none;">
    <div class="modal-content" style="margin: 15% auto; width: 50%;">
        <span class="close" onclick="closeModal()">×</span>
        <div id="modalContent"></div>
    </div>
</div>

    <script>
function viewinfo(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("modalContent").innerHTML = this.responseText;
            document.getElementById("myModal").style.display = "block"; 
        }
    };
    xhttp.open("GET", "view.php?id=" + id, true);
    xhttp.send();
}

function updateinfo(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("modalContent").innerHTML = this.responseText;
            document.getElementById("myModal").style.display = "block"; 
        }
    };
    xhttp.open("GET", "update.php?id=" + id, true);
    xhttp.send();
}

function deleteinfo(id) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            window.location.href = "admin.php";
        }
    };
    xhttp.open("GET", "delete.php?id=" + id, true);
    xhttp.send();
}

function closeModal() {
    document.getElementById("myModal").style.display = "none"; 
}
</script>
</body>
</html>