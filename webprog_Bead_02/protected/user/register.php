<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
	$postData = [
		'csnev' => $_POST['csalad_nev'],
		'knev' => $_POST['kereszt_nev'],
		'email' => $_POST['email'],
		'email1' => $_POST['email1'],
		'jelszo' => $_POST['jelszo'],
		'jelszo1' => $_POST['jelszo1']
	];

	if(empty($postData['csnev']) || empty($postData['knev']) || empty($postData['email']) || empty($postData['email1']) || empty($postData['jelszo']) || empty($postData['jelszo1'])) {
		echo "Hiányzó adat(ok)!";
	} else if($postData['email'] != $postData['email1']) {
		echo "Az email címek nem egyeznek!";
	} else if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
		echo "Hibás email formátum!";
	} else if ($postData['jelszo'] != $postData['jelszo1']) {
		echo "A jelszavak nem egyeznek!";
	} else if(strlen($postData['jelszo']) < 6) {
		echo "A jelszó túl rövid! Legalább 6 karakter hosszúnak kell lennie!";
	}else if(strlen($postData['jelszo']) > 20) {
		echo "A jelszó maximum 20 karakter hosszúnak lehet!";
	} else if(!UserRegister($postData['email'], $postData['jelszo'], $postData['csnev'], $postData['knev'])) {
		echo "Sikertelen regisztráció!";
	}

	$postData['jelszo'] = $postData['jelszo1'] = "";
}
?>

<form method="post">
	<div class="form-row">
		<div class="form-group col-md-12">
			<label for="registerFirstName">Család név:</label>
			<input type="text" class="form-control" name="csalad_nev" value="<?=isset($postData) ? $postData['csnev'] : "";?>">
		</div>
		<div class="form-group col-md-12">
			<label for="registerLastName">Kereszt név:</label>
			<input type="text" class="form-control" name="kereszt_nev" value="<?=isset($postData) ? $postData['knev'] : "";?>">
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-12">
			<label for="registerEmail">E-mail cím:</label>
			<input type="email" class="form-control" name="email" value="<?=isset($postData) ? $postData['email'] : "";?>">
		</div>
		<div class="form-group col-md-12">
			<label for="registerEmail1">E-mail cím megerősítése:</label>
			<input type="email" class="form-control" name="email1" value="<?=isset($postData) ? $postData['email1'] : "";?>">
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-12">
			<label for="registerPassword">Jelszó:</label>
			<input type="password" class="form-control" name="jelszo" value="">
		</div>
		<div class="form-group col-md-12">
			<label for="registerPassword1">Jelszó megerősítése:</label>
			<input type="password" class="form-control" name="jelszo1" value="">
		</div>
	</div>

	<button type="submit" class="btn btn-dark" name="register">Új felhasználó létrehozása</button>
</form>