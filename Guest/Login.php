<?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST['btn_log']))
{
  $email=$_POST['txt_email'];
  $pass=$_POST['txt_pass'];	
  
  $selQry="select * from tbl_mechanicshop where mechanicshop_email='".$email."' and mechanicshop_password='".$pass."' ";
  $result=$Conn->query($selQry);
  
  $selQry1="select * from tbl_admin where admin_email='".$email."' and admin_pass='".$pass."'";
  $result1=$Conn->query($selQry1);
  
  $selQry2="select * from tbl_user where user_email='".$email."' and user_pass='".$pass."' ";
  $result2=$Conn->query($selQry2);
  
  $selQry3="select * from tbl_staff where staff_email='".$email."' and staff_password='".$pass."' ";
  $result3=$Conn->query($selQry3);
  if($row=$result->fetch_assoc())
  {
	  if($row['mechanicshop_status']==1)
	  {
		  $_SESSION['mid']=$row['mechanicshop_id'];
		  $_SESSION['mname']=$row['mechanicshop_name'];
		  header("location:../MechanicShop/HomePage.php");
	  }
	  else if($row['mechanicshop_status']==2)
	  {
		  ?>
		  <script>
          alert("Verification Rejected");
          window.location="Login.php";
          </script>
          <?php
	  }
	  else
	  {
		  ?>
		  <script>
          alert("Verification Pending");
          window.location="Login.php";
          </script>
          <?php
	  }
  }
  else if($row1=$result1->fetch_assoc())
  {
	  $_SESSION['aid']=$row1['admin_id'];
	  $_SESSION['aname']=$row1['admin_name'];
	  header("location:../Admin/AdminDash.php");
  }
  else if($row2=$result2->fetch_assoc())
  {
	  $_SESSION['uid']=$row2['user_id'];
	  $_SESSION['uname']=$row2['user_name'];
	  header("location:../User/UserDash.php");
	  
  }
  else if($row3=$result3->fetch_assoc())
  {
	  $_SESSION['sid']=$row3['staff_id'];
	  $_SESSION['sname']=$row3['staff_name'];
	  header("location:../Staff/StaffDash.php");
	  
  }
  {
	  ?>
      <script>
	  alert("Invalid Login");
	  window.location="Login.php";
	  </script>
      <?php
  }
}

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1"align="center">
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_pass"></label>
      <input type="password" name="txt_pass" id="txt_pass" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_log" id="btn_log" value="Login" /></td>
    </tr>
  </table>
</form>
</body>
</html>