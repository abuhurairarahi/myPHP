<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UIU253</title>
</head>
<body>
    <style>
        form {
            width: 300px;
        }
        form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }
        form div {
            margin-bottom: 5px;
        }
        #submit-btn {
            width: 50%;
            margin-top: 10px;
        }
    </style>
    <form action="index.php" method="post">
        <div>Number of items sold per day</div>
        <input type="text" name="solditem"> <br>
        <div>Number of days the sale runs</div>
        <input type="text" name="saleruns"> <br>
        <div>Target number of items to be sold</div>
        <input type="text" name="target"> <br>
        <input type="submit" value="Calculate" id="submit-btn" name="submit">
    </form>
</body>
</html>

<?php
    session_start(); //SGV; multible data can be stored

    if(!isset($_POST["submit"])) {
        $_SESSION["infoDesk"] = array();
    }
    elseif(isset($_POST["submit"])){
        $_SESSION["infoDesk"] = array();
        $_SESSION["soldItem"] = $_POST["solditem"];
        $_SESSION["saleruns"] = $_POST["saleruns"];
        $_SESSION["target"] = $_POST["target"];


        $_SESSION["totalSold"] = $_SESSION["soldItem"] * $_SESSION["saleruns"];
        $performanca_status = null;

        if($_SESSION["totalSold"] >= 500) {
        $performanca_status = "Excellent";
        }
        elseif($_SESSION["totalSold"] >= 300 && $_SESSION["totalSold"] < 500){
        $performanca_status = "Good";
        }
        elseif($_SESSION["totalSold"] >= 150 && $_SESSION["totalSold"] < 300){        
        $performanca_status = "Average";
        }
        else{
        $performanca_status = "Poor";
        }

        $result_status = null;
        if($_SESSION["target"] == $_SESSION["totalSold"]) {
            $result_status = "Target met exactly 0";
        }
        elseif($_SESSION["target"] > $_SESSION["totalSold"]) {
            $diff = $_SESSION["target"] - $_SESSION["totalSold"];
            $result_status = "Below traget by $diff";
        }
        elseif($_SESSION["target"] < $_SESSION["totalSold"]) {
            $diff = $_SESSION["totalSold"] - $_SESSION["target"];
            $result_status = "Above target by $diff";
        }

        array_push($_SESSION["infoDesk"], array(
        $_SESSION["soldItem"],
        $_SESSION["saleruns"],
        $_SESSION["target"],
        $_SESSION["totalSold"],
        $performanca_status,
        $result_status
        ));

        echo"<table border='1'>";
        echo"<tr>";
        echo"<th>Items Sold</th>";
        echo"<th>Number of sale</th>";
        echo"<th>Target</th>";
        echo"<th>Total Items</th>";
        echo"<th>Performance</th>";
        echo"<th>Result</th>";
        echo"</tr>";

        foreach($_SESSION["infoDesk"] as $info){ 
        echo"<tr>";
            foreach($info as $data) { 
                echo"<td>{$data}</td>"; 
            }
        echo"</tr>"; 
        }
    }
    else {
        echo"Input valid data";
    }  
?>