<?php
if(count($_POST)>0){
	$user = new PacientData();
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->document = $_POST["document"];
	$user->gender = $_POST["gender"];
	$user->coverage = $_POST["coverage"];
	$user->day_of_birth = $_POST["day_of_birth"];	
	$user->sick = $_POST["sick"];
	$user->address = $_POST["address"];
	$user->email = $_POST["email"];
	$user->phone = $_POST["phone"];
	$user->add();
print "<script>window.location='index.php?view=pacients';</script>";
}
?>