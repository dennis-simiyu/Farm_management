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
	if (isset($_POST['Add_disease'])){
		$disease_name = sanitize($db_link, $_POST['disease_name']);
		$disease_type = sanitize($db_link, $_POST['disease_type']);
		$disease_farm = sanitize($db_link, $_POST['disease_farm']);
		$disease_crop = sanitie($db_link, $_POST['disease_crop']);
		$disease_date = sanitize($db_link, $_POST['disease_date']);
		$disease_description = sanitize($db_link,$_POST['disease_description']);

	  $sql_insertDisease = "INSERT INTO disease(d_name, d_type, d_farm,d_crop,d_date,d_description)
							VALUES('$disease_name', '$disease_type', '$disease_farm', '$disease_crop', '$disease_date','$disease_description')";
	
	$query_insertDisease = mysqli_query($db_link, $sql_insertDisease);
	checkSQL($db_link, $query_insertDisease);
		
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
            <a href="start.php">Home</a>
			<a href="Add_newActivity.php">New Activity</a>
            <a href="Add_newdisease.php" id="item_selected">Diseases</a>
            <a href="Add_newpest.php">Pests<a>
            <a href="new_farm.php">Farm</a>
            <a href="new_crop.php">Crops</a>
            
		</div>

		<!-- PAGE HEADING -->
		<p class="heading">Add Pest</p>

		<!-- CONTENT -->
		<div class="content_left">
			<form action="employee_new.php" method="post" onSubmit="return validate(this)" enctype="multipart/form-data">

				<table id ="tb_fields" style="max-width:1000px;">
					<tr>
						<td>Name:</td>
                        <td><input type="text" name="disease_name" placeholder="" tabindex=1 /></td>
                     </tr>
                            <tr>
						<td>Type:</td>
                        <td><input type="text" name="disease_type" placeholder="" tabindex=2 /></td>
                    </tr>
					
					<tr>
						<td>crop:</td>
						<td>
                            <select name="disease_crop" size="2" tabindex="3">
                                <option value="" ></option>
                         </select>
                        </td>
                      </tr>
                      <tr>
						<td>farm:</td>
						<td>
                            <select name="disease_farm" size="1" tabindex="4">
                                <option value=""></option>
                         </select>
                        </td>
					</tr>
					<tr>
						<td>Date:</td>
						<td><input type="text" id="datepicker2" name="disease_date" value="<?PHP echo date("d.m.Y", $timestamp) ?>" >
                    </td>
					</tr>
					<tr>
						<td colspan="4" class="center">
							<input type="submit" name="Add_disease" value="Add Disease" />
						</td>
						<td></td>
						<td></td>
					</tr>
				</table>
			</form>
        </div>
        <div class="content_right">
        </div>
        <div class="footer">
        </div>
	</body>
</html>
