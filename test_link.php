<!DOCTYPE HTML>
<html>
<head>
</head>
<body>

<?php
// define variables and set to empty values
$name = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $pass = hash( "sha256", test_input($_POST["pw"]));

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
    <input type="submit" name="submit" value="Submit">
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "RTT";
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT password FROM Users where username = '$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row

    while ($row = $result->fetch_assoc()) {
        //echo $row['password'];
        if (strcmp($row['password'],$pass)==0){
            //echo "Password correct";

        }else{
            echo " Incorrect password";

        }
    }


}else{
    echo "Username does not exist";
}





?>

</body>
</html>