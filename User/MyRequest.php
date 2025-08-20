<?php
include("../Assets/Connection/Connection.php");

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
      <td>Shop</td>
      <td>Amount</td>
      <td>Action</td>
    </tr>
    <?php
	$i="";
    $SelQry=" select * from tbl_request m 
	inner join tbl_vehicletype p on p.vehicletype_id=m.vehicletype_id
	inner join tbl_mechanicshop d on d.mechanicshop_id=m.mechanicshop_id ";
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
      <td><?php echo $data['mechanicshop_name'];?></td>
      <td><?php 
	  
	  if( $data['request_amount']=="")
	  {
		  echo "pending";
	  }
	  else
	  {  
	  echo $data['request_amount'] ; 
      }
	  ?>
      </td>
     
      <td>
      <?php
       if($data['request_status']==0)
	  {
		  echo "Request Pending..";
	  }
	  else if($data['request_status']==1)
	  {
		  echo "Accepted";
	  }
	   else if($data['request_status']==2)
	  {
		  echo "Rejected";
	  }
	   else if($data['request_status']==4)
	   {
		   echo " Work Completed";
	   }
	    else if($data['request_status']==5)
	   {
		   ?>
           <a href="Payment.php?rid=<?php echo $data['request_id']?>">PayBill</a>
           <?php
	   }
	   else if($data['request_status']==6)
	   {
		   echo "Payment Completed";
		   ?>
		  
          <a href="Complaint.php?shid=<?php echo $data['mechanicshop_id']?>">Complaint</a>
          <br />
           <a href="Rating.php?shid=<?php echo $data['mechanicshop_id']?>">Rating</a>
          <?php
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