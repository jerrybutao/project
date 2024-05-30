<?php
    require('Connections.php');

    $queryAccounts = "SELECT * FROM vehicle";
    $sqlAccounts = mysqli_query($Connections, $queryAccounts);

?>