<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	require 'functions.php';
	checkLogin();
	//checkPermissionAdmin();
    $db_link = connect();
    $season = getSeasonName($db_link);

    if(isset($_POST['add_activity']))
    {
     $activity_type  = sanitize($db_link, $_POST['activity_type']);
     $machines = sanitize($db_link, $_POST['machinery_used']);
     $chemicals = sanitize($db_link, $_POST['chemicals_used']);
     $fertilizers = sanitize($db_link, $_POST['fertilizer_used']);
     $cost = sanitize($db_link, $_POST['cost']);

     $sql_insert_activity = "INSERT INTO activity(act_type,machinery,chemicals,fertilizers,cost),
     VALUES($machines, $chemicals, $fertilizers, $cost)";
     $query_insert = mysqli_query($db_link, $sql_insert_activity);
     checkSQL($db_link,$query_insert);


    }


    

    

?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/farm.css"/>
</head>
<body>
<div id ="menu_main">
<a href="start.php">Home</a>
</div>
<div class ="content_left">
<p style="font-weight:Bold">Current Crop<p>
<form method="post" action="season.php" name="create_season">
</br>
</br>
<p>crop number<p>
</br>
<input name ="crop_number" type="text" placeholder="plot_1"/>
</br>
</br>
<p>crop name<p>
</br>
<input name="crop_name" type="text" placeholder="20Acres"/>
</br>
</br>
<p> farm</p>
</br>
<input name="soil" type="text"/>
</br>
</br>
<p>season</p>
</br>
<input name="season" type="text" />
</br>
</br>

<input name="update_farm" type ="submit" value="Update farm"/>
</form>
</div>
<div class ="content_right">
<div class = "content_left">
<p style="font-weight:Bold"> Add New Activity <p>
<form action="farm.php" method = "post">
</br>
</br>
<p>Type of Activity<p>
<br>
<input name ="activity_type" type="text" placeholder="Type of Activity"/>
</br>
</br>
<p>Machines <p>
</br>
<input name ="machinery_used" type="text" placeholder="Machinery"/>
<br>
<br>
<p> Chemicals<p>
</br>
<input name = "chemicals_used" type="text" placeholder="Chemicals"/>
<br>
<br>
<p> Fertilizers<p>
<br>
<input name ="fetilizer_used" type="text" placeholder="seeds planted"/>
<br>
</br>
<p>Disease<p>
<br>
<select name = "a_disease">
</select>
<br>
<br>
<p>Pests</p>
<br>
<select name="a_pest">
</select>
<br>
<br>
<p>Activity Description<p>
<br>
<input name="a_description" type="text" placeholder="description"/>
<br>
<br>
<p> Cost incurred <p>
<input name = "cost" type="numeric" placeholder="cost"/>
<br>
<br>
<input name="add_activity" type="Submit"  value="Add Activity"/>
</form>
</div>
<div class="content_right">
<div class="content_left">
<p style="font-weight:Bold"> Add Disease<p>
<br>
<input name ="activity_type" type="text" placeholder="Type of Activity"/>
</br>
</br>
<p>.name.<p>
</br>
<input name ="machinery_used" type="text" placeholder="Machinery"/>
<br>
<br>
<p>.Crop.<p>
</br>
<input name = "chemicals_used" type="text" placeholder="Chemicals"/>
<br>
<br>
<p>.farm.<p>
<br>
<input name ="fetilizer_used" type="text" placeholder="seeds planted"/>
<br>
</br>
<p>.Farming period.<p>
<input name = "cost" type="numeric" placeholder="cost"/>
<br>
<br>
<p>.Description.</p>
<br>
<input name = "description" type="text" placeholder="Description"/>
</br>
</br>
<input name="add_disease" type="submit" value="Add disease"/>
</div>
<div class="content_right">
<p style="font-weight:Bold;"> Add Pests <p>
<br>
<input name ="activity_type" type="text" placeholder="Type of Activity"/>
</br>
</br>
<p>.name.<p>
</br>
<input name ="machinery_used" type="text" placeholder="Machinery"/>
<br>
<br>
<p>.Crop.<p>
</br>
<input name = "chemicals_used" type="text" placeholder="Chemicals"/>
<br>
<br>
<p>.Farm.<p>
<br>
<input name ="fetilizer_used" type="text" placeholder="seeds planted"/>
<br>
</br>
<p>.Farming period.<p>
<input name = "cost" type="numeric" placeholder="cost"/>
<br>
<br>
<p>.Description</p>
<br>
<input name = "pest_description" type="text" placeholder="Description"/>
</br>
</br>
<input name="add_pests" type="submit" value="Add Pests"/>
</div>

</div>
</div>
<div id = "content_right">
<table id="tb_table">
<tr>
<th>number<th>
<th>Type<th>
<th>Machinery<th>
<th>Chemicals<th>
<th>Fetilizer<th>
<th>Cost<th>
</tr>
</table>
</div>
</body>
</html>