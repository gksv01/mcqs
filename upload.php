<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = mysqli_connect("localhost", "root", "", "mcqs");
    if($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    // Get the form data
    $std_name = $_POST['std_name'];
    $fname = $_POST['fname'];
    $dob = $_POST['dob'];
    $sclass = $_POST['sclass'];
    $rollno = $_POST['rollno'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $stream = $_POST['stream'];
    $scl_name = isset($_POST['scl_name']) ? $_POST['scl_name'] : '';

    // Upload image file
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("jpg","jpeg","png","gif");
    if(in_array($imageFileType,$extensions_arr)) {
        // Insert image data into the image table
        $query = "INSERT INTO image(name,image) VALUES('".mysqli_real_escape_string($conn, $_FILES["image"]["name"])."','".addslashes(file_get_contents($_FILES["image"]["tmp_name"]))."')";
        mysqli_query($conn, $query);
        
        // Get the image ID
        $image_id = mysqli_insert_id($conn);
        
        // Insert student data into the student table
        $query = "INSERT INTO student (std_name, fname, dob, sclass, rollno, scl_name, gender, city, district, state, zip, email, mobile, stream, image_id) 
                  VALUES ('$std_name', '$fname', '$dob', '$sclass', '$rollno', '$scl_name', '$gender', '$city', '$district', '$state', '$zip', '$email', '$mobile', '$stream', '$image_id')";
        if(mysqli_query($conn, $query)) {
            echo "<h3>Data stored successfully, Please browse your localhost\mcqs to view the updated data</h3>";
            echo nl2br("\n$std_name\n$fname\n$dob\n$sclass\n$rollno\n$scl_name\n$gender\n$city\n$district\n$state\n$zip\n$email\n$mobile\n$stream\n");
        } else {
            echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
        }
    } else {
        echo "ERROR: Please upload only image files.";
    }
    mysqli_close($conn);
}
?>