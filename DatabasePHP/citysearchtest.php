


<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: Passenger/PassLogin.html");
  exit;
}

?>



<HTML><HEAD><link rel="stylesheet" href="stylecity.css"></HEAD><body>
    <center>
        <br>
        <a href="../../MVP2/MVP2.html"><img src="logo.png"></a>
        <br>
        <br>
        <div class="login-box animated fadeInUp">
            
<form action="citysearch.php" method="post">
    <br>
    <label>Pick up location:</label><br>
 <center><div class="col-lg-12">  
     <div class="style-menu">
         
<select id="realitems" name="city">
    <center><option value="">Select...</option></center>
    
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
       
     </div></center>
    <br>
    <br>
    
    
    
    <label>Destination:</label>
    
    <br>
    <center><div class="col-lg-12">  
    <div class="style-menu">
        
<select id="realitems" name="destination">
    
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
        </div></center>
    <br>
    <br>
    
    <button type="submit">Search</button>
    
            </form>
    </div>

        
       
    </center>
    
    
    
    
    </body></HTML>
