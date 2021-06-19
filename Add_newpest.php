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
		<p class="heading">New Farm Activity</p>

		<!-- CONTENT -->
		<div class="content_left">
			<form action="employee_new.php" method="post" onSubmit="return validate(this)" enctype="multipart/form-data">

				<table id ="tb_fields" style="max-width:1000px;">
					<tr>
						<td>Type:</td>
                        <td><input type="text" name="act_type" placeholder="eg planting" tabindex=1 /></td>
                     </tr>
                            <tr>
						<td>Cost:</td>
                        <td><input type="number" name="act_cost" placeholder="ksh" tabindex=2 /></td>
                    </tr>
					
					<tr>
						<td>Pest:</td>
						<td>
                            <select name="pest" size="2" tabindex="3">
                                <option value="" ></option>
                         </select>
                        </td>
                      </tr>
                      <tr>
						<td>Disease:</td>
						<td>
                            <select name="Disease" size="1" tabindex="4">
                                <option value=""></option>
                         </select>
                        </td>
					</tr>
					<tr>
						<td>Machinery:</td>
						<td>
                        <select name="machinery" size="1">
                        <option value="1">Machinery</option>
                        </select>
                        </td>
                   </tr>
                   <tr>
                       <td> Chemicals </td>
                       <td>
                           <input name="chemicals" type="text" placeholder="eg ..Actelic super" />
                      </td>
					<tr>
						<td>Date:</td>
						<td><input type="text" id="datepicker2" name="act_date" value="<?PHP echo date("d.m.Y", $timestamp) ?>" >
                    </td>
					</tr>
					<tr>
						<td colspan="4" class="center">
							<input type="submit" name="Addactivity" value="Add Activity" />
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
