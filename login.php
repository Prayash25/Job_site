<?php  include 'sdataconfig.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login_Educa.com</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-avatar@1.0.3/dist/avatar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
</head>
<body>
    <div style="background-image: url(image/login.jpg); background-repeat: no-repeat; background-position: center;width: 700px;height: 440px; background-size: cover;margin: auto; margin-top: 60px; opacity: 0.95;" >
        <h1 style="color: orange;text-align: center; margin-bottom: 54px; margin-top: 18px;">Login</h1> 
           <form name="loginform" class="ui form" style="width: 60%;justify-content: center; margin: auto; color: white;" method="post"action="sdataconfig.php">
               
               <div class="field">
                 <label for="email" style="color: rgb(255, 1, 1);font-weight: 800;font-size: larger;">Email</label>
                 <input type="text" name="email" id="lemail" placeholder="Id">
                 <!-- <p style="color: rgb(253, 71, 71);" id="nameer"></p> -->
               </div>
               <div class="field">
                 <label for="pass" style="color: rgb(255, 1, 1);font-weight: 800;font-size: larger;">Password</label>
                 <input type="password" name="pass" id="lpassword" placeholder="">
                 <!-- <p style="color: rgb(253, 71, 71);" id="nameer"></p> -->
               </div>
               <p style="color: rgb(255, 255, 255); font-weight: 900;">New? <a href="sign.php" style="color: black" >SignUp</a></p>
               <button   style="color: white; background-color: orange;" class="ui button" type="submit" name="login">Login</button>
               <button   style="color: white; background-color: rgb(249, 191, 82);" class="ui button" type="reset">Reset</button>
           </form>
       </div>
</body>
</html>