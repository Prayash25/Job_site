<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs.com</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-avatar@1.0.3/dist/avatar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      
</head>
<body>
<nav style="border-radius: 28px; margin-left: 1px; margin-right: 1px; position: sticky; z-index: 200;width:100%;">

 <div class="ui large menu">
  <a id="logo" class="item" style="width: 95px;" href="index.php">
    <img width="100%" src="image/logo.jpg" alt="">
  </a>
  <a class="active blue item" style="font-size:18px;" href="applied.php" >
    Candidates
  </a>
  <div class="right menu">
    <div class="ui dropdown item" style="font-size:19px;">
      &#9776;</i>
      <div class="menu"> 
        
        <!-- <a class="item" href="jobs.php">Jobs</a> -->
        <a class="item" href="index.php">Admin</a>
      
     </div>
 </div>
  <!-- <div class="right menu">
    <div class="ui dropdown item" style="font-size:18px;">
      
      <i class="dropdown icon"></i>
      <div class="menu">
        <a class="item" href="contact.php">Contact</a>
          <a class="item" href="about.php">About Us</a>
    </div>
  </div> -->
  
  <div class="right menu">
    <div class="ui dropdown item">
      <img class="avatar avatar-24 bg-light rounded-circle text-white p-1"
        src="https://raw.githubusercontent.com/twbs/icons/main/icons/person-fill.svg">
      <div class="menu">
        <a class="item" href="login.php">Logout</a>
    
      </div>
    </div>
  <!-- <div class="right menu">
        <div class="ui dropdown item">
          <img class="avatar avatar-24 bg-light rounded-circle text-white p-1"
            src="https://raw.githubusercontent.com/twbs/icons/main/icons/person-fill.svg">
          <div class="menu">
            <a class="item" href="login.html">Login</a>
            <a class="item" href="sign.html">SignUp</a>
          </div>
        </div> -->
  </div>

      </div>
  
    <script>$('.ui.dropdown')
        .dropdown()
        ;
    </script>
</nav>
 <img src="image/logo.jpg" alt="" style="height: 170px; width: 100%;">
    <h2 style="text-align: center;color: blue;">Candidates applied</h2>
    <section id="jobs" style="margin-bottom: 10px;">
        <table class="ui celled tablet stackable table">
            <thead>
              <tr><th>Sr No.</th>
              <th>Candidate Name</th>
              <th>Applying For</th>
              <th>Qualification</th>
              <th>Year Passout</th>
            </tr></thead>
            <?php 
            $server= 'localhost';
            $username= 'root';
            $password='';
            $database='jobsite_1stop';

            $conn= mysqli_connect($server,$username,$password,$database);
             $sql="SELECT `Name`, `Qualification`, `Apply`, `Year` FROM `applicants`";
            $result= mysqli_query($conn,$sql);
            $i=0;
            if($result->num_rows >0){
                while($row = $result->fetch_assoc()){
                    echo"
                    <tbody>
                    <tr>
                      <td>".++$i."</td>
                      <td>".$row['Name']."</td>
                      <td>".$row['Qualification']."</td>
                      <td>".$row['Apply']."</td>
                      <td>".$row['Year']."</td>
                    </tr>";
                }}
                else{
                    echo"";
                }
            ?>
              </tbody>
          </table>
    </section>
</body>
</html>