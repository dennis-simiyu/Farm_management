<?PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	require 'functions.php';
	checkLogin();
	$db_link = connect();

	//Generate timestamp
	$timestamp = time();

	//Get the value from the form
	if (isset($_POST['Add_pest'])){
	  $pest_name = sanitize($db_link, $_POST['pest_name']);
	  $pest_type = sanitize($db_link, $_POST['pest_type']);
	  $pest_farm = sanitize($db_link, $_POST['pest_farm']);
	  $pest_crop = sanitize($db_link, $_POST['pest_crop']);
	  $pest_date = sanitize($db_link, $_POST['pest_date']);
	  $pest_description = sanitize($db_link, $_POST['pest_description']);

	  //insert the values into the database

	  $sql_insertPest = "INSERT INTO pests(pest_name, pest_type, farm, crop, dates,pest_description)
						 VALUES('$pest_name', '$pest_type', '$pest_farm', '$pest_crop','$pest_date','$pest_description')";
						 
	  $query_insertPest = mysqli_query($db_link, $sql_insertPest);
	  checkSQL($db_link, $query_insertPest);
		
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
            <a href="Add_newdisease.php">Diseases</a>
            <a href="Add_newpest.php" id="item_selected">Pests<a>
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
                        <td><input type="text" name="pest_name" placeholder="eg certerpilers" tabindex=1 /></td>
                     </tr>
                            <tr>
						<td>Type:</td>
                        <td><input type="text" name="pest_type" placeholder="" tabindex=2 /></td>
                    </tr>
					
					<tr>
						<td>crop:</td>
						<td>
                            <select name="pest_crop" size="2" tabindex="3">
                                <option value="" ></option>
                         </select>
                        </td>
                      </tr>
                      <tr>
						<td>Farm:</td>
						<td>
                            <select name="pest_farm" size="1" tabindex="4">
                                <option value=""></option>
                         </select>
                        </td>
					</tr>
					<tr>
						<td>Date:</td>
						<td><input type="text" id="datepicker2" name="pest_date" value="<?PHP echo date("d.m.Y", $timestamp) ?>" >
                    </td>
					</tr>
					<tr>
						<td colspan="4" class="center">
							<input type="submit" name="Add_pest" value="Add Pest" />
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
