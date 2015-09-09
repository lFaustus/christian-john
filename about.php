<?php  include('header.php');
 require_once('endinmind.php');

    
  $page = isset($_GET['p']) ? trim($_GET['p']) : 'about';
  $content = $page.".php";

  if(!file_exists($content))
  {
    $content = "about.php";
    $page = "about";
  }
  ?>

<!DOCTYPE html>


<html lang="en">
<head>
<meta charset="UTF-8">


 <link rel="stylesheet" href="css/style.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

</div>
  <br/>
  <br/>
           
<div class="container"style = "background:#F0FFF0;box-shadow:2px 3px 10px 2px #999; border:solid #999 0.07em">
  <div class = "col-md-12" style ="margin-top:10px; " >
    <form class = "form" role = "form">
    <div class = "header" style = "margin-left:12px;background:#eb477d;"></div>
      <h1 style="color:#eb477d"><b>About Us</b></h1><br>
      
    <div style = "margin-left:15px" class = "text-left">
          <p style = "color:#000000;font-size:15px" ><b>For more info just fill up below form sajb.K.FGBNHHADBDAHFJFSAL;J
          SJFKJKHGKVNKDJSGSJYANKAJSAKHFKLNFLKJRUKGNVFKLDBMLDFJBFBL;LA;JFLDJA;HLBHUGGRUBVNKNVL;SJDKLHBL</b></p>

        </div>

   
    <br/>
    <br/>
   </div>
   </form>
   </div>
   </div>
      
     

   </body>
</html>   



        <!-- <a href="#0" class="cd-close-form">Close</a> -->
    

      


 
  <!-- /.container -->
  <!-- script references -->

  <!-- /.container -->

  <!-- /.container -->
  <!-- script references -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    

<div class="footer">

 <?php include 'footer.php';?>
</div>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
</body>
</html>