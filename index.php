<!DOCTYPE html>
<?php
require_once 'process.php';
?>

<head>
    <title>LOG IN!!</title>
</head>
<html>
    <body>
        <form method="post" action="login.php">
            <input type="text" name="username" placeholder="naam">
            <input type="text" name="location" placeholder="locatie">
            <button type="submit" name="login">Log in</button>
        </form>
    </body>
</html>