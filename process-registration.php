


<?php
// Connect to database
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "mcqs";

$conn = new mysqli("localhost", "root", "", "mcqs");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$image = $_FILES['image'];

	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($image["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
		} else {
			echo "File is not an image.";
			exit();
		}
	}

	// Save uploaded image
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($image["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$uploadOk = 1;

	// Check if image file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}

	// Check file size
	if ($image["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	} else {
		// if everything is ok, try to upload file
		if (move_uploaded_file($image["tmp_name"], $target_file)) 
		{
			echo "The file ". htmlspecialchars( basename( $image["name"])). " has been uploaded.";
			
			// Insert image data into testimage table
			$sql = "INSERT INTO testimage (name, email, image) VALUES ('$name', '$email', '$target_file')";
			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		} else {
			echo "Sorry, there was an error uploading file.";
		}
	}
	
	// Close database connection
	$conn->close();
}
?>