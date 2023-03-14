

<?php
        $conn = mysqli_connect("localhost", "root", "", "mcqs");
if($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());

if (!$conn) {

    echo "Connection failed!";

}
}
?>