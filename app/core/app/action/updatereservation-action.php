<?php
/**
* BookMedik
* @author evilnapsis
* @url http://evilnapsis.com/about/
**/

if(count($_POST)>0){
	$user = ReservationData::getById($_POST["id"]);
	$user->title = $_POST["title"];
	$user->pacient_id = $_POST["pacient_id"];
	$user->medic_id = $_POST["medic_id"];
	$user->category_id = $_POST["category_id"];
	$user->date_at = $_POST["date_at"];
	$user->time_at = $_POST["time_at"];
	$user->user_id = $_SESSION["user_id"];
	$user->status_id = $_POST["status_id"];
	$user->payment_id = $_POST["payment_id"];
	$user->payment_type_id = $_POST["payment_type_id"];
	$user->price = $_POST["price"];
	$user->update();

Core::alert("Actualizado exitosamente!");
print "<script>window.location='index.php?view=reservations';</script>";


}


?>