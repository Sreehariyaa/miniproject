<?php
include("../Assets/Connection/Connection.php");
session_start();
 
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>Sl.no</td>
      <td>Content</td>
      <td>User</td>
      <td>Date</td>
      <td>Reply</td>
      <td>Action</td>
    </tr>
        <?php
	$i="";
    $SelQry="select * from tbl_complaint m 
	inner join tbl_user p on p.user_id=m.user_id";
	$res=$Conn->query($SelQry);
	while($data=$res->fetch_assoc())
	{
		$i++;
	
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data['complaint_content'];?></td>
      <td><?php echo $data['user_name'];?></td>
      <td><?php echo $data['complaint_date'];?></td>
      <td><?php echo $data['complaint_reply'];?></td>
      <td>    <td>
      <?php
	  if($data['complaint_status']==0)
	  {
		  ?>
          <a href="Reply.php?reid=<?php echo $data['complaint_id']?>">Reply</a></td>
          <?php
	  }
	  else if($data['complaint_status']==1)
	  {
		  echo "Accept";
	  }
	   else if($data['complaint_status']==2)
	  {
		  echo "Reject";
	  }
		  ?>
    </tr>
    <?php
	}
	?>
   
  </table>
</form>
</body>
</html>