<!DOCTYPE html>
<html lang="en" >
<head>
    
    <link rel="stylesheet" href="css/style.css">

</head>
<center><body>
 <a href="../../MVP3.html"><img src="logo.png" alt="logo"></a>
<?php
$username=$_POST['username'];
$name=$_POST['name'];
$county=$_POST['county'];
$age=$_POST['age'];
$city=$_POST['city'];
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
        or die("Error connecting to MySQL sever" . mysqli_error($db));

mysqli_select_db($db , 'team5') or die ('db will not open');
$query= "SELECT * FROM passengers WHERE PassUserName='$username'";
$result= mysqli_query($db,$query) or die("fail");
$row2=mysqli_fetch_array($result);
$username2=$row2['PassUsername'];  
if($pass==""|| $pass==" "){
echo "<br><br>You need a password to register";
}
else if ($age<18){
echo "<br><br>You have to be 18 and above to join this service";
}
else if($username==$username2){
    echo "username already exists Try Again";
    
}else {
$enter= "INSERT INTO passengers(PassUsername,PassName,PassAge,PassCounty,PassCity,PassEmail,PassImage) VALUES ('$username','$name','$age','$county','$city','$email','$target_dir$file_name')";
$enter2= "INSERT INTO passlogin(PassUsername,Password) VALUES ('$username','$password')";

if ($db->query($enter) === TRUE && $db->query($enter2) === TRUE) {

    header("location: PassLogin.html");
} else {
    echo "Error: " . $enter . "<br>" . $db->error;
}


}

mysqli_close($db);

	?>
    <br><br>
   <a href='PassReg.html'>Back to Registration</a>
    </body></center>
</html>