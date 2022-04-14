<?php
    header('Content-Type:application/json');//Tells Browser Data in the json format
    header('Access-Control-Allow-Origin:*');//Anybody can access the API
    header('Access-Control-Allow-Methods:DELETE');//Specify the Request Method
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods,Authorization, X-Requested-With'); //Specify the Restriction only these headers can be used
    $data = json_decode(file_get_contents("php://input"), true);//Get the php input like GET & POST Method
    $id = $data['sid'];
    // $name = $data['sname'];
    // $age = $data['sage'];
    // $city = $data['scity'];
    include 'config.php';
    $sql = "DELETE FROM students WHERE id = {$id}";
    // $result = mysqli_query($conn, $sql) or die("SQL Query Failed");
    // Check if the record found
    if(mysqli_query($conn, $sql))
    {
        // $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // Convert Data into Json Format
        echo json_encode(array('message'=>'Student Record Deleted.', 'Status'=>true));
    }else{
        echo json_encode(array('message'=>'Student Record Not Deleted.', 'Status'=>false));
    }
?>