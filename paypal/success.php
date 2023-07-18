<?php 
session_start();
header('Refresh: 18; URL=http://localhost/3rd_jobsite/index.html');
include_once './../database/db.php';  
include './../vendor/autoload.php';
    use \Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    $conn= mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

if(!isset($_GET['PayerID'])||!isset($_SESSION['jwt'])|| empty($_SESSION['jwt'])) {
        http_response_code(404);
        echo("
                    <h1>Error 404</h1>
                    <h2>Session Expired</h2>
                    ");
        // exit( json_encode([
        //     'status'=>404,
        //     'message'=>'session expired',
        //   ]));
          header('Refresh: 4; URL=http://localhost/3rd_jobsite/login.html');
}
else{
    $jwt=$_SESSION["jwt"];
    $secret_key="Job_site";
    $jwt_data=JWT::decode($jwt,new Key($secret_key,'HS256'));
    $data=$jwt_data->data;
    $email=$data->email;

    if($conn->connect_error){
        http_response_code(500);
        echo("
          <h1>Error 500</h1>
          <h2>Server error</h2>
        ");
        header('Refresh: 4; URL=http://localhost/3rd_jobsite/login.html');  
    }
    else{
      $query="UPDATE user SET premium=1 WHERE email='$email'";
      if(mysqli_query($conn,$query)){
        http_response_code(200);
        echo("
              <h2>Payment done successfully...</h2>
        ");
        // exit( json_encode([
        //     'status'=>200,
        //     'message'=>'Payment completed...',
        //   ]));
          header('Refresh: 2; URL=http://localhost/3rd_jobsite/index.html');  
      }
      else{
        http_response_code(402);
        echo("
                    <h1>Error 402</h1>
                    <h2></h2>
                    ").mysqli_error($conn);
        // exit( json_encode([
        //     'status'=>400,
        //     'message'=>'Error...',
        //   ]));
          header('Refresh: 4; URL=http://localhost/3rd_jobsite/index.html');  
      }
    }
}
?>