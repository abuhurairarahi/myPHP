<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <style>
        form {
            width: 400px;
        }

        form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        #submitbtn {
            width: 200px;
        }
    </style>
    
    <form action="" method="post">
        <input type="text" name="creditpercourse" placeholder="Credits earned per course"> <br>
        <input type="text" name="completedcourses" placeholder="Number of courses completed"> <br>
        <input type="text" name="targetcredits" placeholder="Target graduation credits"> <br>
        <input type="submit" id="submitbtn" name="submit" value="Calculate">
    </form>
</body>
</html>

<?php
    
    $infoTable = array();

    if(isset($_POST["submit"])) {
    $cpc = (int)($_POST["creditpercourse"]);
    $comCourse = (int)($_POST["completedcourses"]);
    $trgCredit = (int)($_POST["targetcredits"]);

    $totalCredit = $cpc * $comCourse;
    $progressStatus = "";
    $resultStatus = "";

    if($totalCredit >= 120) {
        $progressStatus = "Excellent";
    }
    elseif($totalCredit >= 90 &&$totalCredit < 120) {
        $progressStatus = "Good";
    }
    elseif($totalCredit >= 60 &&$totalCredit < 90) {
        $progressStatus = "Average";
    }
    else {
        $progressStatus = "Poor";
    }

    if($totalCredit === $trgCredit) {
        $resultStatus = "Target met exactly (0 difference)";
    }
    elseif($totalCredit > $trgCredit){
        $diff = $totalCredit - $trgCredit;
        $resultStatus = "Above target by $diff";
    }
    elseif($totalCredit < $trgCredit){
        $diff = $trgCredit - $totalCredit;
        $resultStatus = "Bellow target by $diff";
    }

    array_push($infoTable, array($cpc, $comCourse, $trgCredit, $totalCredit, $progressStatus, $resultStatus));

    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Credits/Course</th>";
    echo "<th>Courses Completed</th>";
    echo "<th>Target Credits</th>";
    echo "<th>Total Credits</th>";
    echo "<th>Progress</th>";
    echo "<th>Result</th>";
    echo "</tr>";

    foreach($infoTable as $info) {
        echo"<tr>";

            foreach($info as $data) {
                echo"<td>$data</td>";
            }

        echo"</tr>";
    }
    echo "</table>";
    }
?>