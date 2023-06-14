<?php
session_start();
    header("Content-Type: JSON");
    include './../vendor/autoload.php';
    use \Firebase\JWT\JWT;
    use Firebase\JWT\Key;

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
        header('Refresh: 3; URL=http://localhost/3rd_jobsite/login.html');
  }
  else{
    if($conn->connect_error){
        http_response_code(500);
        exit( json_encode([
            'status'=>500,
            'message'=>'Error in server',
          ]));
    }
    else{
      $jwt=$_SESSION["jwt"];
      $secret_key="Job_site";
      $jwt_data=JWT::decode($jwt,new Key($secret_key,'HS256'));
      $data=$jwt_data->data;
      $user_email=$data->email;

      $query="SELECT * FROM jobs";

      $query2="SELECT premium FROM `user` WHERE email='$user_email'";
      $premium=0;
      $r_temp=mysqli_query($conn,$query2);
      if($r_temp){
        while($row=mysqli_fetch_assoc($r_temp)){
          $premium=$row['premium'];
        } 
        // echo $premium;
      }

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
            $response[$i]['linkedin']=NULL;
            if($premium==1)$response[$i]['linkedin']=$row['linkedin'];
            $response[$i]['email']=$row['email'];
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
  }
?>