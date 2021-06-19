<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	require 'functions.php';
	checkLogin();
	//checkPermissionAdmin();
	$db_link = connect();

	if(isset($_POST['new_season']))
	{   //prepare the user input for the insert into the database

		$season_name = sanitize($db_link, $_POST['season_name']);
		$season_start = sanitize($db_link, $_POST['season_start']);
		$season_end = sanitize($db_link, $_POST['season_end']);

		//insert the new season into ths seasons table
		$sql_insert_season = "INSERT INTO season
		   (period_name,start_date, end_date)
		   VALUES
		   ('$season_name', $season_start,$season_end,1)";

		$query_insert_season = mysqli_query($db_link,$sql_insert_season);
		checkSQL($db_link,$query_insert_season);

		header("Location:new_farm.php");
          
	}
    





    

?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/farm.css"/>

</head>
<body>
<div id ="menu_main">
	<ul>
		<li><a href="season.php" id ="item_selected">Season<a></li>
		<li><a href="new_farm.php">Add farm</a></li>
</ul>
</div>
<div class ="content_left">
<form method="post" action="season.php" name="create_season">
</br>
</br>
<p>Season name<p>
</br>
<input name ="season_name" type="text" placeholder="name your period"/>
</br>
</br>
<p>season start<p>
</br>
<input name="season_start" type="text" placeholder="DD.MM.YY"/>
</br>
</br>
<p>season end</p>
</br>
<input name="season_end" type="text" placeholder="DD.MM.YY"/>
</br>
</br>
<input name="new_season" type ="submit" value="Create Season"/>
</form>
</div>
<div class = "content_right">
	<table id = "tb_table">
		<tr>
			<th>Season Name</th>
			<th> Season Start</th>
			<th> Season End</th>
			<th> Edit season</th>

			<tr>
</table>
</div>
</body>
</html>