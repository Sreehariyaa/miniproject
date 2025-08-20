<?php
include("../Assets/Connection/Connection.php");

if(isset($_POST['btn_sub']))
{


$logo=$_FILES['file_logo']['name'];
$temp=$_FILES['file_logo']['tmp_name'];
move_uploaded_file($temp,"../Assets/Files/MechDocs/".$logo);

$lic=$_FILES['file_license']['name'];
$tmp=$_FILES['file_license']['tmp_name'];
move_uploaded_file($tmp,"../Assets/Files/MechDocs/".$lic);
$mechname=$_POST['txt_name'];
$mechemail=$_POST['txt_email'];
$mechcontact=$_POST['txt_contact'];
$mechaddress=$_POST['txt_address'];
$mechpass=$_POST['txt_pass'];
$placename=$_POST['sel_place'];
 echo $insqry="insert into tbl_mechanicshop(mechanicshop_name,mechanicshop_email,mechanicshop_contact,mechanicshop_address,mechanicshop_logo,mechanicshop_license,mechanicshop_password,place_id) values('".$mechname."','".$mechemail."','".$mechcontact."','".$mechaddress."','".$logo."','".$lic."','".$mechpass."','".$placename."')";
	if($Conn->query($insqry))
	{
		?>
		<script>
        	alert("Inserted");
			window.location="Mechanicshop.php";
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
      <input type="text" name="txt_name" id="txt_name" required /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="email" name="txt_email" id="txt_email" required /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" required /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <input type="text" name="txt_address" id="txt_address" required /></td>
    </tr>
    <tr>
      <td>Logo</td>
      <td><label for="file_logo"></label>
      <input type="file" name="file_logo" id="file_logo" required /></td>
    </tr>
    <tr>
      <td>License</td>
      <td><label for="file_license"></label>
      <input type="file" name="file_license" id="file_license"  required/></td>
    </tr>
    <tr>
      <td>District</td>
      <td><label for="sel_dist"></label>
        <select name="sel_dist" id="sel_dist" onChange="getPlace(this.value)">
         <option ="">select</option>
          <?php
		  $select="select * from tbl_district";
		  $res=$Conn->query($select);
		  while($data=$res->fetch_assoc())
		  {
		  ?>
          <option
           value="<?php echo $data['district_id'] ?>" ><?php echo $data['district_name'] ?></option>
          <?php
		  }
		  ?>
      </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><label for="sel_place"></label>
        <select name="sel_place" id="sel_place">
        <option value="">--SELECT--</option>
      </select></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_pass"></label>
      <input type="password" name="txt_pass" id="txt_pass" required /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_sub" id="btn_sub" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>


<script src="../Assets/JQ/jQuery.js"></script> 


<script>
    function getPlace(did) 
    {

        $.ajax({
        url:"../Assets/Ajaxpages/AjaxPlace.php?did="+did,
        success: function(html){
            $("#sel_place").html(html);
        }
        });
    }
</script>