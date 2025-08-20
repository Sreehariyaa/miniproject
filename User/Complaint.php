<?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST['btn_sub']))
{
	$content=$_POST['txt_con'];
	$mech=$_GET['shid'];
	 $insqry="insert into tbl_complaint(complaint_content,complaint_date,mechanicshop_id,user_id)values('".$content."',curdate(),'".$mech."','".$_SESSION['uid']."')";
	if($Conn->query($insqry))
	{
		?>
		<script>
        	alert("Complaint Send");
			window.location="Complaint.php";
        </script>
        <?php
	}
}
if(isset($_GET['did']))
{
    $delQry = "DELETE FROM tbl_complaint WHERE complaint_id='".$_GET['did']."'";
    if($Conn->query($delQry))
    {
        ?>
        <script>
        alert("Deleted");
        window.location="Complaint.php";
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
      <td>Content</td>
      <td><label for="txt_con"></label>
      <textarea name="txt_con" id="txt_con" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Submit" /></td>
    </tr>
  </table>
  <br />
  <table width="200" border="1" align="center">
    <tr>
      <td>Sl.no</td>
      <td>Content</td>
      <td>Date</td>
      <td>Reply</td>
      <td>Action</td>
    </tr>
    <?php
	$i="";
    $SelQry="select * from tbl_complaint";
	$res=$Conn->query($SelQry);
	while($data=$res->fetch_assoc())
	{
		$i++;
	
	?>
    <tr>
      <td><?php echo $i?></td>
      <td><?php echo $data['complaint_content'];?></td>
      <td><?php echo $data['complaint_date'];?></td>
      <td><?php echo $data['complaint_reply'];?></td>
      <td><a href="Complaint.php?did=<?php echo $data['complaint_id']?>">Delete</a></td>
    </tr>
    <?php
	}
	?>
  </table>
</form>
</body>
</html>