<?php

//  function debug_to_console($data) {
//     $output = $data;
//     echo "<script>console.log('$output' );</script>";

$server= 'localhost';
$girusername= 'root';
$password='';
$database='jobsite_1stop';

$conn= mysqli_connect($server,$username,$password,$database);
 
// if($conn->connect_error){
//     die("connecion failed:"$conn->connect_error);
// }
// echo"";

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $num=$_POST['num'];
    $password=$_POST['pass'];

    $sql="INSERT INTO `users`( `Name`, `Email`, `Password`,`phone`) VALUES ('$name','$email','$password','$num')";
    if(mysqli_query($conn,$sql)){
        header("location:login.php");
    }
    else{
        echo"error could not excecute $sql" . mysqli_error($conn);
    }
}

session_start();
// debug_to_console("session created");
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=$_POST['pass'];
        $query="SELECT * FROM users WHERE `Email`='$email' AND `Password`='$password' ";
        $result=mysqli_query($conn,$query);
        // debug_to_console($result);
        // echo("<script>console.log('PHP: " . $result . "');</script>");
        //
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        echo("<script>console.log('PHP: " . $row . "');</script>");
        // debug_to_console("$row");
        // echo" display $row";
        if(mysqli_num_rows($result)==1){
            header("location:index.php");
            // die();
            // debug_to_console("hi");
        }
        else{
            $error='email id and password doesnot match';   

        }
    }
    mysqli_close($conn);
    
    
    if(isset($_POST['post'])){
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
    
    if(isset($_POST['apply'])){
        $aname=$_POST['aname'];
        $quali=$_POST['quali'];
        $apply=$_POST['applyfor'];
        $year=$_POST['year'];
        
        $sql="INSERT INTO `applicants`(`Name`, `Qualification`, `Apply`, `Year`) VALUES ('$aname','$quali','$apply','$year')";
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
            header("location:jobs.php");
            // debug_to_console("hi");
        }
        else{
            echo"failed to post the job $sql" . mysqli_error($conn);
           
        }
        }
    

?>