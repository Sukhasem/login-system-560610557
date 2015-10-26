<?PHP
	session_start();
	$conn = oci_connect("system", "123456789", "//localhost/XE");
	if (!$conn) {
		$m = oci_error();
		echo $m['message'], "\n";
		exit;
	}
?>

<?PHP
	if(isset($_POST['submit_newpassword'])){
		$username = $_SESSION['USERNAME'];
		echo $username;
		$password = $_SESSION['PASSWORD'];
		$newpassword = trim($_POST['newpassword']);
		$query = "UPDATE AA_LOGIN SET PASSWORD = '$newpassword' WHERE username='$username' and password='$password'";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		echo "Password has been changed!";
	};
	oci_close($conn);
?>

Member page
<hr>
<?PHP
	echo "ID : ".$_SESSION['ID']."<br>";
	echo "NAME : ".$_SESSION['NAME']."<br>";
	echo "SURNAME : ".$_SESSION['SURNAME']."<br>";
	echo "USERNAME : ".$_SESSION['USERNAME']."<br>";
	echo "PASSWORD : ".$_SESSION['PASSWORD']."<br>";
	echo "<a href='Logout.php'>Logout</a>";
?>

<form action='MemberPage.php' method='post'>
<br><br>
	Change Password<br>
	<input name='newpassword' type='number'><br><br>
	<input name='submit_newpassword' type='submit' value='newpassword'><br>
</form>
