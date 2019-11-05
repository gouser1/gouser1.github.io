<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location:../Passenger/PassLogin.html");
  exit;
}
?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Booking</title>
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<center><body>
    <br><br>
     <a href="../../MVP3.html"><img src="../../logo.png" alt="ryde_logo" class="logo"></a>
    <br><br><br>

  <body ng-controller="RegisterCtrl" ng-app="myApp">
 <div class="container">
   <div id="signup">
      <div class="signup-screen">
         <div class="space-bot text-center">
            
            <h1>Booking Form </h1>
           <div class="divider"></div>
         </div>
           <form class="form-register" method="post" action="Reserve.php" name="register" novalidate>
                
               <div class="input-field col s6">
              <input id="id" type="text" name="id" class="validate" required value="<?php $id= $_GET['id']; echo $id; ?>" >
              <label for="email">Booking ID</label>
             </div>
              
               
               
	            <div class="input-field col s6">
              <input id="pass" type="text" name="pass" class="validate" required value="<?php echo htmlspecialchars($_SESSION['username']); ?>">
              <label for="first-name">UserName</label>
            </div>
                  <div class="input-field col s6">
              <input id="driver" type="text" name='driver' class="validate" required>
              <label for="Meeting">DriverName</label>
            </div>
           
                
              <div class="space-top text-center">
               <button ng-disabled="form-register.$invalid" class="waves-effect waves-light btn done">
               <i class="material-icons left">done</i> Done
               </button>
               <button type="button" class="waves-effect waves-light btn cancel">
               <i class="material-icons left">clear</i>Cancel
               </button>
              </div>
             </form>
           </div>
        </div>
    </div>
</body></center>
  <script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>
