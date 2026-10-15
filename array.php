<?php
    /*
        "array" is generelly, a signle variable which can store multiple data at a time. 
    */

        //initializing an array: (with value)
        $array_one = array(1,2,3,4);

        //initilizing an array: (without value)
        $array_two[] = null;
        $array_three = array(); //also null 

        //printing array: (using foreach-loop)
        foreach($array_one as $index_value) {
            echo"{$index_value} ";
        }
        echo"<br>";

        //printing array: (using for-loop)

        //Before printing the array need to know: "array-size"
        $array_size = count($array_one);
        //it will count how many elements are there in an array.
        //echo"{$array_size}";
        //output: 4
        
        for($index = 0; $index < $array_size; $index++) {
            echo"{$array_one[$index]} ";
        }
        echo"<br>";

        //insert value to array: (using "array_push(array, values)")
        array_push($array_one, 10); //it executes insert-last, now array: 1 2 3 4 10
        
            //can push multiple values at a time
            array_push($array_two, 1,2,3,4,5,6,7,8,9,10);
        
        //insert values to array: (as 2d array)
        array_push($array_three, 
        array( //row = 01
            "Mitsubishi",
            "Toyota",
            "Honda",
            "Mazda",
            "Hyundai"
        ), 
        array( //row = 02
            "Byd",
            "Cherry",
            "Haval",
            "Dfsk",
            "Fiat"
        ));

        //printing a 2d array: (using foreach loop) 
        foreach($array_three as $row_array) {
            foreach($row_array as $index_value) {
                echo"{$index_value} ";
            }
            echo"<br>";
        }
        
        //Reverse, Delete-Last, Delete-First, Merge-Array

        //Reversing Array:
        $reversed_array = array_reverse($array_one);

        foreach($reversed_array as $index_value) {
            echo"{$index_value} ";
        }

?>