
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Student Registration Form</title>
    <link href="css/style.css" rel="stylesheet"/>
     <script src="js/bootstrap1.js"></script>
</head>

<body>
<form ENCTYPE = "multipart/form-data"></br></br></br>
    <div class="container">

<?php
//connect to mysql server with username password and database name
$connect = mysqli_connect("localhost", "root", "", "mcqs");
// Check connection
if ($connect === false) {
    die("Opps Unable to connect " . mysqli_connect_error());
}
// create query to select data

$sql="SELECT s.std_name, s.sclass, s.scl_name, s.adhar, i.img FROM student s JOIN image i ON s.adhar = i.adhar";
if ($result = mysqli_query($connect, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo '<table border="1px">';
        echo "<tr>";
        echo "<th>Student Name</th>";
        echo "<th>School Name</th>";
        echo "<th>Aadhar</th>";
        echo "<th>Class</th>";
        echo "<th>Image</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['std_name'] . "</td>";
            echo "<td>" . $row['scl_name'] . "</td>";
            echo "<td>" . $row['adhar'] . "</td>";
            echo "<td>" . $row['sclass'] . "</td>";
            echo "<td>" . "<img src=".$row['img'].' width=100px height="100px">' . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "No records found";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
}
// Close connection
mysqli_close($connect);
?>

 </form>
        </div>

    </div>

</body>

</html>
