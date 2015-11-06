<?php
function db_connect(){
	$db_host = "nagyzcom.ipagemysql.com";
	$db_name = "apacska";
	$db_user = "apacska";
	$db_pass = "malaguti";

	/*$db_host = "localhost";
	$db_name = "languages";
	$db_user = "root";
	$db_pass = "";*/

	global $conn;
	// Create connection
	$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
	
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
}

function login(){
	$_SESSION["logged_in_first"]=1;
	$_SESSION["logged_in"]=1;
	$_SESSION["k"]=1;
}

function logout(){
	unset($_SESSION["logged_in"]);
}

function select_word(){
	global $conn;
	db_connect();
	$res=1;

	if(!isset($_SESSION["logged_in_first"])){
		$_SESSION["logged_in_first"]=1;
	}
	
	$query="SELECT MAX(id) FROM english";
	$result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);
    $max = $row[0];

	//if($_SESSION["logged_in_first"]==1){

		$_SESSION["logged_in_first"]=0;
		$_SESSION["k"]=1;

		for($i=1; $i<=$max; $i++){
			$id[]=$i;
		}
		
		shuffle($id);
		$_SESSION["id"]=$id;
	//}

	while($res) {
		$k=$_SESSION["k"];

		if (isset($_SESSION["k"])) {
			$id = $_SESSION["id"][$k-1];
			//echo $_SESSION["id"][$k];
		}

		$sql = "SELECT id, word FROM english WHERE id=$id";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$selected_word = $row["word"];
			}
			$res = 0;
		} else {
			$res = 1;
			$_SESSION["k"]++;
		}
//		if($k>=$max){
//			$_SESSION["logged_in_first"]=1;
//			$res=1;
//		}
	}
	if ($_SESSION["k"] > $max) {
		echo "Vége a játéknak!";
		$_SESSION["k"] = 1;
	}
	echo $selected_word;
}

function check_answer(){
	global $conn;
	db_connect();
	$answer = "";
	$word = "";
	$id = "";
	$row_cnt = 0;
	if(isset($_GET["answer"])){
		$answer = strtolower($_GET["answer"]);
	}
	if(isset($_GET["word"])){
		$word = strtolower($_GET["word"]);
	}
	if(isset($_SESSION["id"])){
		$id = $_SESSION["id"];
	}
	
	$sql = "SELECT * FROM english WHERE answer='$answer' AND word='$word'";
	
	if ($result = mysqli_query($conn, $sql)) {

    /* determine number of rows result set */
    $row_cnt = mysqli_num_rows($result);

    /* close result set */
    mysqli_free_result($result);
	}
	
	//$query = mysqli_query($conn, $sql);
	//$rows = mysqli_num_rows($query);
	
	if($row_cnt!=0){
		echo "Helyes!";
		echo '<a href='.'../'.'>Vissza</a>';
	}
	else{
		echo "Helytelen!";
		echo '<a href='.'../'.'>Vissza</a>';
	}
	
	//mysql_close($conn);
}

function add_new_word(){
	global $conn;
	db_connect();

	if(isset($_GET["new_word"])){
		$new_word=strtolower($_GET["new_word"]);
	}
	else{
		$new_word="nem jo";
	}

	if(isset($_GET["new_answer"])){
		$new_answer=strtolower($_GET["new_answer"]);
	}
	else{
		$new_answer="nem jo";
	}

	$sql = "SELECT word FROM english WHERE word='$new_word'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result)<1)
	{
		$insert="INSERT INTO `english` (`word`,`answer`) VALUES('$new_word','$new_answer')";
		$add_word=mysqli_query($conn,$insert);

		if($add_word){
			//unset($_SESSION["logged_in_first"]);
			echo "Sikeresen hozzáadva!\n\n";
			echo '<a href='.'../../szo'.'>Vissza</a>';
		}
		else{
			echo "Sikertelen hozzáadás!";
			echo '<a href='.'../../szo'.'>Vissza</a>';
		}
	}
	else{
		echo "Ez a szó már benne van az adatbázisban!";
		echo '<a href='.'../../szo'.'>Vissza</a>';
	}
}
