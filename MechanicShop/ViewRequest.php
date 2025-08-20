<?php
include("../Assets/Connection/Connection.php");
session_start();
?>
<?php


if(isset($_GET['uid']))
{
$reject= "Update tbl_request set request_status=2 where request_id=".$_GET['uid'];
if($Conn->query($reject))
{
	?>
    <script>
	alert("Request Rejeceted");
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
    <tr>
      <td>SL No</td>
      <td>Content</td>
      <td>Vehicle</td>
      <td>Date</td>
      <td>User Name</td>
      <td>Amount</td>
      <td>Action</td>
    </tr>
    <?php
	$i="";
    $SelQry=" select * from tbl_request m 
	inner join tbl_vehicletype p on p.vehicletype_id=m.vehicletype_id
	inner join tbl_user d on d.user_id=m.user_id where mechanicshop_id='".$_SESSION['mid']."'";
	$res=$Conn->query($SelQry);
	while($data=$res->fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data['request_content'];?></td>
      <td><?php echo $data['vehicle_name'];?></td>
      <td><?php echo $data['request_date'];?></td>
      <td><?php echo $data['user_name'];?></td>
     <td> 
        <?php
	   if( $data['request_amount']=="")
	  {
		    ?>
		<a href="Addpay.php?payid=<?php echo $data['request_id']; ?>"/>Bill</a> 
        <?php 	  
		}
	    else
	  {  
	  echo $data['request_amount'] ;  
      }?>
	  </td>
      <td>
      <?php
	  
	  if($data['request_status']==0)
	  {
		  ?>
          <a href="AssignStaff.php?rid=<?php echo $data['request_id']; ?>"/>Accept</a>
       <a href="ViewRequest.php?uid=<?php echo $data['request_id']; ?>"/>Reject</a></td>
          <?php
	  }
	  else if($data['request_status']==1)
	  {
		  echo "Accepted";
	  }
	   else if($data['request_status']==2)
	  {
		  echo "Rejected";
	  }
	   else if($data['request_status']==3)
	  {
		  echo "Reached";
	  }
	   else if($data['request_status']==4)
	  {
		  echo "Work Completed";
	  }
	  else if($data['request_status']==5)
	  {
		  echo "Payment Pending ";
		
	  }
	    else if($data['request_status']==6)
	  {
		  echo "Payment Completed ";
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