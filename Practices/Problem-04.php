<?php
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "tourism";

    $db_conn = null;

    try {
        $db_conn = mysqli_connect($hostname, $user, $password, $database);
    }
    catch(mysqli_sql_exception $e) {
        echo"Not Connected" . $e;
    }

    //task-01

    $query = "SELECT SpotName, Region, Rating
              FROM tourist_spot
              WHERE Rating > 4.5 OR SpotName LIKE '%Beach%'
              ORDER BY Rating DESC";

    $result = mysqli_query($db_conn, $query);
    $rank = 1;

    while($row = mysqli_fetch_assoc($result)) {
        echo "Rank: " . $rank . "<br>"; 
        echo "SpotName: " . $row["SpotName"] . "<br>";
        echo "Region: " . $row["Region"] . "<br>";
        echo "Rating: " . $row["Rating"] . "<br>";
        echo "<br><br>";

        $rank++;
    }

    //task-02

    $query = "UPDATE tourist_spot
              SET Rating = Rating + 0.2, 
              EntryFee = EntryFee*1.1
              WHERE (Rating BETWEEN 4.0 AND 4.5) AND EntryFee > 0";

    $result = mysqli_query($db_conn, $query);

    if($result) {
        echo "Successfully Updated " . mysqli_affected_rows($db_conn) . "<br><br>";
    }
    else {
        echo "Error!";
    }

    //task-03

    $query = "SELECT Category, COUNT(SpotID) as TotalSpots, AVG(Rating) as AverageRating, SUM(VisitorPerYear) as TotalVisits
              FROM tourist_spot
              GROUP BY Category
              HAVING AVG(Rating) > 4.4
              ORDER BY AverageRating DESC";

    $result = mysqli_query($db_conn, $query);

    $rank = 1;

    while($row = mysqli_fetch_assoc($result)) {
        echo "Rank: " . $rank . "<br>"; 
        echo "Category: " . $row["Category"] . "<br>";
        echo "Total Spots: " . $row["TotalSpots"] . "<br>";
        echo "Average Rating: " . $row["AverageRating"] . "<br>";
        echo "Total Visits: " . $row["TotalVisits"] . "<br>";
        echo "<br><br>";

        $rank++;
    }

    //task-04

    $query = "SELECT Region, SUM(EntryFee * VisitorPerYear) as Revenue
              FROM tourist_spot
              GROUP BY Region
              HAVING Revenue > 1000000
              ORDER BY Revenue DESC";

    $result = mysqli_query($db_conn, $query);

    $rank = 1;
    while($row = mysqli_fetch_assoc($result)) {
        echo "Rank: " . $rank . "<br>"; 
        echo "Region: " . $row["Region"] . "<br>";
        echo "Revenue: " . $row["Revenue"] . "<br>";
        echo "<br><br>";

        $rank++;
    }
?>