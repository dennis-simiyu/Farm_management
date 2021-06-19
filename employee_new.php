<?PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	require 'functions.php';
	checkLogin();
	$db_link = connect();

	//Generate timestamp
	$timestamp = time();

	//CREATE-Button
	if (isset($_POST['create'])){

		//Sanitize user input
		$empl_no = sanitize($db_link, $_POST['empl_no']);
		$empl_name = sanitize($db_link, $_POST['empl_name']);
		$empl_dob = strtotime(sanitize($db_link, $_POST['empl_dob']));
		$empl_gender = sanitize($db_link, $_POST['empl_gender']);
		$empl_maritalStatus = sanitize($db_link, $_POST['empl_maritalStatus']);
		$empl_position = sanitize($db_link, $_POST['empl_position']);
		$empl_salary = sanitize($db_link, $_POST['empl_salary']);
		$empl_address = sanitize($db_link, $_POST['empl_address']);
		$empl_phone = sanitize($db_link, $_POST['empl_phone']);
		$empl_email = sanitize($db_link, $_POST['empl_email']);
		$empl_start = strtotime(sanitize($db_link, $_POST['empl_in']));

		//Insert new employee into EMPLOYEE
		$sql_insert = "INSERT INTO employee (empl_number, empl_name, empl_maritalStatus, empl_gender, empl_address, empl_dob, 
        empl_phone, empl_email, empl_position, empl_salary, empl_start, empl_lupd, user_id) 
        VALUES ('$empl_no', '$empl_name', '$empl_maritalStatus', '$empl_gender', '$empl_address', '$empl_dob', '$empl_phone', 
        '$empl_email', '$empl_position', '$empl_salary', $empl_start, $empl_start, '$_SESSION[log_id]')";
		$query_insert = mysqli_query($db_link, $sql_insert);
		checkSQL($db_link, $query_insert);

		//Get new Employees's ID from EMPLOYEE
		$sql_maxid = "SELECT MAX(empl_id) FROM employee";
		$query_maxid = mysqli_query($db_link, $sql_maxid);
		checkSQL($db_link, $query_maxid);
		$maxid = mysqli_fetch_assoc($query_maxid);
		$_SESSION['empl_id'] = $maxid['MAX(empl_id)'];

		// Refer to empl_new_pic.php
		header('Location: empl_current.php');
	}

	

	//Build new EMPL_NO
	$newEmplNo = buildEmplNo($db_link);
?>

<!DOCTYPE HTML>
<html>
	<head>
    <link rel="stylesheet" type="text/css" href="css/farm.css"/>
		<script>
			function validate(form){
				fail = validateName(form.empl_name.value)
				fail += validateDob(form.empl_dob.value)
				fail += validateAddress(form.empl_address.value)
				fail += validatePhone(form.empl_phone.value)
				fail += validateEmail(form.empl_email.value)
				if (fail == "") return true;
				else { alert(fail); return false; }
			}
		</script>
		<script src="functions_validate.js"></script>
	</head>
	<body>
		<!-- MENU -->
		<div id="menu_main">
			<!-- <a href="empl_search.php">Search</a> -->
			<a href="employee_new.php" id="item_selected">New Employee</a>
			<a href="empl_current.php">Current Employees</a>
		</div>

		<!-- PAGE HEADING -->
		<p class="heading">New Employee</p>

		<!-- CONTENT -->
		<div class="content_center">
			<form action="employee_new.php" method="post" onSubmit="return validate(this)" enctype="multipart/form-data">

				<table id ="tb_fields" style="max-width:1000px;">
					<tr>
						<td>Number:</td>
						<td><input type="text" name="empl_no" value="<?PHP echo $newEmplNo; ?>" tabindex=1 /></td>
						<td>Monthly Salary:</td>
						<td><input type="number" name="empl_salary" placeholder="ksh" tabindex=7 /></td>
					</tr>
					<tr>
						<td>Name:</td>
						<td><input type="text" name="empl_name" placeholder="Full Name" tabindex=2 /></td>
						<td>Address:</td>
						<td><input type="text" name="empl_address" placeholder="Place of Residence" tabindex=8 /></td>
					</tr>
					<tr>
						<td>Gender:</td>
						<td>
                        <select name="empl_gender" size="1" tabindex="3">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        </select>
						</td>
						<td>Phone No:</td>
						<td><input type="text" name="empl_phone" tabindex=9 /></td>
					</tr>
					<tr>
						<td>DoB:</td>
						<td><input type="text" id="datepicker" name="empl_dob" placeholder="DD.MM.YYYY" tabindex=4 /></td>
						<td>E-Mail:</td>
						<td><input type="text" name="empl_email" placeholder="abc@xyz.com" tabindex=10 /></td>
					</tr>
					<tr>
						<td>Marital Status:</td>
						<td>
							<select name="empl_maritalStatus" size="1" tabindex=5>';
								
									<option value="married"> Married</option>
                                    <option value="single"> Single</option>
                                    <option value="divorced"> Divorced </option>
							</select>
						</td>
						<td>Employm. Start:</td>
						<td><input type="text" id="datepicker2" name="empl_in" value="<?PHP echo date("d.m.Y", $timestamp) ?>" 
                        tabindex=11 /></td>
					</tr>
					<tr>
						<td>Position:</td>
						<td><input type="text" name="empl_position" placeholder="Job description" tabindex=6 /></td>
					</tr>
					<tr>
						<td colspan="4" class="center">
							<input type="submit" name="create" value="Continue" tabindex=12 />
						</td>
						<td></td>
						<td></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>
