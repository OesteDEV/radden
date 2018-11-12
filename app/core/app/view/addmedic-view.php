<?php
if(count($_POST)>0){
	$user = new MedicData();
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->category_id = $_POST["category_id"];
	$user->address = $_POST["address"];
	$user->email = $_POST["email"];
	$user->phone = $_POST["phone"];
	$user->add();
print "<script>window.location='index.php?view=medics';</script>";
}
?>