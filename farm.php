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
</div>
<div class ="content_left">
<p style="font-weight:Bold">Current Farm<p>
<form method="post" action="season.php" name="create_season">
</br>
</br>
<p>farm number<p>
</br>
<input name ="farm_number" type="text" placeholder="plot_1"/>
</br>
</br>
<p>farm size<p>
</br>
<input name="farm_size" type="text" placeholder="20Acres"/>
</br>
</br>
<p> Soil ph</p>
</br>
<input name="soil" type="text" placeholder="Acidic/basic"/>
</br>
</br>
<p> Select season</p>
</br>
<select name="season_name">
<? while($season_id = $season)
{
    echo '<option value="'.$season_id['id'].'">'.$season_id['period_name'].$season_id['duration'].'/>';
}
?>
</select>
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
<p> Type Of Activity <p>
<br>
<input name ="activity_type" type="text" placeholder="Type of Activity"/>
</br>
</br>
<p>Type of Machines Used<p>
</br>
<input name ="machinery_used" type="text" placeholder="Machinery"/>
<br>
<br>
<p> Type of Chemicals Used <p>
</br>
<input name = "chemicals_used" type="text" placeholder="Chemicals"/>
<br>
<br>
<p> Type of fertilizers used <p>
<br>
<input name ="fetilizer_used" type="text" placeholder="seeds planted"/>
<br>
</br>
<p> Cost incurred <p>
<input name = "cost" type="numeric" placeholder="cost"/>
<br>
<br>
<input name="add_activity" type="Submit"  value="Add Activity"/>
</form>
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