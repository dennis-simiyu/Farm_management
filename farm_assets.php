<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	require 'functions.php';
	checkLogin();
	//checkPermissionAdmin();
    $db_link = connect();
    $season = getSeasonName($db_link);
    ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/farm.css">
    </head>
    <body>
        <div class="menu_outer">
            <div id="menu_main">
                <ul>
                    <li><a href="start.php">Home</a></li>
                    <li><a href="new_machinery.php"> Machinery</a></li>
                    <li><a href="new_farmtools.php">Farm Tools</a></li>
</ul>

</div>
</div>
<div class="content_left">
    <table id="tb_table">
</table>
</div>
<div class="content_right">
    <table id ="tb_table">
</table>
</div>
<div class="footer">
</div>

</body>
</html>