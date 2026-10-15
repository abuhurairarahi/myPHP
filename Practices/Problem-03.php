<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "campus_library";
    $db_connect = "";
    
    try {
        $db_connect = mysqli_connect($hostname, $username, $password, $database);
    }
    catch(mysqli_sql_exception $e){
        echo"Not connected" . $e;
    }

    // if($db_connect) {
    //     echo"Connected";
    // }

    //task-01

    $query = "SELECT COUNT(BookTitle) as TotlaBooks, Status
              FROM book_loans
              GROUP BY Status
              HAVING COUNT(LoanID) > 1";
    
    $result = mysqli_query($db_connect, $query);

    while($row = mysqli_fetch_assoc($result)) {
        echo $row['Status'] . " = " . $row['TotlaBooks'] . "<br>";
    }

    /*echo"<table border='1'>";
    echo"<tr>";
    echo"<th>Status</th>";
    echo"<th>Total Books</th>";
    echo"</tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo"<tr>";
        echo"<td>{$row['Status']}</td>";
        echo"<td>{$row['TotalBooks']}</td>";
        echo"</tr>";
    }
    echo"</table>";*/

    //task-02

    $update_status = "Grace Period";
    $update_panaltyFee = 0;

    $query = "UPDATE book_loans
              SET Status = '$update_status', PenaltyFee = $update_panaltyFee
              WHERE Status = 'Overdue' AND DaysOverdue < 7";

    $result = mysqli_query($db_connect, $query);

    if($result) {
        echo"Successfully Updated " . mysqli_affected_rows($db_connect) . " data/s <br>";
    }
    else {
        echo"Error!";
    }

    
?>
