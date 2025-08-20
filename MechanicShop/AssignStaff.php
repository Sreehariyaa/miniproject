<?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_GET['sid']))
{
	$upqr="update tbl_request set staff_id='".$_GET['sid']."'where request_id=".$_GET['rid'];
	if($Conn->query($upqr))
  {
    $Accept= "Update tbl_request set request_status=1 where request_id=".$_GET['rid'];
    if($Conn->query($Accept))
	?>
    <script>
	alert("Staff Assigned");
	window.location="AssignStaff.php?rid=<?php echo $_GET['rid']?>";
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
	$selplace="select * from tbl_staff p inner join tbl_mechanicshop d on p.mechanicshop_id=d.mechanicshop_id where d.mechanicshop_id='".$_SESSION['mid']."'";
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
      <td><a href="AssignStaff.php?sid=<?php echo $data['staff_id']?>&rid=<?php echo $_GET['rid']?>">Assign</a></td>
    </tr>
    <?php
	}
	?>
    
  </table>
</form>
</body>
</html>