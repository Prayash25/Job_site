<?php
//  function debug_to_console($data) {
//     $output = $data;
//     echo "<script>console.log('$output' );</script>";
include_once './database/db.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Credentials: true");
// header("Content-Type: application/json; charset=UTF-8");
include './vendor/autoload.php';
use \Firebase\JWT\JWT;
use Firebase\JWT\Key;
function getLocalIp()
{ return gethostbyname(trim(`hostname`)); }

$conn= mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
 
if($conn->connect_error){
    http_response_code(500);
    echo json_encode([
        // 'status'=>500,
        'message'=>'Error in server',
    ]);
    header('Refresh: 3; URL=http://localhost/3rd_jobsite/login.html');
}
else{
    session_start();

    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $query="SELECT * FROM user WHERE `email`='$email'";
        $result=mysqli_query($conn,$query);
        if($result){
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            // echo("$row[mobile] --$row[balance]");
            if(mysqli_num_rows($result)>=1 && password_verify($_POST['password'],$row['password'])){
                $ip=getLocalIp();
                if($ip){
                    $payload=[
                        'iss'=>"localhost",
                        'aud'=>'localhost',
                        'exp'=>time() + 10000,
                        'data'=>[
                            'email'=>$email,
                            'ip'=>$ip,
                        ],
                    ];
                    $secret_key="Job_site";
                    $jwt=JWT::encode($payload,$secret_key,'HS256');
                    $_SESSION["jwt"]=$jwt;
                    http_response_code(200);
                    echo json_encode([
                        // 'status'=>200,
                        'jwt'=>$jwt,
                        'message'=>'Login Successfully',
                    ]);
                    header('Refresh: 3; URL=http://localhost/3rd_jobsite/index.html');
                }
                else{
                    http_response_code(401);
                    echo json_encode([
                        // 'status'=>401,
                        'message'=>'Failed to get ip',
                    ]);
                    header('Refresh: 5; URL=http://localhost/3rd_jobsite/login.html');
                }
                
            } 
            else{
                // $error='email id and password doesnot match';   
                // echo "$error";
                http_response_code(400);
                echo json_encode([
                    // 'status'=>400,
                    'message'=>'Invalid Credenditial',
                ]);
                header('Refresh: 5; URL=http://localhost/3rd_jobsite/login.html');
            }   
        }
        else{
            http_response_code(402);
            echo json_encode([
                // 'status'=>402,
                'message'=>'Database connection failed',
            ]);
            header('Refresh: 5; URL=http://localhost/3rd_jobsite/login.html');
        }
        
            // header("location:admin.html");
            // echo("$row");
        
        
    }
    else if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $num=$_POST['num'];
        $hash=password_hash($_POST['password'],PASSWORD_DEFAULT);
        $sql="INSERT INTO `user`( `name`, `email`, `password`,`phone`) VALUES ('$name','$email','$hash','$num')";
        if(mysqli_query($conn,$sql)){
            http_response_code(202);
            echo json_encode([
                // 'status'=>202,
                'message'=>'User made successfully',
            ]);
            header("Refresh: 3; URL=http://localhost/3rd_jobsite/login.html");
        }
        else{
            http_response_code(400);
            echo json_encode([
                // 'status'=>400,
                'message'=>'Sorry Please try again...',
            ]);
            header("Refresh: 10; URL=http://localhost/3rd_jobsite/signup.html");
            echo"error could not excecute $sql" . mysqli_error($conn);
        }
    }
    else if(isset($_POST['post'])){
        if(!isset($_SESSION['jwt'])|| empty($_SESSION['jwt'])) {
            http_response_code(404);
            header('Refresh: 4; URL=http://localhost/3rd_jobsite/login.html');
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

        $email=$_POST['email'];
        $linkedin=$_POST['linkedin'];
        $company=$_POST['company'];
        $description=$_POST['description'];
        $skills=$_POST['skills'];
        $ctc=$_POST['ctc'];
        $openings=$_POST['openings'];
        $role=$_POST['role'];
        $sql="INSERT INTO `jobs`(`email`, `linkedin`,`company`,`role`, `skills`, `description`, `ctc`,`openings`) VALUES ('$email','$linkedin','$company','$role','$skills','$description','$ctc','$openings')";

        if(mysqli_query($conn,$sql)){
            http_response_code(200);
            echo json_encode([
            'status'=>200,
            'message'=>'Job created successfully',
            ]);
        header('Refresh: 5; URL=http://localhost/3rd_jobsite/employee.html');
            // debug_to_console("hi");
        }
        else{
            http_response_code(400);
            echo json_encode([
                'status'=>400,
                'message'=>mysqli_error($conn),
            ]);
            header('Refresh: 3; URL=http://localhost/3rd_jobsite/employee.html');           
        }
        }
    }
    else if(isset($_POST['apply'])){
        if(!isset($_SESSION['jwt'])|| empty($_SESSION['jwt'])) {
            http_response_code(404);
            header('Refresh: 4; URL=http://localhost/3rd_jobsite/login.html');
            exit( json_encode([
                // 'status'=>404,
                'message'=>'session expired',
              ]));
              
        }
        else{

        $jwt=$_SESSION["jwt"];
        $secret_key="Job_site";
        $jwt_data=JWT::decode($jwt,new Key($secret_key,'HS256'));
        $data=$jwt_data->data;
        $email=$data->email;

        $jobber_email=$_POST['jobber_email'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $role=$_POST['role'];
        $company=$_POST['company'];
        $lkin=$_POST['linkedin'];
        $resume=$_POST['resume'];
        $letter=$_POST['letter'];
        
        $sql="INSERT INTO `candidates`(`name`,`phone`,`email`,`role`,`company`,`linked_in`, `_resume`, `cover_letter`, `jobber_email`) VALUES ('$name','$phone','$email','$role','$company','$lkin','$resume','$letter','$jobber_email')";
        // $result=mysqli_query($conn,$query);
        // debug_to_console($result);
        // echo("<script>console.log('PHP: " . $result . "');</script>");
        // debug_to_console("$row");
        if(mysqli_query($conn,$sql)){
            // echo"Record inserted successfully";
            http_response_code(200);
            echo json_encode([
                // 'status'=>200,
                'message'=>'Record inserted',
            ]);
            header('Refresh: 3; URL=http://localhost/3rd_jobsite/index.html');
            // debug_to_console("hi");
        }
        else{
            http_response_code(400);
            echo json_encode([
                // 'status'=>400,
                'message'=>$mysqli->error
            ]);
            header('Refresh: 5; URL=http://localhost/3rd_jobsite/index.html');
        }
        }
    }
    else if(isset($_POST['delete'])){
        if(!isset($_SESSION['jwt'])|| empty($_SESSION['jwt'])) {
            http_response_code(404);
            header('Refresh: 4; URL=http://localhost/3rd_jobsite/login.html');
            exit( json_encode([
                // 'status'=>404,
                'message'=>'session expired',
              ]));
              
        }
        else{

        $jwt=$_SESSION["jwt"];
        $secret_key="Job_site";
        $jwt_data=JWT::decode($jwt,new Key($secret_key,'HS256'));
        $data=$jwt_data->data;
        $email=$data->email;

        if($_POST["role"] && $_POST["company"]){
            $role=$_POST["role"];
            $company=$_POST["company"];
            $query1="DELETE FROM jobs WHERE email='$email' AND role='$role' AND company='$company'";
            $query2="DELETE FROM candidates WHERE jobber_email='$email' AND role='$role';";
            if(mysqli_query($conn,$query1)&&mysqli_query($conn,$query2)){
                http_response_code(200);
                header('Refresh: 3; URL=http://localhost/3rd_jobsite/employee.html');
                exit( json_encode([
                    // 'status'=>200,
                    'message'=>'Job Deleted',
                ]));
                
            }
            else{
                http_response_code(400);
                header('Refresh: 3; URL=http://localhost/3rd_jobsite/employee.html');
                exit( json_encode([
                    // 'status'=>400,
                    'message'=>'Please try again...',
                  ]));
                  
            }
        }
        else{
            http_response_code(402);
            header('Refresh: 3; URL=http://localhost/3rd_jobsite/employee.html');
                exit( json_encode([
                    // 'status'=>402,
                    'message'=>'Invalid',
                ]));
                header('Refresh: 3; URL=http://localhost/3rd_jobsite/employee.html');
        }
        }
    }
    else{
        http_response_code(404);
        echo json_encode([
            // 'status'=>404,
            'message'=>'BAD REQUEST',
        ]);
        header('Refresh: 5; URL=http://localhost/3rd_jobsite/login.html');
    }

    mysqli_close($conn);
}
?>