<?php

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $query = 'INSERT INTO users
        (first_name, suffix_name, last_name, email, password, username)
        VALUES
        (:first_name, :suffix_name, :last_name, :email, :password, :username)';

        $db = new DB();
        $db->insert($query, [
            'first_name' => $_POST['first_name'],
            'suffix_name' => $_POST['suffix_name'],
            'last_name' => $_POST['last_name'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'username' => $_POST['username'],
        ]);
    }

    $title = 'Registreren';
?>

<div class="container">
  
    <h2>Registreren</h2>

    <p>Alles met een '*' is verplicht ingevuld te worden.</p>

    <form action="" method="POST">

        <div class="form-group">
            <label class="col-sm-3">
                Voornaam *
            </label>
            <div class="col-sm-9">
                <input type="text" name="first_name" class="form-control" value="" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3">
                Tussenvoegsel
            </label>
            <div class="col-sm-9">
                <input type="text" name="suffix_name" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3">
                Achternaam *
            </label>
            <div class="col-sm-9">
                <input type="text" name="last_name" class="form-control" value="" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3">
                E-mail *
            </label>
            <div class="col-sm-9">
                <input type="email" name="email" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3">
                Gebruikersnaam *
            </label>
            <div class="col-sm-9">
                <input type="username" name="username" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3">
                Wachtwoord *
            </label>
            <div class="col-sm-9">
                <input type="password" name="password" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3">
                Wachtwoord bevestigen *
            </label>
            <div class="col-sm-9">
                <input type="password" name="password_confirmed" class="form-control" required>
            </div>
        </div>

      <a href="./index.php">
        <button class="btn btn-primary" type="submit">Registreer</button>
      </a>

    </br>

      <a href="./index.php">Home</a>

    </form>
</div>

<?php ?>
