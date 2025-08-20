<?php
include("../Assets/Connection/Connection.php");
session_start();


if(isset($_GET['rdid']))
{
$reach= "Update tbl_request set request_status=3 where request_id=".$_GET['rdid'];
if($Conn->query($reach))
{
	?>
    <script>
	alert("Reached ");
	window.location="ViewWork.php";
	</script>
    <?php
}
}
if(isset($_GET['cid']))
{
$reach= "Update tbl_request set request_status=4 where request_id=".$_GET['cid'];
if($Conn->query($reach))
{
	?>
    <script>
	alert("Completed");
	window.location="ViewWork.php";
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
    <tr>
      <td>Sl No</td>
      <td>Date</td>
      <td>Content</td>
      <td>Vehicle</td>
      <td>User</td>
      <td>Action</td>
    </tr>
        <?php
	$i="";
    $SelQry="select * from tbl_request m 
	inner join tbl_vehicletype p on p.vehicletype_id=m.vehicletype_id
	inner join tbl_user d on d.user_id=m.user_id where staff_id='".$_SESSION['sid']."'";
	$res=$Conn->query($SelQry);
	while($data=$res->fetch_assoc())
	{
		$i++;
	?>
    
    <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $data['request_date'];?></td>
      <td><?php echo $data['request_content'];?></td>
      <td><?php echo $data['vehicle_name'];?></td>
      <td><?php echo $data['user_name'];?></td>
      <td>
         <?php
      if($data['request_status']==1)
	  {
	    ?>
          <a href="ViewWork.php?rdid=<?php echo $data['request_id']; ?>"/>Reached</a>
       
       <?php
	  }
	   else if($data['request_status']==3)
	   {
		   ?>
		  <a href="ViewWork.php?cid=<?php echo $data['request_id']; ?>"/>Complete</a>
          <?php
	   }
	   else if($data['request_status']==4)
	   {
		  echo "Completed Work";
	   } 
	   else if($data['request_status']==5)
	   {
		  echo "Payment Pending";
	   }
	    else if($data['request_status']==6)
	   {
		  echo "Payment Completed";
	   }
	   
	   
		  ?>
          </td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
</html>