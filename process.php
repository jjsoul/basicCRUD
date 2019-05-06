<?php

$mysqli = new mysqli('localhost', 'root', 'root', 'crud') or die(mysqli_error($mysqli));

$update = false;
$name = '';
$location = '';

if(isset($_POST['save'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];

    $mysqli->query("INSERT INTO users (name, location) VALUES ('$name', '$location')") or die($mysqli->error);


    $_SESSION['message'] = "Saved";
    $_SESSION['msg_type'] = "success";

    header("location: crud.php");

}

if(isset($_GET['delete'])) {

    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM users WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Deleted";
    $_SESSION['msg_type'] = "danger";

    header("location: crud.php");

}

if(isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $mysqli->query("SELECT * FROM users WHERE id=$id") or die($mysqli->error);
    $update = true;

    if(count($result)==1){
        $row = $result->fetch_array();
        $name = $row['name'];
        $location = $row['location'];
    }
}
















