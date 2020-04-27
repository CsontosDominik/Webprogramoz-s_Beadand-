<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
  $postData = [
    'email' => $_POST['email'],
    'jelszo' => $_POST['jelszo']
  ];

  if(empty($postData['email']) || empty($postData['jelszo'])) {
    echo "Hiányzó adat(ok)!";
  } else if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
    echo "Hibás email formátum!";
  } else if(!UserLogin($postData['email'], $postData['jelszo'])) {
    echo "Hibás email cím vagy jelszó!";
  }

  $postData['jelszo'] = "";
}
?>

<form method="post">
  <div class="form-group">
    <label for="loginEmail">E-mail cím:</label>
    <input type="email" class="form-control" name="email" value="<?= isset($postData) ? $postData['email'] : '';?>">
  </div>
  <div class="form-group">
    <label for="loginPassword">Jelszo:</label>
    <input type="password" class="form-control" name="jelszo" value="">
  </div>
  <button type="submit" class="btn btn-dark" name="login">Bejelentkezés</button>
</form>