<!DOCTYPE HTML>
<html>
<head>
</head>
<body>

<?php
// define variables and set to empty values
$name = $pass = $pass1 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $pass = hash( "sha256", test_input($_POST["pw"]));
    $pass1 = hash( "sha256", test_input($_POST["pw1"]));

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: <input type="text" name="name">
    <br><br>
    Password: <input type="password" name="pw">


    <br><br>
    Re-Enter Password: <input type="password" name="pw1">


    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
if ($name !="") {
    if (strcmp($pass1, $pass) == 0) {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "RTT";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //echo "Connected successfully";
        $sql = "INSERT INTO Users (username, password)
            VALUES ('$name', '$pass')";

        if ($conn->query($sql) === TRUE) {
            echo "New User $name added";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Passwords do not match";
    }
}
?>