<?php
include "config.php";
if (isset($_SESSION['tipe'])){
  header ("location:index.php");
}
?>
<html>
<head>
<title>LOGIN KE SERVER</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body background = "bg3.jpg">
 <div class="container"> 
  <h1 style="text-align: center; text-shadow: 2px 2px 10px white; font-size:50px; ">LOGIN</h1>
  <div style="margin: 10% 0 0 20%;">
    
<form class="form-horizontal" method="POST" name="login" action="ceklogin.php">

 <div class="form-group">
      <label class="control-label col-sm-2" for="username">Username:</label>
      <div class="col-sm-4">
        <input type="text" class="form-username" id="username" placeholder="Enter username" name="username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Password:</label>
      <div class="col-sm-4">          
        <input type="password" class="form-password"  placeholder="Enter password" name="password">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-4" align="center">          
        <input type="checkbox" class="form-checkbox"> Show password
      </div>
    </div>
    <div class="form-group" >        
      <div class="col-sm-offset-3 col-sm-4" >
        <button type="submit" class="btn btn-primary" value="login">Login</button>

      </div>
    </div>
</form>
</div> 
</div>

</body>
<script type="text/javascript">
  $(document).ready(function(){   
    $('.form-checkbox').click(function(){
      if($(this).is(':checked')){
        $('.form-password').attr('type','text');
      }else{
        $('.form-password').attr('type','password');
      }
    });
  });
</script>
</html>