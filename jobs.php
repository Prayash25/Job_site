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
            $sql="SELECT `name`, `email`, `jobber_linkedin` ,`skills`, `ctc`, `company`,`role`,`openings`,`description` FROM `jobs`";
            $result= mysqli_query($conn,$sql);
            // $i=0;
            // echo("<script>console.log('PHP: 1');</script>");
            if($result->num_rows>0){
              // echo("<script>console.log('PHP: 2');</script>");
                while($row = $result->fetch_assoc()){
                    echo' 
                    
                    <div class="column">
                      <div class="ui card">
                        
                        <h3 style="text-allign: centre;">'.$row['name'].'</h3>
                        <h4 style="text-allign: centre;">'.$row['email'].'</h4>
                        <p style="text-allign: centre;">'.$row['skills'].'</p>
                        <p style="text-allign: centre;">Skills Required:'.$row['ctc'].'</p>
                        <p style="text-allign: centre;">CTC:'.$row['company'].'<p> 
                        <p style="text-allign: centre;">CTC:'.$row['role'].'<p> 
                        <p style="text-allign: centre;">CTC:'.$row['openings'].'<p>
                        <p style="text-allign: centre;">CTC:'.$row['description'].'<p>   
                        <a href="enroll.php"><button style="color: white; background-color: blue;" type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg" name="modal" id="modal">Apply</button></a>   
                                     
                      </div>
                    </div>';
                  }
                }
              
          ?>        
           </div>        
    </section>
    
</body>