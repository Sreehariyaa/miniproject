<?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST['btn_sub']))
{
	$content=$_POST['txt_cont'];
	$vtid=$_POST['sel_vech'];
	{
	
	$insqry="insert into tbl_request(request_content,vehicletype_id,user_id,request_date,mechanicshop_id) values('".$content."','".$vtid."','".$_SESSION['uid']."',curdate(),'".$_GET['mid']."')";
	if($Conn->query($insqry))
	{
		?>
		<script>
        	alert("Request Send");
			window.location="MechanicshopList.php";
        </script>
        <?php
	}
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
  <table width="200" border="1">
    <tr>
      <td>Content</td>
      <td><label for="txt_cont"></label>
      <textarea name="txt_cont" id="txt_cont" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>Vechicle Type</td>
      <td><label for="sel_vech"></label>
        <select name="sel_vech" id="sel_vech">
          <option ="">select</option>
          <?php
		  $select="select * from tbl_vehicletype";
		  $res=$Conn->query($select);
		  while($data=$res->fetch_assoc())
		  {
		  ?>
          <option
           value="<?php echo $data['vehicletype_id'] ?>" ><?php echo $data['vehicle_name'] ?></option>
          <?php
		  }
          ?>
      </select></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>