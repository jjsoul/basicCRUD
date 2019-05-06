<?php

require_once 'session.php';

session_start();

if(isset($_POST['login'])) {
    $name = $_POST['username'];
    $location = $_POST['location'];

    if($name >   0 && $location > 0) {
        echo 'hoi';
        $mysqli = new mysqli('localhost', 'root', 'root', 'crud');
        $query = $mysqli->query("SELECT * FROM users") or die (mysqli_error($mysqli));

        $result = mysqli_query($mysqli, $query);

        if(mysqli_num_rows($result) == 1) {

            session_start();
            $_SESSION['username'] = $name;

            header("location: crud.php");
        }
    }

    else {
        header("location: index.php");
    }

}
