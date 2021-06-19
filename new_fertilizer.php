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
<p style="font-weight:Bold">Add New Fertilizer</p>
<form method="post" action="new_fertilizer.php" name="add_newfertilzer">
</br>
</br>
<p>name<p>
</br>
<input name ="fertilizer_name" type="text" placeholder="name of fertilizer"/>
</br>
</br>
<p>Type<p>
</br>
<input name="fertilizer_type" type="text" placeholder="phosphatic/Ammonium"/>
</br>
</br>
<p> Description</p>
</br>
<input name="fertilizer_description" type="text" placeholder=""/>
</br>
</br>
<p>Quantity<p>
<br>
<input name="fertilizer_quantity" type="text" placeholder="2.l/2.5Kg etc"/>
<br>
<br>
<p> Price</p>
</br>
<input name="fertilizer_price" type="numeric" placeholder="kshs"/>
</br>
</br>

<input name="add_fertilizer" type ="submit" value = "Add Fertilizer"/>
</form>
</div>
<div class = "content_right">
<table id="tb_table">
<tr>
<th>name<th>
<th>Type<th>
<th>Description<th>
<th>Quantity<th>
<th>Price<th>
<th>Edit<th>
</tr>
</table>
</div>
</body>
</html>