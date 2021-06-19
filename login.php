<?PHP 
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'functions.php';

	//session_start();
	$fingerprint = fingerprint();
	$db_link = connect();

	if(isset($_POST['login'])){

		// Include passwort pepper
		//require 'config/pepper.php';

		// Sanitize user input
		$log_user = sanitize($db_link, $_POST['log_user']);
		$log_pw = sanitize($db_link, $_POST['log_pw']);

		// Select user details from USER
		$sql_log = "SELECT * FROM user, ugroup WHERE user.ugroup_id = ugroup.group_id AND user_name = '$log_user'";
		$query_log = mysqli_query($db_link, $sql_log);
		checkSQL($db_link, $query_log);
		$result_log = mysqli_fetch_assoc($query_log);
		$pepper = 'g7NIiru!!8';
        //'g7NIiru!!8'
		// Verify Password
		if(password_verify($log_pw, $result_log['user_pw'])){

			// Define Session Variables for this User
			$_SESSION['log_user'] = $log_user;
			$_SESSION['log_time'] = time();
			$_SESSION['log_id'] = $result_log['id'];
			$_SESSION['log_ugroup'] = $result_log['group_name'];
			//$_SESSION['log_admin'] = $result_log['ugroup_admin'];
			//$_SESSION['log_delete'] = $result_log['ugroup_delete'];
			//$_SESSION['log_report'] = $result_log['ugroup_report'];
			$_SESSION['log_fingerprint'] = $fingerprint;
            
			
			header('Location: start.php');
			}
		else showMessage('Authentification failed!\nWrong Username and/or Password!');
	}
?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="css/farm.css" />
	<body>
		<div class="content_center" style="width:100%; margin-top:15em">

		<!-- LEFT SIDE: mangoO Logo -->
		<div class="content_left" style="width:50%; padding-right:5em; text-align:right;">
		</div>

		<!-- RIGHT SIDE: Login Form -->
		<div class="content_center" style="width:50%; padding-left:5em; text-align:left;background-image:url(img/maize1.jpg)">

			<p class="heading" style="margin:0; text-align:left;">Please login...</p>

			<form action="login.php" method="post">
				<table id="tb_fields" style="margin:0; border-spacing:0em 1.25em;">
					<tr>
						<td>
							<input type="text" name="log_user"  placeholder="Username" />
						</td>
					</tr>
					<tr>
						<td>
							<input type="password" name="log_pw" placeholder="Password" />
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" name="login" value="Login">
						</td>
					</tr>
				</table>
			</form>

		</div>

	</body>
