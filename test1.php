<html>
<head>
<title>Students Progress Report</title>
<style>
    body {
        background-color: lightblue;
        text-align: center;
        }            
</style>
</head>
<body>
    <center>
        


<?php
//connect to mysql server with username password and database name
$connect = mysqli_connect("localhost", "root", "", "mcqs");
// Check connection
if ($connect === false) {
    die("Opps Unable to connect " . mysqli_connect_error());
}
// create query to select data

$sql="SELECT s.rollno, s.std_name, s.sclass, s.scl_name, s.adhar, i.img FROM student s JOIN image i ON s.adhar = i.adhar";
if ($result = mysqli_query($connect, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        
        echo "<h1><tr><th>Progress Preport Card</th></tr></h1>";
        echo '<table border="1px" align ="center" width = auto>';
        '<style>
                th, td {
                  color: blue;
                }
                th.subject, td.subject {
                  color: green;
                }
                th.marks, td.marks {
                  color: red;
                }
                th.grade, td.grade {
                  color: purple;
                }
              </style>';
       
        while ($row = mysqli_fetch_array($result)) {
             echo "<tr><th>School Name</th>";
            echo "<td>" . $row['scl_name'] . "</td></tr>";
            echo "<tr>";
            echo "<th>Roll No.</th>";
            echo "<td>" . $row['rollno'] . "</td></tr>";
            echo "<th>Student Name</th>";
            echo "<td>" . $row['std_name'] . "</td>";
            //echo "<td ><th>Image</th>";
            echo "<td>" . "<img src=".$row['img'].' width=100px height="100px">' . "</td>";
           
            echo "<tr><th>Class</th>";
            echo "<td>" . $row['sclass'] . "</td></tr>";
            echo "<tr><th>Aadhar</th>";
            echo "<td>" . $row['adhar'] . "</td></tr>";

            echo "</tr>";
            
            echo "<tr><th>Subject</th>";
            echo "<th>Obtained Marks</th>";
            echo "<th>Grade</th>";
            echo "<tr><th>Math</th>";
echo '<td style="color: red;">' . $row['0'] . '</td>';
            //echo "<td>" . $row['0'] . "</td>";
            echo "<td>" . $row['0'] . "</td></tr>";
            echo "<tr><th>Science</th>";
            echo "<td>" . $row['0'] . "</td>";
            echo "<td>" . $row['0'] . "</td></tr>";
            echo "<tr><th>Hindi</th>";
            echo "<td>" . $row['0'] . "</td>";
            echo "<td>" . $row['0'] . "</td></tr>";
            echo "</tr>";
            echo "<tr><th>English</th>";
            echo "<td>" . $row['0'] . "</td>";
            echo "<td>" . $row['0'] . "</td></tr>";
            echo "<tr><th>EWS</th>";
            echo "<td>" . $row['0'] . "</td>";
            echo "<td>" . $row['0'] . "</td></tr>";
            echo "<tr><th>Sanskrit</th>";
            echo "<td>" . $row['0'] . "</td>";
            echo "<td>" . $row['0'] . "</td></tr>";
            
            echo "<tr><th>Total Obtained Marks</th>";
            echo "<td>" . $row['0'] . "</td></tr>";
            echo "<tr><th>Result :</th>";
            echo "<td>" . $row['0'] . "</td></tr>";

            
            echo "<tr><th>.</th></tr>";
            echo "<tr><th>.</th></tr>";
            echo "<tr><th>.</th></tr>";
            echo "<tr><th>.</th></tr>";
            echo "<tr><th>.</th></tr>";
            echo "<th>Signature of Guardian </th>";
            echo "<th>      </th>";
                        
            echo "<th>Signature of Principal</th>";
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

 </table>
    </center>
</body>
</html>


