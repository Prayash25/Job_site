<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrers_Jobs.com</title>
    <link href=
          "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"

          rel="stylesheet" />
    <script src=
       "https://code.jquery.com/jquery-3.1.1.min.js"
            crossorigin="anonymous">
    </script>
 
    <script src=
        "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-avatar@1.0.3/dist/avatar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      
</head>
<body >
    <section style="margin-left: 2px;">
        <img src="image/bannerjobs.jpg" alt="" style="height: 320px; width: 100%;">
        <h2 style="text-align: center;color: rgb(0, 157, 255); font-weight: 700;">Uncountable Jobs Available</h2>
        
        <div class="ui stackable three column grid">
          <?php 
            $server= 'localhost';
            $username= 'root';
            $password='';
            $database='jobsite_1stop';

            $conn= mysqli_connect($server,$username,$password,$database);
             $sql="SELECT `CName`, `Position`, `Jobinfo` ,`Skills`, `CTC` FROM `jobs`";
            $result= mysqli_query($conn,$sql);
            // $i=0;
            // echo("<script>console.log('PHP: 1');</script>");
            if($result->num_rows>0){
              // echo("<script>console.log('PHP: 2');</script>");
                while($row = $result->fetch_assoc()){
                    echo' 
                    
                    <div class="column">
                      <div class="ui card">
                        
                        <h3 style="text-allign: centre;">'.$row['Position'].'</h3>
                        <h4 style="text-allign: centre;">'.$row['CName'].'</h4>
                        <p style="text-allign: centre;">'.$row['Jobinfo'].'</p>
                        <p style="text-allign: centre;">Skills Required:'.$row['Skills'].'</p>
                        <p style="text-allign: centre;">CTC:'.$row['CTC'].'<p>  
                        <a href="enroll.php"><button style="color: white; background-color: blue;" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" name="modal" id="modal">Apply</button></a>   
                                     
                      </div>
                    </div>';
                  }
                }
              
          ?>        
           </div>        
    </section>
    <footer id="footer">
        <div class="ui inverted vertical footer segment" style="padding-top: 8%;">
          <div class="ui container">
            <div class="ui stackable inverted divided equal height stackable grid">
              <div class="three wide column">
                <!-- <h4 class="ui inverted header">About</h4> -->
                <div class="ui inverted link list" style="margin-left: 25px;">
                  <!-- <div><img src="pictures/logo.jpg" height="45px" width="53px"></div> -->
                  <a href="index.php" class="item">
                    <div style="margin-bottom: 5px;"><img src="image/logo.jpg"
                        style="max-width: 150px;"></div>
                    <!-- <h1 class="nm" style="font-weight: bolder;">1Stop</h1> -->
    
                  </a>
                  <!-- <a href="#" class="item">Religious Ceremonies</a> -->
                  <!-- <a href="#" class="item">Gazebo Plans</a> -->
                </div>
              </div>
              <div class="three wide column">
    
                <div class="ui inverted link list">
                  <p style="color: #ffffff;" ><a href="privacy.php" target="_blank" class="item" style="text-decoration: none;">Privacy Policy</a></p>
                  <!-- <p style="color: #ffffff;"><a href="return.html" target="_blank"class="item" style="text-decoration: none;">Refund Policy</a></p> -->
                  <p style="color: #ffffff;"><a href="t&c.php" target="_blank" class="item" target="_blank" style="text-decoration: none;">Terms and conditions</a></p>
                  <p style="color: #ffffff;"></p><a href="faq.php" target="_blank"class="item" style="text-decoration: none;">FAQ</a></p>
                </div>
              </div>
              <div class="six wide column" style="text-align: center;">
                <h4 style=" margin-bottom: 4px;color: rgba(255, 255, 255, 0.829);"><a href="contact.php" style="text-decoration: none; color: rgba(255, 255, 255, 0.829);">
                  CONTACT US</a></h4>
                <span><a href="mailto:proprayashsatpathy@gmail.com"><img src="image/gmail.jpg" style="max-width: 22px;opacity: 0.7;" alt=""></a></span>
                <span><a href="https://api.whatsapp.com/send?phone=+916370341225"><img src="image/whatsapp.jpg"
                      style="max-width: 21px; position: relative; top: 0px; opacity: 0.7;" alt=""></a></span>
                <span><a href="tel:6370341225"><img src="image/contact.png"
                      style="max-width: 16px; margin: 6px; position: relative; top: 0px; opacity: 0.8;" alt=""></a></span>
                <h4 style=" margin-bottom: 14px;"><a href="blog.php" class="item"
                    style="color: rgba(255, 255, 255, 0.829); text-decoration: none;">BLOG</a></h4>
                <h4 style=" margin-bottom: 14px;"><a href="services.php" class="item"
                    style="color: rgba(255, 255, 255, 0.829); text-decoration: none;">Services</a></h4>
                <h4 style=" margin-bottom: 14px;"><a href="about.php" class="item"
                    style="color: rgba(255, 255, 255, 0.829); text-decoration: none;">ABOUT US</a></h4>
              </div>
              <div class="three wide column">
    
                <div class="ui inverted link list">
                  <a href="#" class="item"><img src="image/AppStore.png" style="max-width: 90px;" alt=""></a>
                  <a href="#" class="item"><img src="image/playstore.jpg" style="max-width: 90px; margin-bottom: 30px;"
                      alt=""></a>
                  <p>Follow Us On</p>
                  <span><a href="https://www.instagram.com/prayash_pro/"><img src="image/insta-PhotoRoom (1).png" style="max-width: 25px;position: relative;top: 1px;  " alt=""></a></span>
                  <span><a href="https://www.facebook.com/prayas.satpathy"><img src="image/facebook-PhotoRoom (1).png" style="max-width: 38px; position: relative; top: -1px;" alt=""></a></span>
                  <span><a href="https://www.linkedin.com/in/prayash-satpathy-449a65221/"><img src="image/linked.png" style="max-width: 15px; margin: 4px;" alt=""></a></span>
                  <span><a href="https://www.snapchat.com/add/prayashsat?share_id=F5DPilbLnzM&locale=en-IN "><img src="image/snapchat.png"
                        style="max-width: 17px; margin: 6px; position: relative; top: 2px" alt=""></a></span>
                  <span><a href="https://twitter.com/PrayashSat"><img src="image/twitter.png" style="max-width:14px; margin: 4px;" alt=""></a></span>
    
                </div>
    
              </div>
    
            </div>
            <p style="text-align: center; margin: 15px;">Copywrite &#169; 2022 All rights reserved.</p>
          </div>
    
        </div>
        
    </footer>
</body>