<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UIU25se2</title>
</head>
<body>
    <style>
        form {
            width: 300px;
            padding: 10px;
        }
        form div {
            margin-bottom: 5px;
        }
        form input {
            padding: 10px;
            width: 100%;
            margin-bottom: 5px;
        }
        #submit-btn {
            margin-top: 5px;
            width: 50%;
        }

    </style>
    <form action="index.php" method="post">
        <div>Attendees</div>
        <input type="text" name="attendees"> <br>
        <div>Seat Capacity</div>
        <input type="text" name="capacity"> <br>
        <div>Ticket Price</div>
        <input type="text" name="ticket_price"> <br>
        <input type="submit" id="submit-btn" value="Check" name="submit">
    </form> <br>
</body>
</html>

<?php
    session_start();

    if(!isset($_POST["submit"])) {
        $_SESSION["infodesk"] = array();
    }
    elseif(isset($_POST["submit"])) {
        $attendees = $_POST["attendees"];
        $capacity = $_POST["capacity"];
        $ticketPrice = $_POST["ticket_price"];

        $totalScreen = ceil($attendees / $capacity);
        $emptySeats = ($capacity * $totalScreen) - $attendees;
        $wastedMoney = $emptySeats * $ticketPrice;

        array_push($_SESSION["infodesk"], array($attendees, $capacity, $ticketPrice, $totalScreen, $emptySeats, $wastedMoney));

        echo"<table border='1'>";
        echo"<tr>";
        echo "<th>Attendess</th>";
        echo "<th>Seat Capacity</th>";
        echo "<th>Ticket Price</th>";
        echo "<th>Total Screens</th>";
        echo "<th>Empty Seats</th>";
        echo "<th>Wasted Money</th>";
        echo"</tr>";

        foreach($_SESSION["infodesk"] as $info) {
            echo"<tr>";
            foreach($info as $data) {
                echo "<td>{$data}</td>";
            }
            echo"</tr>";
        }
    }
    else{
        echo"Invalid Process";
    }
?>