<?php
    header("Content-Type: JSON");
//     header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// header("Access-Control-Allow-Credentials: true");
// header("Content-Type: application/json; charset=UTF-8");
    $host= 'localhost';
    $username= 'root';
    $password='';
    $database='jobsite_1stop';

    $conn= mysqli_connect($host,$username,$password,$database);

    if($conn->connect_error){
        http_response_code(500);
        exit( json_encode([
            'status'=>500,
            'message'=>'Error in server',
          ]));
    }
    else{
      $query="SELECT * FROM jobs";
      $result=mysqli_query($conn,$query);
      if($result){
        $i=0;$response;
        while($row=mysqli_fetch_assoc($result)){
            $response[$i]['company']=$row['company'];
            $response[$i]['role']=$row['role'];
            $response[$i]['skills']=$row['skills'];
            $response[$i]['description']=$row['description'];
            $response[$i]['openings']=$row['openings'];
            $response[$i]['ctc']=$row['ctc'];
            $response[$i]['email']=$row['email'];
            $response[$i]['linkedin']=$row['linkedin'];
            $i++;
        }
        echo(json_encode($response,JSON_PRETTY_PRINT));
      }
      else{
        http_response_code(401);
        exit( json_encode([
            'status'=>401,
            'message'=>'Please try again',
          ]));
      }
    }
?>