<?php

	function createUser($fname, $username, $password, $email, $userlvl) {
		include('connect.php');
		$userString = "INSERT INTO tbl_user VALUES(NULL,'{$fname}', '{$username}', '{$password}', '{$email}', NULL, '{$userlvl}', 'no', 'yes')";
		//echo $userString;
		$userQuery = mysqli_query($link, $userString);
		if($userQuery) {
			redirect_to("admin_index.php");
		}else{
			$message = "There was a problem setting up this user.  Maybe reconsider your hiring practices.";
			return $message;
		}
		mysqli_close($link);
	}

	function editUser($id, $fname, $username, $password, $email) {
		INCLUDE('connect.php');

		$updatestring = "UPDATE tbl_user SET user_fname = '{$fname}', user_name = '{$username}', user_pass = '{$password}', user_email = '{$email}', user_firstLogin = 'no',  WHERE user_id = {$id}";
		echo $updatestring;

		$updatequery = mysqli_query($link, $updatestring);
		if($updatequery){
			redirect_to("admin_index.php");
		}else{
			$message = "There was a problem changing your information, please fix it.";
			return $message;
		}

		mysql_close($link);
	}

	function deleteUser($id) {
		// echo $id;
		include('connect.php');
		$delstring = "DELETE FROM tbl_user WHERE user_id = {$id}";
		$delquery = mysqli_query($link, $delstring);
		if($delquery){
			redirect_to("../admin_index.php");
		}else{
			$message = "Call security";
			return $message;
		}

		mysqli_close($link);
	}



?>
