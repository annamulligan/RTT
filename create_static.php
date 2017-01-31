<?php
/**
 * Created by PhpStorm.
 * User: ajmul
 * Date: 1/31/2017
 * Time: 9:19 PM
 */

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "RTT";

    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    $sql = "CREATE DATABASE RTT";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }
    $conn->close();


    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // sql to create table
    $sql = "CREATE TABLE StaticData (
    eventid INT(6) PRIMARY KEY, 
    CaseOwner VARCHAR(30) NOT NULL,
    Age Int(6) NOT NULL
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table StaticData created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }



    $sql = "INSERT INTO StaticData (eventid, CaseOwner, Age)
    VALUES (225,'John Smitt', 16)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "INSERT INTO StaticData (eventid, CaseOwner, Age)
        VALUES (245,'John Smitt', 18)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql = "INSERT INTO StaticData (eventid, CaseOwner, Age)
        VALUES (2125,'John Smitt', 45)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();

?>