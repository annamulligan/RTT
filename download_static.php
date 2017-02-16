<?php
/**
 * Created by PhpStorm.
 * User: ajmul
 * Date: 1/31/2017
 * Time: 9:04 PM
 */

    function getStatic($ReportOwner){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "RTT_2";
        $conn = new mysqli($servername, $username, $password, $dbname);



        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM staticdata where CO_name ='" . $ReportOwner . "'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row

           while($row = $result->fetch_assoc()) {

               $dbArray[] = $row;

            }
            //send the array with all the data for given case owner
            echo json_encode($dbArray);


        } else {
            echo "0 results";
        }
        $conn->close();
    }

//function to get the static data and the comment data for a given report.
//echos the result as a JSON encoded array
function getStaticAndComms($ReportOwner){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "RTT_2";
    $conn = new mysqli($servername, $username, $password, $dbname);

    $a = preg_split("~\s+~",$ReportOwner);
    $str = join("", $a);
    //echo $str;
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DROP TABLE IF EXISTS ". $str ;
    if ($conn->query($sql) === TRUE) {
        //echo "Table " .$str . " dropped successfully";
    } else {
        //echo "Error creating table: " . $conn->error;
    }
   // echo " !!!!!!!!!!!! ";

    $sql = "CREATE TABLE ". $str ."
    (SELECT     StaticData.*,
                CommentData.*
    from StaticData
          LEFT JOIN CommentData
              ON StaticData.EventId = CommentData.caseNo
              where CO_name ='".$ReportOwner."')" ;

    if ($conn->query($sql) === TRUE) {
        //echo "Table StaticData created successfully";
    } else {
       // echo "Error creating table: " . $conn->error;
    }



    $sql = "SELECT * FROM ". $str ;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row

        while($row = $result->fetch_assoc()) {

            $dbArray[] = $row;

        }
        //send the array with all the data for given case owner
        echo json_encode($dbArray);


    } else {
        echo "0 results";
    }
    $conn->close();
}

  $q = $_REQUEST["q"];
   getStaticAndComms($q);


?>

