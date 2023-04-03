<?php
include_once './config/database.php';

header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$origin = '';
// $destination = '';
// $no_of_passengers = '';
// $departuredate = '';
$conn = null;

$databaseService = new DatabaseService();
$conn = $databaseService->getConnection();
// if ($conn) {
//      echo "Connected!";
//    } else {
//      echo "Connection Failed";
//    }
$data = json_decode(file_get_contents("php://input"));

 $origin = $data->origin;
 $destination = $data->destination;
 $no_of_passengers = $data->no_of_passengers;
 $departuredate = $data->departuredate;

if( $origin== $destination){
  echo "Origin and Destination cannot be same";
  exit;
}

if (empty ($origin)) {  
  echo "Origin is required";  
  exit;
}elseif(empty ($destination)) {  
  echo "Destination is required";  
  exit;
}elseif(empty ($no_of_passengers)) {  
  echo "No of passengers is required";  
  exit;
}elseif(empty ($departuredate)) {  
  echo "Departure date is required";  
  exit;
}

$table_name = 'journey_details';
 $query = ("SELECT * FROM $table_name  WHERE FLIGHTORIGINID LIKE '%{$origin}%' AND FLIGHTDESTINATIONID LIKE '%{$destination}%'
 AND AVAILABLESEAT LIKE '%{$no_of_passengers}%' AND DEPARTURE LIKE '%{$departuredate}%'");

//$query = ("SELECT * FROM $table_name");

// $result = mysqli_query($conn, $query) or die("SQL failed");
// $output = mysqli_fetch_all($result, MYSQLI_ASSOC);

//echo json_encode($output);
$statement = $conn->prepare($query);

// $statement = $conn->prepare('SELECT * FROM journey_details WHERE FLIGHTORIGINID = ? AND FLIGHTDESTINATIONID = ? 
//      AND AVAILABLESEAT = ? AND DEPARTURE = ?');

      $statement->execute();
      $num = $statement->rowCount();
      // echo "hi";
      // exit;
      // echo   $query;
     if($num > 0){
          //print("if") ;
        $row = $statement->fetch(PDO::FETCH_ASSOC);
          //return $row;
        //console.log($row);
        http_response_code(200);
        echo json_encode(
            array(
                "status" => 200,
                "message" => "Searched details.",
                "det" => $row
            ));
        // header("Content-Type:application/json; charset=utf-8", true);
        //  echo json_encode(array("abc"=>'successfuly registered'));
     }else{
         //print("else") ;
        http_response_code(401);
        echo json_encode(array("message" => "Failed."));
     }
     
?>