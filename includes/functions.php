<?php

	 include_once("zz.php"); 
function mysql_prep($value){
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists("mysqli_real_escape_string");
	if($new_enough_php){
			if($magic_quotes_active){$value = stripslashes($value);}
			$value = mysqli_real_escape_string($connection, $value);
		} else {
			if(!magic_quotes_active){$value = addslashes($value);}
			
		}
			return $value;
	}

function confirm_query($result_set){
	if(!$result_set){
		die("Database query failed: ". mysqli_error());
	}
}
