<?php 
ob_start();

session_start(); 

include "db_conn.php";

if (isset($_POST['adhar']) && isset($_POST['pwd'])) 
{

    function validate($data){
       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $adhar = validate($_POST['adhar']);

    $pwd = validate($_POST['pwd']);


    if (empty($adhar)) 
    {

        header("Location: index.php?error=User Name is required");

        exit();

    }
    else if(empty($pwd))
    {

        header("Location: index.php?error=Password is required");

        exit();

    }
    else{


       $sql = "SELECT * FROM student WHERE adhar='$adhar' AND pwd='$pwd'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);

    if ($row['adhar'] === $adhar && $row['pwd'] === $pwd) {
        $_SESSION['adhars'] = $row['adhar'];

        header("Location: home.php");
        exit();
    } else {
        header("Location: index.php?error=Incorrect Username or Password");
        exit();
    }
} else {
    header("Location: index.php?error=Incorrect Username or Password");
    exit();
}
    }

}else{

    header("Location: index.php");

    exit();

}
?>