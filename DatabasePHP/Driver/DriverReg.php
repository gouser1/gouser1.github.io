<!DOCTYPE html>
<html lang="en" >
<head>
    
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
 <center>  <a href="../../MVP3.html"><img src="logo.png" alt="logo"></a></center>
<?php
$username=$_POST['username'];
$name=$_POST['name'];
$county=$_POST['county'];
$age=$_POST['age'];
$city=$_POST['city'];
$car=$_POST['car'];
$email=$_POST['email'];

$pass=trim($_POST['password']);
$password = md5($pass);
    
    
 if(isset($_FILES['upload']))

{

// file name, type, size, temporary name

$file_name = $_FILES['upload']['name'];

$file_type = $_FILES['upload']['type'];

$file_tmp_name = $_FILES['upload']['tmp_name'];

$file_size = $_FILES['upload']['size'];

// target directory



$target_dir = '../image/';
$target_file = $target_dir . basename($_FILES["upload"]["name"]);
// uploading file

move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file);

 }
    

    
    
    
    

  $db = mysqli_connect("localhost", "Team5", "KRbhQX8N")
        or die("Error connecting to MySQL server" . mysqli_error($db));

mysqli_select_db($db , 'team5') or die ('db will not open');

$query= "SELECT * FROM Drivers WHERE DriverUserName='$username'";
$result= mysqli_query($db,$query) or die("fail");
$row2=mysqli_fetch_array($result);
$username2=$row2['DriverUsername'];  
if($pass==""|| $pass==" "){
echo "<br><br>You need a password to register";
}
elseif ($age<18){
    echo "You have to be 18 and above to join this service";
}
elseif($username==$username2){
    echo "username already exists Try Again";
    
}else{ 
    
$enter= "INSERT INTO Drivers(DriverUsername,DriverName,DriverAge,DriverCounty,DriverCity,DriverEmail,DriverImage,DriverCar) VALUES ('$username','$name','$age','$county','$city','$email','$target_dir$file_name','$car')";
$enter2= "INSERT INTO Driverlogin(DriverUsername,Password) VALUES ('$username','$password')";
if ($db->query($enter) === TRUE && $db->query($enter2) === TRUE) {

  header("location: DriverLogin.html");
} else {
    echo "Error: " . $enter . "<br>" . $db->error;
}

}

mysqli_close($db);
	?>
    
 <a href='DriverReg.html'>Back to Registration</a>
    </body>
</html>