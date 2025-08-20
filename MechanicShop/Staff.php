<?php
include"../Assets/Connection/Connection.php";
session_start();
if(isset($_POST['btn_sub']))
{
$photo=$_FILES['file_photo']['name'];
$temp=$_FILES['file_photo']['tmp_name'];
move_uploaded_file($temp,"../Assets/Files/StaffDocs/".$photo);
$uname=$_POST['txt_name'];
$uemail=$_POST['txt_email'];
$ucontact=$_POST['txt_contact'];
$upass=$_POST['txt_pass'];
$InQry="insert into tbl_staff (staff_name,staff_email,staff_contact,staff_password,staff_photo,mechanicshop_id)values ('".$uname."','".$uemail."','".$ucontact."','".$upass."','".$photo."','".$_SESSION['mid']."')";
	if($Conn->query($InQry))
	{
		?>
		<script>
        	alert("Inserted");
			window.location="Staff.php";
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
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1" align="center">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required/></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" required/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact"required /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="file_photo"></label>
      <input type="file" name="file_photo" id="file_photo" required /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_pass"></label>
      <input type="password" name="txt_pass" id="txt_pass" required/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Submit" /></td>
    </tr>
  </table>
  <br />
  <table width="237" border="1" align="center">
    <tr>
      <td>Sl NO</td>
      <td>Name</td>
      <td>Email</td>
      <td>Contact</td>
      <td>Shop Name
      <td>Photo</td>
      <td>Action</td>
    </tr>
    <?php
	$i=0;
	$selplace="select * from tbl_staff p inner join tbl_mechanicshop d on p.mechanicshop_id=d.mechanicshop_id where d.mechanicshop_id='".$_SESSION['mid']."'" ;
	$res=$Conn->query($selplace);
	while($data=$res->fetch_assoc())
	{
		$i++;
		
	?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data['staff_name']; ?></td>
      <td><?php echo $data['staff_email']; ?></td>
      <td><?php echo $data['staff_contact']; ?></td>
      <td><?php echo $data['mechanicshop_name']; ?></td>
      <td><img width="50" height="50" src="../Assets/Files/StaffDocs/<?php echo $data['staff_photo'];?>"</td>
      <td></td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
</html>