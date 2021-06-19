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
</div>
<div class ="content_left">
<br>
<P> Add New Machinery<p>
<br>
<form method="post" action="new_machinery.php">
</br>
</br>
<p>.Machinery name.<p>
</br>
<input name ="machinery_name" type="text" placeholder="eg tractor"/>
</br>
</br>
<p>.Registration number.<p>
</br>
<input name="machine_number" type="text" placeholder="eg..K200L"/>
</br>
</br>
<p>.Machine Type.</p>
</br>
<input name="machine_type" type="text" placeholder="eg..harvesting machine"/>
</br>
</br>
<p>.Machine Condition.</p>
</br>
<input name="machine_condition" type="text" placeholder="eg..new"/>
</br>
</br>
<p>.Description.</p>
<br>
<input name="machine_description" type="text" />
<br>
<br>
<p>.Machine Value.<p>
<br>
<input name="machine_value" type="number" placeholder="eg..ksh 20000"/>
<br>
<br>
<input name="add_machinery" type ="submit" value = "Add Machinery"/>
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