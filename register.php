<?php  
$con = mysql_connect("localhost","root","");  
mysql_select_db("mcqs", $con);  


 				@$std_id =  $_REQUEST['stdid'];
                                @$std_name = $_REQUEST['sname'];
                                @$fname = $_REQUEST['fname'];
                                @$dob = $_REQUEST['dob'];
                                @$sclass =  $_REQUEST['sclass'];
                                @$rollno = $_REQUEST['rollno']
                                @$school = $_REQUEST['school'];
                                @$gender=  $_REQUEST['gender'];
                                @$city = $_REQUEST['city'];
                                @$district = $_REQUEST['district'];
                                @$state = $_REQUEST['state'];
                                @$zip = $_REQUEST['zip'];
                                @$email = $_REQUEST['email'];
                                @$mobile = $_REQUEST['mobile'];
                                @$stream = $_REQUEST['stream'];
                                @$rollno = $_REQUEST['rollno'];

if(@$_POST['submit'])  
{  
echo $s="INSERT INTO student values ('$std_name', '$fname', '$dob', '$sclass', '$school', '$gender', '$city', '$district', '$state', '$zip', '$email', '$mobile', '$stream', '$rollno')";  
echo "Your Data Inserted successfully";  
mysql_query($s);  
}  
?>   
<html>  
<body bgcolor="pink">
<center>  
<form method="post"> 
<h2>Student Registration From</h2> 
<table border="1" bgcolor="#00CCFF">  
<tr><td>Name</td>  
<td><input type="text" name="name"/></td>  
</tr>  
<tr><td rowspan="2">Sex</td>  
<td><input type="radio" name="sex" value="Male"/>Male</td>  
<tr>  
<td><input type="radio" name="sex" value="Female"/>Female</td></tr>  
</tr>  
<tr><td><input type="submit" name="submit" value="Submit"/></td></tr>  
</table>  
</form>  
</center>  
</body>  
</html>  