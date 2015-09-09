<!DOCTYPE html>
<html lang="en" class="no-js">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
  <link rel="stylesheet" href="css/style.css"> 
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet"><!-- Gem style -->
  <script src="js/modernizr.js"></script>
   <!-- Modernizr -->
  
  <title>EndInMind</title>
</head>
<body>
  <header role="banner">
  <link rel="shortcut icon" type="image/x-icon" href="css/favicon.png">
    <div id="cd-logo"><a href="#0"><img src="images/em.png" height="50" alt="Logo"></a></div>

    <nav class="main-nav">
      <ul>
        <!-- insert more links here -->
           
          <li><a class="cd-signup"  href="javascript:;" data-toggle = "modal" data-target = "#myModal" >Register</a></li>          
      </ul>
    </nav>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content login-modal">
          <div class="modal-header login-modal-header"style="background:#eb477d;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         
          </div>
          <div class="modal-body"style="background:#F0FFF0;">
            <div class="text-center">
              <div role="tabpanel" class="login-tab">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a id="signin-taba" href="#home" aria-controls="home" role="tab" data-toggle="tab" style="background:#F0FFF0;"><span style = "font-size:20px;color:#eb477d;">Personal</a></li>
                <li role="presentation"><a id="signup-taba" href="#profile" aria-controls="profile" role="tab" data-toggle="tab"style="background:#F0FFF0;"><span style = "font-size:20px;color:#eb477d;">Agency</a></li>
            
              </ul>
          
              <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active text-center" id="home">
                  &nbsp;&nbsp;
        
                  <form>
                  <form method="post" action='' name="login_form">
                                      <div class = "text-center">
          <a class = "text-center" href = "#"><img class = "img-rounded" width = "220" height = "230" src = "images/personal.png"/></a>
        </div>
        <br/>
        <div class = "text-center">
         <div class = "text-center"><button type="submit" class="btn btn-primary btn-sm " style="align:center;">
                         <b> Proceed to Registration</b></button></div>
        </div>
                        
           </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                    &nbsp;&nbsp;
                    
                  <form>
                   <form method="post" action='' name="login_form">
                                      <div class = "text-center">
          <a class = "text-center" href = "#"><img class = "img-rounded" width = "220" height = "230" src = "images/agency.jpg"/></a>
        </div>
        <br/>
        <div class = "text-center"><button type="submit" class="btn btn-primary btn-sm " style="align:center;">
                         <b> Proceed to Registration</b></button></div>
                                  </form>
                </div>
    <div class="modal-footer">
          
        </div>
                          </div>
                      </div>
                  </div>
              </div>
        </div> <!-- END OF MODAL BODY  -->
      </div>
      
    </div>
  </div>
  
</div>

    

<!--Login-->

  <!-- Trigger the modal with a button -->
   <nav class="text-area">
   <ul>
 <li><a class="cd-log" href="javascript:;" data-toggle="modal" data-target="#loginModal">Login</a></li>
 </ul>
 </nav>
 </header>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content login-modal">
          <div class="modal-header login-modal-header"style="background:#eb477d;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         
          </div>
          <div class="modal-body"style="background:#F0FFF0;">
            <div class="text-center">
              <div role="tabpanel" class="login-tab">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a id="signin-taba" href="#home" aria-controls="home" role="tab" data-toggle="tab" style="background:#F0FFF0;"><span style = "font-size:20px;color:#eb477d;">Personal</a></li>
                <li role="presentation"><a id="signup-taba" href="#profile" aria-controls="profile" role="tab" data-toggle="tab"style="background:#F0FFF0;"><span style = "font-size:20px;color:#eb477d;">Agency</a></li>
            
              </ul>
          
              <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active text-center" id="home">
                  &nbsp;&nbsp;
                  
                  <form>
                  <form method="post" action='' name="login_form">
                                      <div style = "margin-bottom:10px" class = "input-group">
                              <span class = "input-group-addon" style=" color:#eb477d"><i class="glyphicon glyphicon-envelope"></i></span>   
                              <input type = "text" class = "form-control" style = "height:30px" placeholder = "EMAIL"/>
                          </div>
                          <br/>
                          <div style = "margin-bottom:10px" class = "input-group">
                               <span class = "input-group-addon" style=" color:#eb477d"><span class="glyphicon glyphicon-lock"></span></span>   
                               <input type = "password" class = "form-control" style = "height:30px" placeholder = "PASSWORD"/>
                          </div>
                          <br/>

                         <div class = "text-center"><button type="submit" class="btn btn-sm btn-primary">
                          Sign in </button></div>
                          <div class = "text-center">
                                      <a href="#forgotpassword" data-toggle="tab"><h5>Forgot Password?</h5></a>
                                      </div>
                                  </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                    &nbsp;&nbsp;
                   
                  <form>
                   <form method="post" action='' name="login_form">
                                      <div style = "margin-bottom:10px" class = "input-group">
                              <span class = "input-group-addon" style=" color:#eb477d"><i class="glyphicon glyphicon-envelope"></i></span>   
                              <input type = "text" class = "form-control" style = "height:30px" placeholder = "EMAIL"/>
                          </div>
                          <br/>
                          <div style = "margin-bottom:10px" class = "input-group">
                               <span class = "input-group-addon" style=" color:#eb477d"><i class="glyphicon glyphicon-lock"></i></span>   
                               <input type = "password" class = "form-control" style = "height:30px;" placeholder = "PASSWORD"/>
                          </div>
                          <br/>

                          <div class = "text-center"><button type="submit" class="btn btn-sm btn-primary">
                          Sign in </button></div>
                          <div class = "text-center">
                                      <a href="#forgotpassword" data-toggle="tab"><h5>Forgot Password?</h5></a>
                                      </div>
                                  </form>
                </div>
                <div class="tab-pane fade" id="forgotpassword">
                                  <form method="post" action='' name="forgot_password">
                                      <p>Hey this stuff happens, send us your email and we'll reset it for you!</p>
                                      <input type="text" class="span12" name="eid" id="email" placeholder="Email">
                                      <p><button type="submit" class="btn btn-primary">Submit</button>
                                      <a href="#login" data-toggle="tab">Wait, I remember it now!</a>
                                      </p>
                                  </form>
                  </div>
                  <div class="modal-footer">
         
        </div>
                          </div>
                      </div>
                  </div>
              </div>
        </div> <!-- END OF MODAL BODY  -->
      </div>
      
    </div>
  </div>
  
</div>


<?php include 'intro.php';?>
  <!-- /.container -->
  <!-- script references -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
    


  
</body>
</html>
  <!-- /.container -->
  <!-- script references -->
