<?php


session_start();

$errorMessage='';
if (isset($_POST['txtUserId'])&&
isset ($_POST['txtPassword'])){
	include 'library/config.php';
	include 'library/opendb.php';


	$users = $_POST['txtUserId'];
	$Password = $_POST['txtPassword'];


	$sql = "SELECT Users from user where Users = '$users' AND Password = '$Password'";

	$result = mysqli_query($conn, $sql) or die ('Query failed.'.mysql_error());


	if (mysqli_num_rows($result)==1){

		$_SESSION['db_is_loggen_in']= true;

		header('Location: index.php');
		exit;

	}
else
{
	$errorMessage ='Sorry, wrong user id / Password';
}
	include 'library/closedb.php';
	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Basic Login</title>
		<meta http-equiv="Content-TYpe" content="text/html; charset=iso-8859-1">
	</head>
	<body>
		<?php
		if ($errorMessage !=''){
		?>
		<p><div align="center"><span class="style5"><?php echo $errorMessage; ?>
		</span> </p>
		<?php
	}
	?>

	</div>
	</div>
	<form action ="" method="post" name="FrmLogin" id="frmLogin">
	<table width="400" border="1" align="center">
	<tr>
	<th width="160" scope="col"><div align="left">User ID</div></th>
	<th width="224" scope="col"><div align="left">
	<input name="txtUserId" type="text" id="txtUserId">
	</div> </th>
	</tr>
	<tr>
		<td><div align ="left">Password</div></td>
		<td><input name="txtPassword" type="password" id="txtPassword">

		</td></tr>
	<tr>
		<td>&nbsp;</td>
		<td><input name="btnLogin" type="submit" id="btnLogin" value="Login"></td>
		</tr>
	</table>
	</form>
	</body>
	</html>
























	
	</body>
	</html>