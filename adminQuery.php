<?php

include('db.php');
//
//$var = $_GET['id'];
//echo $var;
$dbhost = "182.50.133.51";
$dbuser = "studDB18A";
$dbpass = "stud18aDB1!";
$dbname = "studDB18A";


$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

//testing connection success
if(mysqli_connect_errno()) {
    die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
    );
}

$id = $_GET['id'];
$description = $_GET['description'];
$job = $_GET['job'];
$req = $_GET['req'];

$updateQuery = "UPDATE tb_careers1_230 SET title='".$job."', responsibilities='".$description."', qualifications='".$req."'WHERE id=".$id;


$deleteQuery = "DELETE FROM tb_careers1_230 WHERE id=" . $_GET['id'];

if($_GET['exefunction'] == "update")
    $result = mysqli_query($connection, $updateQuery);
if($_GET['exefunction'] == "delete")
    $result = mysqli_query($connection, $deleteQuery);
mysqli_close($connection);

if(!$result) {
    echo "DB query failed.";
}

echo $result;

