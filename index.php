<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<style>

    body{
        width:100vw;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        gap: 20px;
    }
</style>

<body>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="lastName">Last Name:</label>
    <input type="text" id="lastName" name="lastName" required>

    <label for="age">Age:</label>
    <input type="text" id="age" name="age" required>

    <button type="submit" name="saveUser">Submit</button>

</form>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <button type="submit" name="getUser">Get Users</button>
</form>

</body>
</html>


<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dataBase = "user_dev";

$connexion = mysqli_connect($serverName, $userName, $password, $dataBase);

if (!$connexion) {
    die("Connection failed: " . mysqli_connect_error());
}


if (isset($_POST['saveUser'])) {
    $name = htmlspecialchars($_POST['name']);
    $lastName = htmlspecialchars($_POST['lastName']);
    $age = htmlspecialchars($_POST['age']);

    $query = mysqli_prepare($connexion, "INSERT INTO users (name, lastName, age, status) VALUES (?, ?, ?, ?)");

    if ($query) {
        $status = 0; // 0 : no active - 1 : active

        mysqli_stmt_bind_param($query, "ssii", $name, $lastName, $age, $status);
        mysqli_stmt_execute($query);

        echo "<p>User registered.</p>";
    } else {
        echo "<p>Error to registered user.</p>";
    }

}

if (isset($_POST['getUser'])) {
    $fetch = "SELECT id, name, lastName, age, status FROM users";
    $result = mysqli_query($connexion, $fetch);

    if (mysqli_num_rows($result) > 0) {

        echo "<table>";
        echo "<tr><th>Id</th><th>Name</th><th>Last Name</th><th>Age</th><th>Status</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["lastName"] . "</td><td>" . $row["age"] . "</td><td>" . $row["status"] . "</td></tr>";
        }

        echo "</table>";

    }
}

?>
