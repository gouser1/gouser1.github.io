<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: PassLogin.html");
  exit;
}
?>
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
$old = htmlspecialchars($_SESSION['username']);
    
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
if ($username==$old || $username!=$username2 ){
    if ($age<18){
echo "<br><br>You have to be 18 and above to join this service";
}
else {
$enter= "Update passengers set PassUsername='$username',PassName='$name',PassAge='$age',PassCounty='$county',PassCity='$city',PassEmail='$email', PassImage='$target_dir$file_name'WHERE PassUsername='$old'";
$enter2= "Update passlogin set PassUsername='$username' Where PassUsername='$old'";

if ($db->query($enter) === TRUE && $db->query($enter2) === TRUE) {
$_SESSION['username'] = $username;
    header("location: welcome.php");
} else {
    echo "Error: " . $enter . "<br>" . $db->error;
}


}}else{
    echo "username already exists Try Again";
    
}

mysqli_close($db);

	?>
    <br><br>
   <a href='ProfileEdit.php'>Back to Edit</a>
    </body></center>
</html>