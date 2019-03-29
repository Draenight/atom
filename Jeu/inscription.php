<?php
require __DIR__.'/header.php';
?>

<form method='post'>
  <label>Nom</label>
  <input type="text" name="name">
  <label>Password</label>
  <input type="password" name="password">
  <button type="submit">Inscription</button>
</form>

<?php
if (isset($_POST['name']) && isset($_POST['password'])) {
  $d = new DateTime('now');
  $character = new Character([
    'name' => $_POST['name'],
    'password' => password_hash($_POST['password'], PASSWORD_ARGON2I),
    'hp' => '100',
    'ap' => '10',
    'lastaction' => $d->format('Y-m-d H:i:s')
  ]);

  $characterRepository = new CharacterRepository($base);
  if ($characterRepository->exists($character) === false) {
    $characterRepository->add($character);
    echo "Votre personnage est bien créé";
  } else {
    echo "Un personnage du même nom existe";
  }
}
?>
