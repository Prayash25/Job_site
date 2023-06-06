<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp_Educa.com</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-avatar@1.0.3/dist/avatar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
  
</head>
<body style="height: 100%; border: 2px solid black; margin: 2px;">
    <div style="background-image: url(image/sign1.jpg); background-repeat: no-repeat; background-position: center;width: 700px;height: 440px; background-size: cover;margin: auto; margin-top: 60px; opacity: 0.95;" >
     <h1 style="color: orange;text-align: center; margin-bottom: 8px;">SignUp</h1> 
        <form name="signform" class="ui form" style="width: 60%;justify-content: center; margin: auto; color: white;" method="post" action="sdataconfig.php">
            <div class="field">
              <label for="name" style="color: rgb(255, 1, 1); font-weight: 800; font-size: larger;">Name</label>
              <input type="text" name="name" id="sname" placeholder="Prayash Satpathy">
              <!-- <p style="color: rgb(253, 71, 71);" id="nameer"></p> -->
            </div>
            <div class="field">
              <label for="email" style="color: rgb(255, 1, 1);font-weight: 800;font-size: larger;">Email</label>
              <input type="text" name="email" id="semail" placeholder="proprayashsatpathy@gmail.com">
            <div class="field"> 
              <label for="num" style="color: rgb(255, 1, 1);font-weight: 800;font-size: larger;">Phone</label>
              <input type="number" name="num" id="snum" placeholder="7868888387">
              <!-- <p style="color: rgb(253, 71, 71);" id="nameer"></p> -->
            </div>
            <div class="field">
              <label for="pass" style="color: rgb(255, 1, 1);font-weight: 800;font-size: larger;">Password</label>
              <input type="password" name="pass" id="spassword" placeholder="A-Za-z._@#$%^&*!">
              <!-- <p style="color: rgb(253, 71, 71);" id="nameer"></p> -->
            </div>
            <p style="color: blueviolet; font-weight: 900;">Already Registered? <a href="login.php">Login</a></p>
            <button   style="color: white; background-color: orange;" class="ui button" type="submit" name="submit">SignUp</button>
            <button   style="color: white; background-color: rgb(249, 191, 82);" class="ui button" type="reset">Reset</button>
        </form>
    </div>
</body>
</html>