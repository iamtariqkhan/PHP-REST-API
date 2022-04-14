<?php
    header('Content-Type:application/json');//Tells Browser Data in the json format
    header('Access-Control-Allow-Origin:*');//Anybody can access the API
    // $data = json_decode(file_get_contents("php://input"), true);//Get the php input like GET & POST Method
    // $search_value = $data['search'];
    $search_value = isset($_GET['search']) ? $_GET['search'] : die();
    include 'config.php';
    $sql = "SELECT * FROM students WHERE student_name LIKE '%{$search_value}%'";//Using wild card
    $result = mysqli_query($conn, $sql) or die("SQL Query Failed");
    // Check if the record found
    if(mysqli_num_rows($result)>0)
    {
        $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // Convert Data into Json Format
        echo json_encode($output);
    }else{
        echo json_encode(array('message'=>'No Search Found', 'Status'=>false));
    }
?>