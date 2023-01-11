<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$lastName = $_POST['bookName'];
	$lastName = $_POST['Date'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$email = $_POST['LIBID'];
	$password = $_POST['password'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost:3307','root','','lib');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into issue(firstName, lastName, bookName,Date, gender, email,LIBID, password, number) values(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssisi", $firstName, $lastName, $bookName, $Date, $gender, $email, $LIBID, $password, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>