<?php
    header('Content-Type:application/json');//Tells Browser Data in the json format
    header('Access-Control-Allow-Origin:*');//Anybody can access the API
    $data = json_decode(file_get_contents("php://input"), true);//Get the php input like GET & POST Method
    $student_id = $data['sid'];//Change the id name for security reason becoz in the database its id
    include 'config.php';
    $sql = "SELECT * FROM students WHERE id = {$student_id}";
    $result = mysqli_query($conn, $sql) or die("SQL Query Failed");
    // Check if the record found
    if(mysqli_num_rows($result)>0)
    {
        $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // Convert Data into Json Format
        echo json_encode($output);
    }else{
        echo json_encode(array('message'=>'No Record Found', 'Status'=>false));
    }
?>