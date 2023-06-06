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
<body>
  <form name="apost" class="ui form" style="width: 60%;justify-content: center; margin: auto; color: white;"   method="post" action="sdataconfig.php" >
                    <!-- onsubmit="return validation()" -->
                       <div class="field">
                           <label for="aname" style="color: black;">Name</label>
                           <input type="text" name="aname" id="aname" placeholder="">
                      <!-- <p style="color: rgb(253, 71, 71);" id="nameer"></p> -->
                       </div>
                        <div class="field">
                           <label for="applyfor" style="color: black;">Applying for</label>
                           <input type="text" name="applyfor" id="applyfor" placeholder="">
                      <!-- <p style="color: rgb(253, 71, 71);" id="emailer"></p> -->
                        </div>
                    
                        <div class="field">
                           <label for="quali" style="color: black;">Qualification</label>
                           <input type="text" name="quali" id="quali"  placeholder="" >
                      <!-- <p style="color: rgb(253, 71, 71);" id="texter"></p> -->
                        </div>
                        <div class="field">
                           <label for="year" style="color: black;">Year passout</label>
                           <input type="text" name="year" id="year" placeholder="">
                        <!-- <p style="color: rgb(253, 71, 71);" id="emailer"></p> -->
                        </div>
                        <div class="field">
                          <div class="ui">
                        <!-- <input type="checkbox" tabindex="0" class=""> -->
                             <span><input type="checkbox" style="width: 35px; position: relative; top: 8px;" id="chk"></span>
                             <span><label  style="color: black; font-size: 16px;"><a style=" color: black;"target="_blank" href="t&c.html"> I agree to the Terms and Conditions</a></label></span>
                           </div>
                        </div>
                        <button   style="color: white; background-color: blue;" class="ui button" type="submit" id="post" name="apply">Apply</button>
                        <button   style="color: white; background-color: rgb(249, 191, 82);" class="ui button" type="reset">Reset</button>
                    
   </form>   
</body>
</html>