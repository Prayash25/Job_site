<?php
    session_start();
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
    // header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    // header("Access-Control-Allow-Credentials: true");
    header("Content-Type: application/json; charset=UTF-8");
    include './../vendor/autoload.php';
    use \Firebase\JWT\JWT;
    use Firebase\JWT\Key;
    
    $host= 'localhost';
    $username= 'root';
    $password='';
    $database='jobsite_1stop';

    $conn= mysqli_connect($host,$username,$password,$database);

    function getLocalIp()
    { return gethostbyname(trim(`hostname`)); }

    // $jwt=$_SESSION["jwt"];
    if(!isset($_SESSION['jwt'])|| empty($_SESSION['jwt'])) {
        http_response_code(404);
        exit( json_encode([
            'status'=>404,
            'message'=>'session expired',
          ]));
          header('Refresh: 3; URL=http://localhost/3rd_jobsite/login.html');
    }
    else{
      // $allheaders=getallheaders();
    // $jwt=getbearertoken();
      $jwt=$_SESSION["jwt"];
      $secret_key="Job_site";
      $jwt_data=JWT::decode($jwt,new Key($secret_key,'HS256'));
      $data=$jwt_data->data;
      $ip=getLocalIp();
      if($ip==$data->ip){
        if($conn->connect_error){
            http_response_code(500);
            exit( json_encode([
                'status'=>500,
                'message'=>'Error in server',
              ]));
              header('Refresh: 3; URL=http://localhost/3rd_jobsite/login.html');
        }
        else{
          $email=$data->email;
          $query="SELECT * FROM user WHERE `email`='$email'" ;
          $result=mysqli_query($conn,$query);
          if($result){
            if(mysqli_num_rows($result)==1){
              http_response_code(200);
              exit( json_encode([
                'status'=>200,
                'message'=>'Welcome',
                // 'decoded'=>$jwt_data,
                // 'data'=>$data,
              ]));
            }
            else{
                http_response_code(400);
                exit( json_encode([
                    'status'=>400,
                    'message'=>'Access denied',
                  ]));
                  header('Refresh: 3; URL=http://localhost/3rd_jobsite/login.html');
            }

          }
          else{
            http_response_code(401);
            exit( json_encode([
                'status'=>401,
                'message'=>'Please try again',
              ]));
              header('Refresh: 3; URL=http://localhost/3rd_jobsite/login.html');
          }
        }
      }
    }
?>