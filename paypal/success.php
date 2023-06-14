<?php 
session_start();
header('Refresh: 8; URL=http://localhost/3rd_jobsite/index.html');  
include './../vendor/autoload.php';
    use \Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    $host= 'localhost';
    $username= 'root';
    $password='';
    $database='jobsite_1stop';

    $conn= mysqli_connect($host,$username,$password,$database);
  
if(!isset($_GET['PayerID'])||!isset($_SESSION['jwt'])|| empty($_SESSION['jwt'])) {
        http_response_code(404);
        exit( json_encode([
            'status'=>404,
            'message'=>'session expired',
          ]));
          header('Refresh: 3; URL=http://localhost/3rd_jobsite/login.html');
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
        header('Refresh: 3; URL=http://localhost/3rd_jobsite/login.html');  
    }
    else{
      $query="UPDATE user SET premium=1 WHERE email='$email'";
      if(mysqli_query($conn,$query)){
        http_response_code(200);
        exit( json_encode([
            'status'=>200,
            'message'=>'Payment completed...',
          ]));
          header('Refresh: 3; URL=http://localhost/3rd_jobsite/index.html');  
      }
      else{
        http_response_code(400);
        exit( json_encode([
            'status'=>400,
            'message'=>'Error...',
          ]));
          header('Refresh: 3; URL=http://localhost/3rd_jobsite/index.html');  
      }
    }
}
?>