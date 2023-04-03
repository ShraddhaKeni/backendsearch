<?php
include_once './config/database.php';

header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$conn = null;

$databaseService = new DatabaseService();
$conn = $databaseService->getConnection();
$data = json_decode(file_get_contents("php://input"));

 $journeydetails = $data->journeydetails;
 $name = $data->name;
 $mobile = $data->mobile;
 $email = $data->email;
 
$table_name = 'booking';

$query = "INSERT INTO $table_name (JOURNEYDETAILSID,NAME,MOBILE,EMAIL)
VALUES ('$journeydetails', '$name', '$mobile', '$email')";

$statement = $conn->prepare($query);


      $statement->execute();
     
    echo $query;
     if($query){
         
        //$row = $statement->fetch(PDO::FETCH_ASSOC);
       
        http_response_code(200);
        echo json_encode(
            array(
                "status" => 200,
                "message" => "Details inserted successfully."
            ));
       
     }else{
        
        http_response_code(401);
        echo json_encode(array("message" => "Failed."));
     }
     
?>