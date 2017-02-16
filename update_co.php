<?php
/**
 * Created by PhpStorm.
 * User: ajmul
 * Date: 2/16/2017
 * Time: 10:13 PM
 */
function updateComm($pccomm, $pcsave, $vuln, $reason, $jobstat, $evid){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "RTT_2";
    $conn = new mysqli($servername, $username, $password, $dbname);



    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "Update commentdata SET Portfolio_Comment = '$pccomm' , PC_Date_Saved = '$pcsave', Vulnerable_Client = '$vuln', Reason_For_React =  '$reason'
            , Job_Status = '$jobstat' WHERE caseNo = $evid";


    if ($conn->query($sql) === TRUE) {
        echo "Table Users created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }


    $conn->close();
}
$q = $_REQUEST["q"];
$r = $_REQUEST["r"];
$s = $_REQUEST["s"];
$t = $_REQUEST["t"];
$u = $_REQUEST["u"];
$v = $_REQUEST["v"];

updateComm($q, $s, $t, $u, $v,$r);

//updateComm("Hello","01/02/2013", "Yes", "Cuz", "Unemployed", 1);

?>