<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'crud') or die(mysqli_error($mysqli));

if (isset($_POST['save'])){
    $name = $_POST['name'];
    $course = $_POST['course'];

    $mysqli->query("INSERT INTO course (name, course) VALUES('$name', '$course')") or 
        die($mysqli->error);

    $_session['message'] = "Record haas been saved";
    $_session['msg_type'] = "success";

    header("location:index.php");
}


if(isset($GET['delete'])){
    $id = $GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

    $_session['message'] = "Record haas been deleted";
    $_session['msg_type'] = "danger";

    header("location: index.php");
}