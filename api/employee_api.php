<?php
session_start();
    header("Content-Type: JSON");
    include './../vendor/autoload.php';
    use \Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    function getLocalIp()
    { return gethostbyname(trim(`hostname`)); }
    
    $host= 'localhost';
    $username= 'root';
    $password='';
    $database='jobsite_1stop';

    $conn= mysqli_connect($host,$username,$password,$database);
  
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
      $query="SELECT * FROM jobs WHERE email='$email' ";
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
        if(isset($response)){
           http_response_code(200);
          //  $response[0]['email']=$email;
           echo(json_encode($response,JSON_PRETTY_PRINT));
        }
        else{
           http_response_code(202);
           echo(json_encode($email,JSON_PRETTY_PRINT));
        }
      }
      else{
        http_response_code(401);
        exit( json_encode([
            'status'=>401,
            'message'=>$conn->error,
          ]));
      }
    }
    }
?>