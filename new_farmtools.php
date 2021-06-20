<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	require 'functions.php';
	checkLogin();
	//checkPermissionAdmin();
    $db_link = connect();
    $season = getSeasonName($db_link);

    if (isset($_POST['add_tool']))
    {  //get the user input of the farm
        $tool_name = sanitize($db_link,$_POST['tool_name']);
        $tool_type= sanitize($db_link,$_POST['tool_type']);
        $tool_condition = sanitize($db_link, $_POST['tool_condition']);
        $tool_description = sanitize($dblink, $_POST['tool_descrption']);
        $tool_value = sanitize($db_link, $_POST['tool_value']);
        
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
<br>
<br>
<input name="add_tool" type ="submit" value = "Add Tool"/>
</form>
</div>
<div class = "content_right">
<table id="tb_table">
<tr>
<th>.Name.<th>
<th>.Type.<th>
<th>.Condition.<th>
<th>.Description.<th>
<th>.Value.<th>
</tr>
</table>
</div>
</body>
</html>