<?php

    include('db.php');

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

    if(isset($_POST['username'], $_POST['email'], $_POST['phone'], $_POST['subscription'], $_POST['bill'])) {
        //escape variables for security
        $user = mysqli_real_escape_string($connection, $_POST['username']);
        $company = mysqli_real_escape_string($connection, $_POST['company']);
        $mail = mysqli_real_escape_string($connection, $_POST['email']);
        $tel = mysqli_real_escape_string($connection, $_POST['phone']);
        $sub = mysqli_real_escape_string($connection, $_POST['subscription']);
        $sat = mysqli_real_escape_string($connection, $_POST['satisfaction']);
        $bill = mysqli_real_escape_string($connection, $_POST['bill']);
        $array_interest = implode(",", $_POST['interests']);

        $query_form = "INSERT INTO tb_users_230(name,company,email,phone,subscribe,isSatisfay,lastBill,interests) 
                            VALUES ('$user' , '$company', '$mail', '$tel', '$sub', '$sat', '$bill', '$array_interest')";

        mysqli_query($connection, $query_form);
    }

    mysqli_close($connection);

    header('Location: index.php');