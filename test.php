<?php

// Question No. 1

$numbers   = [1, 5, 7, 9];
$summation = 0;
foreach ($numbers as $key => $value) {
	$summation += $value;
}

echo "summation of array numbers is ".$summation."<br>";

//Question No. 2

$arr = [1, 2, 3, 4, 5, 6, 7, 7, 8, 9, 10];

for ($i = 0; $i < sizeof($arr); $i++) {

	if ($arr[$i] == $arr[$i+1]) {

		$repeated = $arr[$i];
	}
}

echo "Repeated no. is ".$repeated."<br>";

// Question No. 3

$array = [0, 0, 1, 1, 0, 0, 0, 1, 0, 0, 1, 1, 1, 0];
$count = 0;

for ($i = 0; $i < sizeof($array); $i++) {

	if ($array[$i] == 1 && $array[$i+1] == 1) {
		$count = $count+1;
	}
}

echo "The maximum numbers of consecutive 1's is ".$count."<br>";

//Question No. 4

function pairs($arr, $value) {

	for ($i = 0; $i < sizeof($arr); $i++) {

		$val = $arr[$i]+$arr[$i+1];

		if ($val == $value) {
			echo $val."<br>";
		}

	}

}
$arr   = [1, -4, 5, 6];
$value = 11;
pairs($arr, $value);

//Question No. 5

$server_name = "localhost";
$user_name   = "root";
$password    = "admin";
$db_name     = "test";

$conn = new mysqli($server_name, $user_name, $password, $db_name);

if ($conn->connect_error) {
	die("Connection failed: ".$conn->connect_error);
}

// user table
$sql = "CREATE TABLE users (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
	echo "User table created successfully";
} else {
	echo "Error creating table: ".$conn->error;
}

// Address table
$sql = "CREATE TABLE address (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(11) NOT NULL,
street VARCHAR(50) NOT NULL,
pin_code INT(11) NOT NULL,
country VARCHAR(50) NOT NULL,
state VARCHAR(50) NOT NULL,
phone_no INT(11) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
foreign key(user_id) references users(id)
)";

if ($conn->query($sql) === TRUE) {
	echo "Address table created successfully";
} else {
	echo "Error creating table: ".$conn->error;
}

$conn->close();

?>