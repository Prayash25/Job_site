<?php
session_start();
    header("Content-Type: JSON");
    include_once './../database/db.php';
    include './../vendor/autoload.php';
    use \Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    function getLocalIp()
    { return gethostbyname(trim(`hostname`)); }

$conn= mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
  
if(!isset($_SESSION['jwt'])|| empty($_SESSION['jwt'])) {
        http_response_code(404);
        exit( json_encode([
            'status'=>404,
            'message'=>'session expired',
          ]));
    } 
else{
    $jwt=$_SESSION["jwt"];
    $secret_key="Job_site";
    $jwt_data=JWT::decode($jwt,new Key($secret_key,'HS256'));
    $data=$jwt_data->data;
    $email=$data->email;
    if($conn->connect_error){
        http_response_code(500);
        exit( json_encode([
            'status'=>500,
            'message'=>'Error in server',
          ]));
    }
    else{
      $query="SELECT * FROM candidates WHERE jobber_email='$email' GROUP BY(role) ORDER BY (id) ASC;
      ";
      $result=mysqli_query($conn,$query);
      if($result){
        $i=0;$response;
        while($row=mysqli_fetch_assoc($result)){
            $response[$i]['id']=$i+1;
            $response[$i]['role']=$row['role'];
            $response[$i]['name']=$row['name'];
            $response[$i]['resume']=$row['_resume'];
            $response[$i]['letter']=$row['cover_letter'];
            $response[$i]['linked_in']=$row['linked_in'];
            $response[$i]['email']=$row['email'];
            $response[$i]['phone']=$row['phone'];
            $i++;
        }
        http_response_code(200);
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
    }
?>