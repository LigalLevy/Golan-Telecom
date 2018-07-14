<?php
    //create a mySQL DB connection:
    $dbhost = "182.50.133.51";
    $dbuser = "studDB18A";
    $dbpass = "stud18aDB1!";
    $dbname = "studDB18A";

    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if(!mysqli_set_charset($connection, 'utf8')) {
        echo 'the connection is not in utf8';
        exit();
    }


//testing connection success
    if(mysqli_connect_errno()) {
        die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
        );
    }

    function makeQuery ($connection , $query) {
        $result = mysqli_query($connection, $query);
        if(!$result) {
            die("DB query failed.");
        }

        return $result;
    }

