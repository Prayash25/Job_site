<?php
//  function debug_to_console($data) {
//     $output = $data;
//     echo "<script>console.log('$output' );</script>";
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Access-Control-Allow-Credentials: true");
// header("Content-Type: application/json; charset=UTF-8");
include './vendor/autoload.php';
use \Firebase\JWT\JWT;

function getLocalIp()
{ return gethostbyname(trim(`hostname`)); }

$server= 'localhost';
$username= 'root';
$password='';
$database='jobsite_1stop';

$conn= mysqli_connect($server,$username,$password,$database);
 
if($conn->connect_error){
    http_response_code(500);
    echo json_encode([
        'status'=>500,
        'message'=>'Error in server',
    ]);
    header('Refresh: 3; URL=http://localhost/3rd_jobsite/login.html');
}
else{
    // @$_POST["email"] && @$_POST["password"]
    session_start();

    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $query="SELECT * FROM user WHERE `email`='$email' AND `password`='$password'" ;
        $result=mysqli_query($conn,$query);
        if($result){
            $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
            // echo("$row[mobile] --$row[balance]");
            if(mysqli_num_rows($result)==1){
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
                        'status'=>200,
                        'jwt'=>$jwt,
                        'message'=>'Login Successfully',
                    ]);
                    header('Refresh: 3; URL=http://localhost/3rd_jobsite/index.html');
                }
                else{
                    http_response_code(401);
                    echo json_encode([
                        'status'=>401,
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
                    'status'=>400,
                    'message'=>'Invalid Credenditial',
                ]);
                header('Refresh: 5; URL=http://localhost/3rd_jobsite/login.html');
            }   
        }
        else{
            http_response_code(402);
            echo json_encode([
                'status'=>402,
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
        $password=$_POST['password'];
        
        $sql="INSERT INTO `user`( `name`, `email`, `password`,`phone`) VALUES ('$name','$email','$password','$num')";
        if(mysqli_query($conn,$sql)){
            http_response_code(202);
            echo json_encode([
                'status'=>202,
                'message'=>'User made successfully',
            ]);
            header("Refresh: 3; URL=http://localhost/3rd_jobsite/login.html");
        }
        else{
            http_response_code(400);
            echo json_encode([
                'status'=>400,
                'message'=>'Sorry Please try again...',
            ]);
            header("Refresh: 10; URL=http://localhost/3rd_jobsite/signup.html");
            echo"error could not excecute $sql" . mysqli_error($conn);
        }
    }
    else if(isset($_POST['post'])){
        $cname=$_POST['cname'];
        $position=$_POST['position'];
        $jobdes=$_POST['jobdes'];
        $skill=$_POST['skill'];
        $ctc=$_POST['ctc'];
        $sql="INSERT INTO `jobs`(`CName`, `Position`, `Jobinfo`, `Skills`, `CTC`) VALUES ('$cname','$position','$jobdes','$skill','$ctc')";
        // $result=mysqli_query($conn,$query);
        // debug_to_console($result);
        // echo("<script>console.log('PHP: " . $result . "');</script>");
        //
        // $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        // echo("<script>console.log('PHP: " . $row . "');</script>");
        // debug_to_console("$row");
        // echo" display $row";
        if(mysqli_query($conn,$sql)){
            // echo"Record inserted successfully";
            header("location:index.php");
            // debug_to_console("hi");
        }
        else{
            echo"failed to post the job $sql" . mysqli_error($conn);
           
        }
    }
    else if(isset($_POST['apply'])){
        $jobber_email=$_POST['jobber_email'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $role=$_POST['role'];
        $lkin=$_POST['linkedin'];
        $resume=$_POST['resume'];
        $letter=$_POST['letter'];
        
        $sql="INSERT INTO `candidates`(`name`,`phone`,`email`,`role`,`linked_in`, `_resume`, `cover_letter`, `jobber_email`) VALUES ('$name','$phone','$email','$role','$lkin','$resume','$letter','$jobber_email')";
        // $result=mysqli_query($conn,$query);
        // debug_to_console($result);
        // echo("<script>console.log('PHP: " . $result . "');</script>");
        // debug_to_console("$row");
        if(mysqli_query($conn,$sql)){
            // echo"Record inserted successfully";
            http_response_code(200);
            echo json_encode([
                'status'=>200,
                'message'=>'Record inserted',
            ]);
            header('Refresh: 3; URL=http://localhost/3rd_jobsite/index.html');
            // debug_to_console("hi");
        }
        else{
            http_response_code(400);
            echo json_encode([
                'status'=>400,
                'message'=>$mysqli->error
            ]);
            header('Refresh: 5; URL=http://localhost/3rd_jobsite/index.html');
        }
    }
    else{
        http_response_code(404);
        echo json_encode([
            'status'=>404,
            'message'=>'BAD REQUEST',
        ]);
        header('Refresh: 5; URL=http://localhost/3rd_jobsite/login.html');
    }

    mysqli_close($conn);
}
?>