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

    $query = "SELECT COUNT(BookTitle) as TotalBooks, Status
              FROM book_loans
              GROUP BY Status
              HAVING COUNT(LoanID) > 1";
    
    $result = mysqli_query($db_connect, $query);

    /*while($row = mysqli_fetch_assoc($result)) {
        echo $row['Status'] . " = " . $row['TotlaBooks'] . "<br>";
    }*/

    echo"<table border='1'>";
    echo"<tr>";
    echo"<th>Status</th>";
    echo"<th>Total Books</th>";
    echo"</tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo"<tr>";
        echo"<td>{$row["Status"]}</td>";
        echo"<td>{$row["TotalBooks"]}</td>";
        echo"</tr>";
    }
    echo"</table>";

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

    //task-03

    $query = "UPDATE book_loans
              SET PenaltyFee = PenaltyFee*1.1
              WHERE PenaltyFee > 20 AND PenaltyFee*1.1 <= 50";

    $result = mysqli_query($db_connect, $query);

    if($result) {
        echo"Successfully increased! " . mysqli_affected_rows($db_connect) . " data/s";
    }
    else {
        echo"Error!";
    }
    echo"<br>";

    //task-04 

    $query = "SELECT sum(PenaltyFee) as totalFee, BookTitle
              FROM book_loans
              GROUP BY BookTitle
              ORDER BY totalFee DESC";

    $result = mysqli_query($db_connect, $query);

    $rank = 1;
    /*while($row = mysqli_fetch_assoc($result)) {
        echo $rank . ". " . $row["BookTitle"] . " - " . $row["totalFee"] . "<br>";
        $rank++;
    }*/

    echo"<table border='1'>";
    echo"<tr>";
    echo"<th>Rank</th>";
    echo"<th>Book Title</th>";
    echo"<th>Total Fees</th>";
    echo"</tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo"<tr>";
        echo"<td>$rank</td>";
        echo"<td>{$row["BookTitle"]}</td>";
        echo"<td>{$row["totalFee"]}</td>";
        echo"</tr>";

        $rank++;
    }
?>
