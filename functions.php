<?PHP 
function connect()
{
    require "config/config.php";
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$connect) header('Location:start.php');
		mysqli_set_charset($connect, 'utf8');
		return $connect;
}

//check if the query was successfully executed
function checkSQL($db_link, $sql_query)
{
  if(!$sql_query) die('SQL STATEMENT FAILED'.mysqli_error($db_link));
}

function fingerprint()
{
  $fingerprint = md5($_SERVER['REMOTE_ADDR'].'jikI/20Y,!'.$_SERVER['HTTP_USER_AGENT']);
  return $fingerprint;
}

function checkLogin()
{
  $fingerprint = fingerprint();

  if(!session_id())
  {
    session_start();
  }
  if(!$_SESSION['log_user'] || $_SESSION['log_fingerprint'] != $fingerprint) logout();
  session_regenerate_id();
}

function checkLogout()
{

}
function logout()
{
  session_destroy();
  header('Location:login.php');
  die;
}

function showMessage($text) {
		echo '<script language=javascript>
						alert(\''.$text.'\')
					</script>';
  }
  function getEmployee($db_link, $empl_id){
		$sql_empl = "SELECT * FROM employee LEFT JOIN user ON employee.empl_id = user.empl_id 
		WHERE employee.empl_id = $empl_id";
		$query_empl = mysqli_query($db_link, $sql_empl);
		checkSQL($db_link, $query_empl, $db_link);
		$result_empl = mysqli_fetch_assoc($query_empl);

		return $result_empl;
  }

  function getCurrentEmployee($db_link)
  {
    $timestamp = time();
	$sql_get_curent_employee = "SELECT * FROM employee WHERE empl_end > $timestamp OR empl_end IS NULL
	ORDER BY empl_id ASC";
    $query_currentEmployee = mysqli_query($db_link, $sql_get_curent_employee);
    checkSQL($db_link, $query_currentEmployee);
  

    return $query_currentEmployee;
  }
  function buildEmplNo($db_link)
  {
    $empl_no= "%N%-%Y";

    $sql_maxID = "SELECT MAX(empl_id) AS maxid FROM employee";
		$query_maxID = mysqli_query($db_link, $sql_maxID);
		checkSQL($db_link, $query_maxID, $db_link);
		$result_maxID = mysqli_fetch_array($query_maxID);

		// Read employee number format
		$enParts = explode("%", $empl_no);
		$enCount = count($enParts);

		// Build customer number
		$i = 0;
		$emplNo = "";
		for ($i = 1; $i < $enCount; $i++) {
			switch($enParts[$i]){
				case "N":
					$emplNo = $emplNo.($result_maxID['maxid'] + 1);
					break;
				case "Y":
					$emplNo = $emplNo.date("Y",time());
					break;
				case "M":
					$emplNo = $emplNo.date("m",time());
					break;
				case "D":
					$emplNo = $emplNo.date("d",time());
					break;
				default:
					$emplNo = $emplNo.$enParts[$i];
			}
		}

		// Return employee number
		return $emplNo;
  }

  function getSeasonName($dblink)
  {
	  $timestamp = time();
	  $sql_getSeason = "SELECT * FROM farming_period WHERE end_date > $timestamp";
	  $query_season = mysqli_query($dblink,$sql_getSeason);
	  checkSQL($dblink,$query_season);

	  $row_seasons = mysqli_fetch_assoc($query_season);

	  return $row_seasons;
  }
  /**
	* Sanitize and secure user input
	* @param string var : User Input
	* @return string var : Secured and sanitized User Input
	*/
  function sanitize($dblink, $var)
  {
	  $var = stripslashes($var);
	  $var = htmlentities($var);
	  $var = strip_tags($var);
	  $var = mysqli_real_escape_string($dblink,$var);

	  return $var;
  }
  




?>