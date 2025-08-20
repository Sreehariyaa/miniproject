<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST['btn_sub']))
{
	$amount=$_POST['txt_amount'];
	$upQry="update tbl_request set request_status=5,request_amount='".$amount."'where request_id='".$_GET['payid']."'";
	if($Conn->query($upQry))
	{
    ?>
    <script>
	 alert("Payment Updated");
	window.location="ViewRequest.php";
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
  <table width="200" border="1" align="center">
  <?php
     $SelQry=" select * from tbl_request m 
	inner join tbl_vehicletype p on m.vehicletype_id=p.vehicletype_id
	inner join tbl_staff d on m.staff_id=d.staff_id 
	inner join tbl_user u on m.user_id=u.user_id where request_id='".$_GET['payid']."'"; 
	$res=$Conn->query($SelQry);
	while($data=$res->fetch_assoc())
	{
  ?>
    <tr>
      <td>Name</td>
      <td><?php echo $data['user_name'];?></td>
    </tr>
    <tr>
      <td>Content</td>
      <td><?php echo $data['request_content'];?></td>
    </tr>
    <tr>
      <td>Vechicle Name</td>
      <td><?php echo $data['vehicle_name'];?></td>
    </tr>
    <tr>
      <td>Staff Name</td>
      <td><?php echo $data['staff_name'];?></td>
    </tr>
    <tr>
      <td>Amount</td>
      <td><label for="txt_amount"></label>
      <input type="text" name="txt_amount" id="txt_amount" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Submit" /></td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
</html>