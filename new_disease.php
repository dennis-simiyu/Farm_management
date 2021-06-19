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
            ($farm_number,'$soil_ph','$farm_size', '$season_name')";

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
<form method="post" action="new_crop.php">
</br>
</br>
<p>crop name<p>
</br>
<input name ="crop_name" type="text" placeholder="name of crop"/>
</br>
</br>
<p><p>
</br>
<select name="select_farm" >
<input name="farm" type="text" placeholder="20Acres"/>
</select>
</br>
</br>
<p> Seeds</p>
</br>
<select name="seeds">
<input name="soil_ph" type="text" placeholder="Acidic/basic"/>
</select>
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

<input name="add_farm" type ="submit" value = "Add Farm"/>
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