<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	require 'functions.php';
	checkLogin();
	//checkPermissionAdmin();
    $db_link = connect();
    $season = getSeasonName($db_link);

    if (isset($_POST['add_farm']))
    {  //get the user input of the farm
        $farm_number = sanitize($db_link,$_POST['farm_number']);
        $soil_ph = sanitize($db_link, $_POST['soil_ph']);
        $farm_size = sanitize($db_link. $_POST['farm_size']);
        $season_name = sanitize($db_link, $_POST['season_name']);


        //Insert the  farm data into the farm table
        $sql_insert_farm = "INSERT INTO farm 
            (number,size,ph,period)
            VALUES
            ($farm_number,'$soil_ph','$farm_size' '$season_name')";

        $query_insert_farm = mysqli_query($db_link, $sql_insert_farm);
        checkSQL($db_link, $query_insert_farm);


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
<form method="post" action="new_farmtools.php">
</br>
</br>
<p>Tool name<p>
</br>
<input name ="tool_name" type="text" placeholder="eg..matchete"/>
</br>
</br>
<p> Tool Type<p>
</br>
<input name="tool_type" type="text" placeholder="eg..harvesting"/>
</br>
</br>
<p>Tool Condition</p>
</br>
<input name="tool_condition" type="text" placeholder="eg..new"/>
</br>
</br>
<p>Description</p>
</br>
<input name="tool_description" type="text"/>
</br>
</br>
<p>Value<p>
<br>
<input name="tool_value" type="number" placeholder="eg.. 2000"/>

<input name="add_tool" type ="submit" value = "Add Tool"/>
</form>
</div>
<div class = "content_right">
<table id="tb_table">
<tr>
<th>farm number<th>
<th>farm size<th>
<th>Soil ph<th>
<th>Farming period<th>
<th>Edit<th>
</tr>
</table>
</div>
</body>
</html>