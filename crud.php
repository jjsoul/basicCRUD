<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>


<body>
<?php require_once 'process.php' ?>

<?php

if(isset($_SESSION['message'])): ?>

<div class="alert <?php echo $_SESSION['msg_type']?>">
    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    ?>
</div>

<?php endif; ?>
<?php
    $mysqli = new mysqli('localhost', 'root', 'root', 'crud') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM users") or die($mysqli->error);
//    pre_r($result);
    ?>

    <div class="container">
        <table class="customers">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>

            <?php while ($row = $result->fetch_assoc()):?>
                    <tr>
                        <td> <?php echo $row['name']; ?></td>
                        <td> <?php echo $row['location']; ?></td>
                        <td>
                            <a class="a edit" href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
                            <a class="a delete" href="process.php?delete=<?php echo $row['id'] ?>">Delete</a>
                        </td>
                    </tr>
        <?php endwhile; ?>
        </table>


<?php
    function pre_r($array) {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
?>

<div class="formcontainer">
    <form action="process.php" method="POST" class="form">
        <input type="hidden" value="id">

        <div class="adduser">
            <p>Add user</p>
        </div>
        <label>Name</label>
        <input type="text" name="name" autocomplete="off" value="<?php echo $name; ?>" placeholder="Enter your name..."><br>

        <label>Location</label>
        <input type="text" name="location" autocomplete="off" value="<?php echo $location; ?>" placeholder="Enter your location..."><br>

        <?php if($update==true): ?>
        <button type="submit" name="update">Update</button>

        <?php else: ?>
        <button type="submit" name="save">Save</button>
        <?php endif; ?>
    </form>
</div>
    </div>

</body>
</html>