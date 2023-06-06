
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
          <a class="active blue item" style="font-size:18px;" href="index.php" >
            Admin Dashboard
          </a>
          <div class="right menu">
            <div class="ui dropdown item" style="font-size:19px;">
              &#9776;</i>
              <div class="menu"> 
                
                <!-- <a class="item" href="jobs.php">Jobs</a> -->
                <a class="item" href="applied.php">Applicants</a>
              
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

    <section id="postjob" style="margin-top: 10px;">
      <div class="ui accordion">
        <div class="active title" style="width: 65px; margin-left: 50%;">
          <div style="background-color: rgb(35, 143, 252); color: #ffffff; display: inline-block ;;width: 65px; height: 29px; border-radius: 5px; text-align: center;"><p>Post Job</p>
          </div>
        </div>
        <div class="content" style="text-align: center;">
            <div style="background-color: rgb(4, 114, 177);">
                <form name="jpost" class="ui form" style="width: 60%;justify-content: center; margin: auto; color: white;"   method="post" action="sdataconfig.php" >
                    <!-- onsubmit="return validation()" -->
                    <div class="field">
                      <label for="cname" style="color: white;">Company Name</label>
                      <input type="text" name="cname" id="cname" placeholder="">
                      <p style="color: rgb(253, 71, 71);" id="nameer"></p>
                    </div>
                    <div class="field">
                      <label for="position" style="color: white;">Position</label>
                      <input type="text" name="position" id="position" placeholder="">
                      <p style="color: rgb(253, 71, 71);" id="emailer"></p>
                    </div>
                    <div class="field">
                      <label for="jobdes" style="color: white;">Job Description</label>
                      <textarea name="jobdes" id="jobdes" cols="30" rows="10"></textarea>
                      <p style="color: rgb(253, 71, 71);" id="numer"></p>
                    </div>
                    <div class="field">
                      <label for="skill" style="color: white;">Skill Required</label>
                      <input type="text" name="skill" id="skill"  placeholder="" >
                      <p style="color: rgb(253, 71, 71);" id="texter"></p>
                    </div>
                    <div class="field">
                        <label for="ctc" style="color: white;">CTC</label>
                        <input type="text" name="ctc" id="ctc" placeholder="">
                        <p style="color: rgb(253, 71, 71);" id="emailer"></p>
                      </div>
                    <div class="field">
                      <div class="ui">
                        <!-- <input type="checkbox" tabindex="0" class=""> -->
                        <span><input type="checkbox" style="width: 35px; position: relative; top: 8px;" id="chk"></span>
                        <span><label  style="color: white; font-size: 16px;"><a style=" color: white;"target="_blank" href="t&c.html"> I agree to the Terms and Conditions</a></label></span>
                      </div>
                    </div>
                    <button   style="color: white; background-color: orange;" class="ui button" type="submit" id="post" name="post">Post</button>
                    <button   style="color: white; background-color: rgb(249, 191, 82);" class="ui button" type="reset">Reset</button>
                    
                    <script type="text/javascript" id="validation">
                       
                        function validation(){
                         var name=document.getElementById('nm').value;
                         var email=document.getElementById("em").value;
                         var num=document.getElementById("numb").value;
                         var text=document.getElementById("txt").value;
                         var chk=document.getElementById("chk").value;
                          // console.log(name);
                          // return false;
          
                         var namechk=/^[A-Z a-z]{3,100}$/;
                         var numchk=/^[56789]{1}[0-9]{9}$/;
                         var emailchk=/^[a-zA-Z0-9_]{2,}[@]{1}[a-z][.]{1}[a-z]{7}$/;
                         var textchk=/^[a-zA-Z0-9.?-]{10,}$/;
          
                         if(namechk.test(name))
                         {
          
                           document.getElementById("nameer").innerHTML="";
            
                         }
                         else{
                           document.getElementById("nameer").innerHTML="invalid";
                           return false;
                         }
                         if(emailchk.test(email))
                         {
          
                           document.getElementById("emailer").innerHTML="";
            
                         }
                         else{
                           document.getElementById("emailer").innerHTML="invalid";
                           return false;
                         }
                         if(numchk.test(num))
                         {
          
                           document.getElementById("numer").innerHTML="";
            
                         }
                         else{
                           document.getElementById("numer").innerHTML="invalid";
                           return false;
                         }
                         if(textchk.test(text))
                         {
          
                           document.getElementById("texter").innerHTML="";
            
                         }
                         else{
                           document.getElementById("texter").innerHTML="invalid";
                           return false;
                         }
                       }
                    </script>
                  </form>   
        <script type="text/javascript" id="gsheet_entry">
           const scriptURL =
               'https://script.google.com/macros/s/AKfycbzl9nuNwwk6WQxbudPodceLIdqy4ZgtYYJzOmlVEZX74HgXWGBE-6Qn7XnnK9jQlHzm/exec'
           const form = document.forms['google-sheet']
        
           form.addEventListener('submit', e => {
               e.preventDefault()
               fetch(scriptURL, {
                       method: 'POST',
                       body: new FormData(form)
                   })
                   .then(response => alert(
                       "Thanks for you valuable feedback!!!"))
                   .catch(error => console.error('Error!', error.message))
           })
        
                    </script>
        
                </div>
        </div>
        <script>$('.ui.accordion')
            .accordion()
          ;
        </script>
      </section>
    <section id="jobs" style="margin-bottom: 10px;">
        <table class="ui celled tablet stackable table">
            <thead>
              <tr><th>Sr No.</th>
              <th>Company Name</th>
              <th>Position</th>
              <th>CTC</th>
            </tr></thead>
            <?php 
            $server= 'localhost';
            $username= 'root';
            $password='';
            $database='jobsite_1stop';

            $conn= mysqli_connect($server,$username,$password,$database);
             $sql="SELECT `CName`, `Position`, `CTC` FROM `jobs`";
            $result= mysqli_query($conn,$sql);
            $i=0;
            if($result->num_rows >0){
                while($row = $result->fetch_assoc()){
                    echo"
                    <tbody>
                    <tr>
                      <td>".++$i."</td>
                      <td>".$row['CName']."</td>
                      <td>".$row['Position']."</td>
                      <td>".$row['CTC']."</td>
                    </tr>";
                }}
                else{
                    echo"";
                }
            ?>
              </tbody>
          </table>
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
</html>