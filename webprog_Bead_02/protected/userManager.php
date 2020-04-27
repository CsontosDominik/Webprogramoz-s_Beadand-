<?php 
function IsUserLoggedIn() {
	return $_SESSION  != null && array_key_exists('uid', $_SESSION) && is_numeric($_SESSION['uid']);
}

function UserLogout() {
	session_unset();
	session_destroy();
	header('Location: index.php');
}

function UserLogin($email, $jelszo) {
	$query = "SELECT id, csalad_nev, kereszt_nev, email, permission FROM felhasznalok WHERE email = :email AND jelszo = :jelszo";
	$params = [
		':email' => $email,
		':jelszo' => sha1($jelszo)
	]; 

	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(!empty($record)) {
		$_SESSION['uid'] = $record['id'];
		$_SESSION['csnev'] = $record['csalad_nev'];
		$_SESSION['knev'] = $record['kereszt_nev'];
		$_SESSION['email'] = $record['email'];
		$_SESSION['permission'] = $record['permission'];
		header('Location: index.php');
	}
	return false;
}

function UserRegister($email, $jelszo, $csnev, $knev) {
	$query = "SELECT id FROM felhasznalok email = :email";
	$params = [ ':email' => $email ];

	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(empty($record)) {
		$query = "INSERT INTO felhasznalok (csalad_nev, kereszt_nev, email, jelszo) VALUES (:csalad_nev, :kereszt_nev, :email, :jelszo)";
		$params = [
			':csalad_nev' => $csnev,
			':kereszt_nev' => $knev,
			':email' => $email,
			':jelszo' => sha1($jelszo)
		];

		if(executeDML($query, $params)) 
			header('Location: index.php?P=login');
	} 
	return false;
}

?>