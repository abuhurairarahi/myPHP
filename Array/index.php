<?php
    //array: "Variable" which can hold multiple values in a single variable

    $cars = array();
    //array() is a function that creates an array in PHP. Eg. we are creating an empty array called $cars.

    //accessing array values using index numbers
    $cars[0] = "Mitsubishi Pajero";
    $cars[1] = "Toyota Esquire";
    $cars[2] = "Mitsubishi L200";
    $cars[3] = "Toyota Land Cruiser";

    //can insert values in an array using index numbers or without index numbers. Eg. $cars[] = "Toyota Land Cruiser";
    //using array_push() function to add values to an array
    array_push($cars, "Mitsubishi Outlander");
    array_push($cars, "Hyundai Tucson");
    array_push($cars, "Honda CR-V");

    //using array_pop() function to remove the last value from an array
    array_pop($cars);
    //last element "Honda CR-V" will be removed from the array

    //using array_shift() function to remove the first value from an array
    array_shift($cars);
    //first element "Mitsubishi Pajero" will be removed from the array

    $reverseCars = array_reverse($cars);
    //using array_reverse() function to reverse the order of the array values

    //using array_count() function to get the number of elements in an array
    $countCars = count($cars);

    //using array_merge() function to merge two arrays
    $garageAcars = array("Nissan X-Trail", "Mazda CX-5", "Hyundai Tucson");
    $allCars = array_merge($cars, $garageAcars);

    //using array_unique() function to remove duplicate values from an array
    $uniqueCars = array_unique($allCars);
    foreach($uniqueCars as $car) {
        echo $car . "<br>";
    }
    //as "Hyundai Tucson" is present in both arrays, it will be removed from the merged array

    //using array_search() function to search for a value in an array
    $searchResult = array_search("Toyota Land Cruiser", $uniqueCars);

    //using array_slice() function to get a portion of an array
    $slicedCars = array_slice($uniqueCars, 2, 3);
    /*
    start index = 2
    Next 3 elements will be sliced from the array
    means index 2, 3, 4 elements will be sliced from the array
    */
    echo"<br>";
    foreach($slicedCars as $car) {
        echo $car . "<br>";
    }
    ?>