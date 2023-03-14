<html>
<head>
<title>Display Information</title>
<style>
    body {
        background-color: lightblue;
    }
</style>
</head>
<body>
    <center>
        <table width="50%" border="1" cellpadding="5" cellspacing="5">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Class</th>
                    <th>School</th>
                    <th>Adhar</th>
                    <th>Image</th>
                </tr>
            </thead>
            <?php
            $connection = mysqli_connect("localhost", "root", "", "mcqs");

            if (!$connection) {
                die("Database connection failed: " . mysqli_connect_error());
            }

        $query = "SELECT s.std_name, s.sclass, s.scl_name, s.adhar, i.img FROM student s JOIN image i ON s.adhar = i.adhar";
$stmt = mysqli_prepare($connection, $query);
if (!$stmt) {
    die("Query preparation failed: " . mysqli_error($connection));
}

if (!mysqli_stmt_execute($stmt)) {
    die("Query execution failed: " . mysqli_error($connection));
}

mysqli_stmt_bind_result($stmt, $name, $class, $scl_name, $adhar, $img_data);

while (mysqli_stmt_fetch($stmt)) {
    echo '<tr>';
    echo '<td>' . $name . '</td>';
    echo '<td>' . $class . '</td>';
    echo '<td>' . $scl_name . '</td>';
    echo '<td>' . $adhar . '</td>';

    $img = base64_decode($img_data);
    if ($img) {
        $img_type = exif_imagetype($img);
        $mime_type = image_type_to_mime_type($img_type);
        $image_data = base64_encode($img);

        echo '<td><img src="data:' . $mime_type . ';base64,' . $image_data . '" /></td>';
    } else {
        echo '<td>No Image Found</td>';
    }
    echo '</tr>';
}
               

            mysqli_stmt_close($stmt);
            mysqli_close($connection);
            ?>
        </table>
    </center>
</body>
</html>
