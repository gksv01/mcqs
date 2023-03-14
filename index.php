<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login to Online test Portal</title>
  <link rel="stylesheet" type="text/css" href="text/css/style.css">
</head>
<body>
  <form action="login.php" method="post">
    <h2>LOGIN</h2>
    <?php if (isset($_GET['error'])) { ?>
      <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <label>User Name</label>
    <input type="varchar(16)" name="adhar" placeholder="User Name"><br>
    <label>Password</label>
    <input type="varchar(25)" name="pwd" placeholder="Password"><br> 
    <button type="submit">Login</button>
    <a href="reg.html"><button type="button">New User Register Here</button></a>
  </form>
</body>
</html>
