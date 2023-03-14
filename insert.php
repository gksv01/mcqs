<!DOCTYPE html>
<html>
<head>
    <title>Online Student Registration Form</title>
</head>
<body>
    <center>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "mcqs");
if($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$std_name = $_REQUEST['std_name'];
$fname = $_REQUEST['fname'];
$dob = $_REQUEST['dob'];
$sclass = $_REQUEST['sclass'];
$rollno = $_REQUEST['rollno'];
$gender = $_REQUEST['gender'];
$city = $_REQUEST['city'];
$district = $_REQUEST['district'];
$state = $_REQUEST['state'];
$zip = $_REQUEST['zip'];
$email = $_REQUEST['email'];
$mobile = $_REQUEST['mobile'];
$stream = $_REQUEST['stream'];
$adhar = $_REQUEST['adhar'];
$pwd = $_REQUEST['pwd'];

if(isset($_REQUEST['scl_name'])) {
    $scl_name = $_REQUEST['scl_name'];
} else {
    $scl_name = "";
}


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES['studentimage']['name']);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
//if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["studentimage"]["tmp_name"]);
  if($check !== false) {
    //echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
//}main code is below move upload
if (move_uploaded_file($_FILES["studentimage"]["tmp_name"], $target_file)) {
  //  echo "The file ". htmlspecialchars( basename( $_FILES["studentimage"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }



$sql = "INSERT INTO student (std_name, fname, dob, sclass, rollno, scl_name, gender, city, district, state, zip, email, mobile, stream, adhar, pwd) VALUES 
('$std_name', '$fname', '$dob', '$sclass', '$rollno', '$scl_name', '$gender', '$city', '$district', '$state', '$zip', '$email', '$mobile', '$stream','$adhar','$pwd')";

if(mysqli_query($conn, $sql)) {

$adhaar=mysqli_insert_id($conn);
//print_r($studentid);
//
    echo "<h3>Data Stored Successfully.</h3>";
    echo "<h4>Please note down the details for Login.</h4>";


   /* echo "<ul>";
    echo "<li>Student Name: $std_name</li>";
    echo "<li>Father's Name: $fname</li>";
    echo "<li>Date of Birth: $dob</li>";
    echo "<li>Class: $sclass</li>";
    echo "<li>Roll No.: $rollno</li>";
    echo "<li>School Name: $scl_name</li>";
    echo "<li>Gender: $gender</li>";
    echo "<li>City: $city</li>";
    echo "<li>District: $district</li>";
    echo "<li>State: $state</li>";
    echo "<li>Zip: $zip</li>";
    echo "<li>Email: $email</li>";
    echo "<li>Mobile: $mobile</li>";
    echo "<li>Stream: $stream</li>";
    echo "<li>Aadhar No: $adhar</li>";
    echo "<li>Password: $adhar</li>";*/

    
    echo "<li>User Name : $adhar</li>";
    echo "<li>Password : $pwd</li>";
    echo "<h4><a href = login.php>Click Here to Login</a></h3>";

    

    //print_r($_FILES);
    echo "</ul>";
} else {
    echo "ERROR: Sorry $sql. " . mysqli_error($conn);
}
$img=$target_file;

$sql2 = "INSERT INTO image(adhar, img) VALUES ('$adhar', '$img' )";
mysqli_query($conn, $sql2);

mysqli_close($conn);
        ?>
    </center>
</body>
</html>