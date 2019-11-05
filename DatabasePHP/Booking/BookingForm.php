<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['drivername']) || empty($_SESSION['drivername'])){
  header("location:..Drivers/DriverLogin.html");
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

<body>
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
           <form class="form-register" method="post" action="Booking.php" name="register" novalidate>
	            <div class="input-field col s6">
              <input id="name" type="text" name="username" class="validate" required value="<?php echo htmlspecialchars($_SESSION['drivername']); ?>">
              <label for="first-name">UserName</label>
            </div>
                  <div class="input-field col s6">
                <label for="first-name">Destination</label>
              <select id="realitems" name="meeting">
    <option value="">Select...</option>
    
<option value="antrim">Antrim</option>
<option value="armagh">Armagh</option>
<option value="ballycastle">Ballycastle</option>
<option value="ballymena">Ballymena</option>
<option value="banbridge">Banbridge</option>
<option value="bangor">Bangor</option>
<option value="belfast">Belfast </option>
<option value="belfastmetmillfield">Belfast Met MillField</option>
<option value="belfastmettitanic">Belfast Met Titanic</option>
<option value="carrickfergus">Carrickfergus</option>
<option value="coleraine">Coleraine</option>
<option value="cookstown">Cookstown</option>
<option value="craigavon">Craigavon</option>
<option value="derry">Derry/L-Derry</option>
<option value="downpatrick">Downpatrick</option>
<option value="enniskillen">Enniskillen</option>
<option value="armagh">Holywood</option>
<option value="jordanstown">Jordanstwon</option>
<option value="larne">Larne</option>
<option value="lisburn">Lisburn</option>
<option value="lurgan">Lurgan</option>
<option value="newcastle">Newcastle</option>
<option value="newry">Newry</option>
<option value="newtonards">Newtownards</option>
<option value="omagh">Omagh</option>
<option value="portrush">Portrush</option>
<option value="portstewart">Portstewart</option>
<option value="queens">Queens</option>
</select>
              
            </div>
             <div class="input-field col s6">
              <input id="email" type="text" name="time" class="validate" required>
              <label for="email">Meeting Time</label>
             </div>
               <div class="input-field col s6">
              <input id="email" type="text" name="date" class="validate" required>
              <label for="email">Meeting Date</label>
             </div>
                <div class="input-field col s6">
              <input id="first-name" type="text" name="seats" class="validate" required>
              <label for="first-name">Number of Seats</label>
            </div>
               <div class="input-field col s6">
                <label for="first-name">Destination</label><br>
              <select id="realitems" name="dest">
    <option value="">Select...</option>
    
<option value="antrim">Antrim</option>
<option value="armagh">Armagh</option>
<option value="ballycastle">Ballycastle</option>
<option value="ballymena">Ballymena</option>
<option value="banbridge">Banbridge</option>
<option value="bangor">Bangor</option>
<option value="belfast">Belfast </option>
<option value="belfastmetmillfield">Belfast Met MillField</option>
<option value="belfastmettitanic">Belfast Met Titanic</option>
<option value="carrickfergus">Carrickfergus</option>
<option value="coleraine">Coleraine</option>
<option value="cookstown">Cookstown</option>
<option value="craigavon">Craigavon</option>
<option value="derry">Derry/L-Derry</option>
<option value="downpatrick">Downpatrick</option>
<option value="enniskillen">Enniskillen</option>
<option value="armagh">Holywood</option>
<option value="jordanstown">Jordanstown</option>
<option value="larne">Larne</option>
<option value="lisburn">Lisburn</option>
<option value="lurgan">Lurgan</option>
<option value="newcastle">Newcastle</option>
<option value="newry">Newry</option>
<option value="newtonards">Newtownards</option>
<option value="omagh">Omagh</option>
<option value="portrush">Portrush</option>
<option value="portstewart">Portstewart</option>
<option value="queens">Queens</option>
</select>
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
</body>
  <script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>
