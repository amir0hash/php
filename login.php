<?php
session_start();
include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password'])) {


	$username = $_POST['username'];
	$pass = $_POST['password'];
	$name = $_POST['name'];

	if (empty($username)) {
		header("Location: index.php?error=نام کاربری الزامیست");
		exit();
	} else if (empty($pass)) {
		header("Location: index.php?error=رمز عبور الزامیست");
		exit();
	} else {



		// query
		$sql = "INSERT INTO users (`id`, `user_name`, `password`, `name`)
		VALUES (Null, '$username', '$pass','$name')";
		// amaliyat insert

		if (mysqli_query($conn, $sql)) {
			$_SESSION['status'] = "<Type Your success message here>";
			;
			$sql = "SELECT  user_name, name FROM users";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// khoroji namayesh data ha
				while ($row = $result->fetch_assoc()) {
					echo "id: " . $row["user_name"] . " |||| Name: " . $row["name"] . "<br>";
				}
			} else {
				echo "0 results";
			}
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		// $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

		// $result = mysqli_query($conn, $sql);

		// if (mysqli_num_rows($result) === 1) {
		// 	$row = mysqli_fetch_assoc($result);
		// 	if ($row['user_name'] === $uname && $row['password'] === $pass) {
		// 		$_SESSION['user_name'] = $row['user_name'];
		// 		$_SESSION['name'] = $row['name'];
		// 		$_SESSION['id'] = $row['id'];
		// 		header("Location: home.php");
		// 		exit();
		// 	} else {
		// 		header("Location: index.php?error=Incorect User name or password");
		// 		exit();
		// 	}
		// } else {
		// 	header("Location: index.php?error=Incorect User name or password");
		// 	exit();
		// }
	}

} else {
	echo 'amsdflakfd';
	header("Location: index.php");
	exit();
}